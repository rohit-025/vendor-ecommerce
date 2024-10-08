<?php

namespace App\Http\Controllers\Front;

use App\Shop\Couriers\Repositories\Interfaces\CourierRepositoryInterface;
use App\Shop\Customers\Repositories\CustomerRepository;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Shop\Orders\Order;
use App\Shop\Orders\Transformers\OrderTransformable;

class AccountsController extends Controller
{
    use OrderTransformable;

    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepo;

    /**
     * @var CourierRepositoryInterface
     */
    private $courierRepo;

    /**
     * AccountsController constructor.
     *
     * @param CourierRepositoryInterface $courierRepository
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(
        CourierRepositoryInterface $courierRepository,
        CustomerRepositoryInterface $customerRepository
    ) {
        $this->customerRepo = $customerRepository;
        $this->courierRepo = $courierRepository;
    }

    public function index()
    {
        $customer = $this->customerRepo->findCustomerById(auth()->user()->id);
        // $customerRepo = new CustomerRepository($customer);
        // $orders = $customerRepo->findOrders(['*'], 'created_at');

        // $orders->transform(function (Order $order) {
        //     return $this->transformOrder($order);
        // });

        // $orders->load('products');
        // dd( $customer);
        // $addresses = $customerRepo->findAddresses();
        return view('front.accounts.account', [
            'customer' => $customer,
            // 'orders' => $this->customerRepo->paginateArrayResults($orders->toArray(), 15),
            // 'addresses' => $addresses
        ]);
    }

    public function addressList () {
        $customer = $this->customerRepo->findCustomerById(auth()->user()->id);
         $customerRepo = new CustomerRepository($customer);
        $addresses = $customerRepo->findAddresses();
        dd($addresses);
        return view('front.accounts.addresses', [
           
             'addresses' => $addresses
        ]);
    } 

    public function orders()
    {
        // $customer = $this->customerRepo->findCustomerById(auth()->user()->id);
        // $customerRepo = new CustomerRepository($customer);
        //  $orders = $customerRepo->findOrders(['*'], 'created_at');

        // $orders->transform(function (Order $order) {
        //     return $this->transformOrder($order);
        // });

        // $orders->load('products');
        // dd($this->customerRepo->paginateArrayResults($orders->toArray(), 15));
        return view('front.accounts.orders', [
            
            //  'orders' => $this->customerRepo->paginateArrayResults($orders->toArray(), 15),
            
        ]);
    }
}
