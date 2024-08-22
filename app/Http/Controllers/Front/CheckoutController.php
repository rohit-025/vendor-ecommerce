<?php

namespace App\Http\Controllers\Front;

use App\Shop\Addresses\Repositories\Interfaces\AddressRepositoryInterface;
use App\Shop\Cart\Requests\CartCheckoutRequest;
use App\Shop\Carts\Repositories\Interfaces\CartRepositoryInterface;
use App\Shop\Carts\Requests\PayPalCheckoutExecutionRequest;
use App\Shop\Carts\Requests\StripeExecutionRequest;
use App\Shop\Couriers\Repositories\Interfaces\CourierRepositoryInterface;
use App\Shop\Customers\Customer;
use App\Shop\Customers\Repositories\CustomerRepository;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Shop\Orders\Repositories\Interfaces\OrderRepositoryInterface;
use App\Shop\PaymentMethods\Paypal\Exceptions\PaypalRequestError;
use App\Shop\PaymentMethods\Paypal\Repositories\PayPalExpressCheckoutRepository;
use App\Shop\PaymentMethods\Stripe\Exceptions\StripeChargingErrorException;
use App\Shop\PaymentMethods\Stripe\StripeRepository;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Shop\Products\Transformations\ProductTransformable;
use App\Shop\Shipping\ShippingInterface;
use Exception;
use App\Http\Controllers\Controller;
use App\Shop\Coupons\Repositories\Interfaces\CouponRepositoryInterface;
use App\Shop\Orders\Order;
use App\Shop\Settings\Repositories\Interfaces\SettingsRepositoryInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use PayPal\Exception\PayPalConnectionException;
use Illuminate\Http\Response;


// use Slim\Http\Request;
// use Slim\Http\Response;
use Stripe\Stripe;
use UxWeb\SweetAlert\SweetAlert;

class CheckoutController extends Controller
{
    use ProductTransformable;

    /**
     * @var CartRepositoryInterface
     */
    private $cartRepo;

    /**
     * @var CourierRepositoryInterface
     */
    private $courierRepo;

    /**
     * @var AddressRepositoryInterface
     */
    private $addressRepo;

    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepo;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepo;

    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepo;

    /**
     * @var PayPalExpressCheckoutRepository
     */
    private $payPal;

    /**
     * @var ShippingInterface
     */
    private $shippingRepo;

    public function __construct(
        CartRepositoryInterface $cartRepository,
        CourierRepositoryInterface $courierRepository,
        AddressRepositoryInterface $addressRepository,
        CustomerRepositoryInterface $customerRepository,
        ProductRepositoryInterface $productRepository,
        OrderRepositoryInterface $orderRepository,
        ShippingInterface $shipping,
        SettingsRepositoryInterface $charges,
        CouponRepositoryInterface $coupon
    ) {
        $this->cartRepo = $cartRepository;
        $this->courierRepo = $courierRepository;
        $this->addressRepo = $addressRepository;
        $this->customerRepo = $customerRepository;
        $this->productRepo = $productRepository;
        $this->orderRepo = $orderRepository;
        $this->payPal = new PayPalExpressCheckoutRepository;
        $this->shippingRepo = $shipping;
        $this->chargesRepo = $charges;
        $this->coupon = $coupon;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stockCheck = $this->cartRepo->checkStocks();

        if(!$stockCheck)
        return redirect()->back()->with('error','Stock for the specified products is not available');

        // $products = $this->cartRepo->getCartItems();

        // $defaultAddress = $this->addressRepo->defaultAddress();
        
        // $customer = $request->user();
        // $rates = null;
        // $shipment_object_id = null;

        // if (env('ACTIVATE_SHIPPING') == 1) {
        //     $shipment = $this->createShippingProcess($customer, $products);
        //     if (!is_null($shipment)) {
        //         $shipment_object_id = $shipment->object_id;
        //         $rates = $shipment->rates;
        //     }
        // }

        // Get payment gateways
        // $paymentGateways = collect(explode(',', config('payees.name')))->transform(function ($name) {
        //     return config($name);
        // })->all();

        // $taxPercent = $this->chargesRepo->tax();

        // $subTotal = $this->cartRepo->getSubTotal();

        // $shippingCost = $this->chargesRepo->shippingCost();

        // $calculatedTax = ((($taxPercent->tax_percent)/100)*$subTotal);

        // $total = $this->cartRepo->getTotal();

        if(!session()->has('error'))
        $request->session()->forget('coupon');

        return view('front.checkout'
        // ,compact('products','defaultAddress','subTotal','shippingCost','calculatedTax','total')
        //     'customer' => $customer,
        //     'billingAddress' => $billingAddress,
        //     'addresses' => $customer->addresses()->get(),
            
        //     
        //     
        //     'total' => $this->cartRepo->getTotal(2),
        //     'payments' => $paymentGateways,
        //     'cartItems' => $this->cartRepo->getCartItemsTransformed(),
        //     'shipment_object_id' => $shipment_object_id,
        //     'rates' => $rates
        // ]
    );
    }

