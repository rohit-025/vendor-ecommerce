<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Shop\Settings\Repositories\Interfaces\SettingsRepositoryInterface;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public $settingsRepo;
    
    public function __construct(SettingsRepositoryInterface $settingsRepository)
    {
        $this->settingsRepo = $settingsRepository;
    }

    public function index(){
        $tax = $this->settingsRepo->tax();

        $shipping = $this->settingsRepo->shippingCost();

        $sizes = $this->settingsRepo->sizes();

        return view('admin.settings.settings',compact('tax','shipping','sizes'));
    }

    public function updateTax(Request $request){
       $update = $this->settingsRepo->updateTax($request);

       return !!$update ? redirect()->back()->with('success','Tax Updated'):
       redirect()->back()->with('error',"Tax can't be Updated");
    }

    public function updateShipping(Request $request){
       $update = $this->settingsRepo->updateShipping($request);

       return !!$update ? redirect()->back()->with('success','Shipping Cost Updated'):
       redirect()->back()->with('error',"Shipping Cost can't be Updated");
    }

    public function updateSizes(Request $request){
        $update = $this->settingsRepo->updateSizes($request);

        return !!$update ? redirect()->back()->with('success','Sizes Updated'):
        redirect()->back()->with('error',"Sizes can't be Updated");
    }

}

