<?php

namespace App\Http\Controllers\Admin\Offers;

use App\Http\Controllers\Controller;
use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Shop\Offers\Repositories\Interfaces\OfferRepositoryInterface;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public $offer;

    public function __construct(OfferRepositoryInterface $offer,CategoryRepositoryInterface $category)
    {
        $this->offer = $offer;
        
        $this->category = $category;
    }

    public function index(){
        dd("Index");
    }

    public function create(){
        return view('admin.offers.create');
    }

    public function store(Request $request){
        if($request->end_date < $request->start_date){
            return redirect()->back()->withErrors('End Date must be greater than start date');
        }
        $this->validate($request, [
            'offer_banner' => 'image|mimes:jpeg,png,jpg,gif,svg|nullable',
        ]);

        $image = null;
        if(!!$request->offer_banner)
        $image = $this->fileToUpload($request['offer_banner'],'uploads/banners/');
    

        $storeOffer = $this->offer->store(['offer_name' => $request->offer_name, 'discount_percent' => $request->discount_percent, 'start_date' => $request->start_date, 
        'end_date' => $request->end_date, 'banner' => $image,'status' => 'Incomplete']);

        $offerId = $storeOffer->id;
        
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $categories = $this->category->listCategories();

        return view('admin.offers.addProducts', compact('categories', 'offerId', 'startDate', 'endDate'));
    }

    public function productByCategory(Request $request){
        $offer = $this->offer->offerById($request->offer_id);
        
        $startDate = $offer->start_date;
        $endDate = $offer->end_date;

        $alreadyOffered = $this->offer->alreadyOffered($startDate, $endDate);
        
        $alreadyOfferedProducts = null;

        $alreadyOfferedProducts = $this->offer->alreadyOfferedProducts($alreadyOffered);
        
        $data = $this->offer->productByCategory($alreadyOfferedProducts,$request->category_id);
        
        return $data;
    }

    public function addProduct(Request $request){
        $addProduct = $this->offer->addProduct($request);
        
        if($addProduct)
        return redirect(route('admin.offers.list'))->with('success','Offer Added Successfully');
    }

    public function fileToUpload($file, $path)
    {

        $fileName = uniqid() . time() . '.' . str_replace(' ', '_', $file->getClientOriginalName());

        $file->move(public_path($path), $fileName);

        return $path . $fileName;
    }
}