    /**
     * Checkout the items
     *
     * @param CartCheckoutRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \App\Shop\Addresses\Exceptions\AddressNotFoundException
     * @throws \App\Shop\Customers\Exceptions\CustomerPaymentChargingErrorException
     * @codeCoverageIgnore
     */
    public function store(Request $request)
    {
        if(!$request->input('payment'))
        return redirect()->back()->with('error','Please select payment method');

        $stockCheck = $this->cartRepo->checkStocks();

        if(!$stockCheck)
        return redirect()->back()->with('error','Stock for the specified products is not available');

        $defaultAddress = $this->addressRepo->defaultAddress();
        if(!$defaultAddress)
        return redirect()->back()->with('error','Please add address');

        
        
        $shippingFee = 0;

        $latest = Order::latest()->first();
        $details = [
            'reference' => 'VIA'.(isset($latest) ? ($latest->id+1):1),
            'courier_id' => 1,
            'customer_id' => Auth::id(),            
            'address_id' => ($this->addressRepo->defaultAddress())->id,
            'order_status_id' => 2,
            'payment' => $request->input('payment'),
            'total_products' => $this->cartRepo->getSubTotal(),
            'tax' => ((($this->chargesRepo->tax())->tax_percent/100)*$this->cartRepo->getSubTotal()),
            'total_shipping' => $this->chargesRepo->shippingCost()->shipping_cost,
            'total' => $this->cartRepo->getTotal(),
            'discounts' => $this->cartRepo->discount()
        ];

        switch ($request->input('payment')) {
            case 'paypal':
                return $this->payPal->process($shippingFee, $request);
                break;
            case 'stripe':
                $total = $this->cartRepo->getTotal();
                $payment = $this->payment($total);
                // $details = [
                //     'description' => 'Stripe payment',
                //     'metadata' => $this->cartRepo->getCartItems()
                // ];

                // $customer = $this->customerRepo->findCustomerById(auth()->id());
                // $customerRepo = new CustomerRepository($customer);
                // $customerRepo->charge($this->cartRepo->getTotal(2, $shippingFee), $details);
                break;
            default:
                $order = $this->orderRepo->createOrder($details,$this->cartRepo->getCartItems());
                $this->coupon->updateUsedCoupon();
                break;
        }
        
        if(!!$order)
            $clearCart = $this->cartRepo->clearCart();    
            return !!$clearCart ? redirect()->back()->with('success',"Your order is placed successfully with refrence no. ".$order->reference):
            redirect()->back()->with('error',"Your order could not br placed");

    }

    /**
     * Execute the PayPal payment
     *
     * @param PayPalCheckoutExecutionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function executePayPalPayment(PayPalCheckoutExecutionRequest $request)
    {
        try {
            $this->payPal->execute($request);
            $this->cartRepo->clearCart();

            return redirect()->route('checkout.success');
        } catch (PayPalConnectionException $e) {
            throw new PaypalRequestError($e->getData());
        } catch (Exception $e) {
            throw new PaypalRequestError($e->getMessage());
        }
    }

    /**
     * @param StripeExecutionRequest $request
     * @return \Stripe\Charge
     */
    public function charge(StripeExecutionRequest $request)
    {
        try {
            $customer = $this->customerRepo->findCustomerById(auth()->id());
            $stripeRepo = new StripeRepository($customer);

            $stripeRepo->execute(
                $request->all(),
                Cart::total(),
                Cart::tax()
            );
            return redirect()->route('checkout.success')->with('message', 'Stripe payment successful!');
        } catch (StripeChargingErrorException $e) {
            Log::info($e->getMessage());
            return redirect()->route('checkout.index')->with('error', 'There is a problem processing your request.');
        }
    }

    /**
     * Cancel page
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cancel(Request $request)
    {
        return view('front.checkout-cancel', ['data' => $request->all()]);
    }

    /**
     * Success page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function success()
    {
        return view('front.checkout-success');
    }

    /**
     * @param Customer $customer
     * @param Collection $products
     *
     * @return mixed
     */
    private function createShippingProcess(Customer $customer, Collection $products)
    {
        $customerRepo = new CustomerRepository($customer);

        if ($customerRepo->findAddresses()->count() > 0 && $products->count() > 0) {

            $this->shippingRepo->setPickupAddress();
            $deliveryAddress = $customerRepo->findAddresses()->first();
            $this->shippingRepo->setDeliveryAddress($deliveryAddress);
            $this->shippingRepo->readyParcel($this->cartRepo->getCartItems());

            return $this->shippingRepo->readyShipment();
        }
    }


    public function payment($total) {
        Stripe::setApiKey(env("STRIPE_KEY"));
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
              'price_data' => [
                'currency' => env("DEFAULT_CURRENCY"),
                'product_data' => [
                'name' => 'XYZ',
                ],
                'unit_amount' => $total*100,
              ],
              'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => 'https://example.com/success',
            'cancel_url' => 'https://example.com/cancel',
          ]);
      
        return response(['location' => $session->url])->status(303);
    }
}
