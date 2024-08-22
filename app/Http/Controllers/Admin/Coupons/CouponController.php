<?php

namespace App\Http\Controllers\Admin\Coupons;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shop\Coupons\Requests\UpdateCouponRequest;
use App\Shop\Coupons\Requests\StoreCouponRequest;
use App\Shop\Coupons\Repositories\CouponRepository;
use App\Shop\Coupons\Repositories\Interfaces\CouponRepositoryInterface;

class CouponController extends Controller
{
    public function __construct(CouponRepositoryInterface $couponRepo)
    {
        $this->couponRepo = $couponRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = $this->couponRepo->listCoupons('created_at', 'desc');

        return view('admin.coupons.list', ['coupons' => $coupons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCouponRequest $request)
    {
        $store = $this->couponRepo->createCoupon($request->all());

        return !!$store ? redirect('admin/coupons')->with('message', 'Coupon added') :
            redirect()->back()->with('error', "Coupon can't be stored");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = $this->couponRepo->findById($id);

        return view('admin.coupons.edit', ['coupon' => $coupon]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCouponRequest $request, $id)
    {
        $coupon = $this->couponRepo->findById($id);

        $update = new CouponRepository($coupon);
        $update->update($request->all());

        return !!$update ? redirect('admin/coupons')->with('message', 'Coupon updated') :
            redirect()->back()->with('error', "Coupon can't be updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = $this->couponRepo->findById($id);

        $delete = new CouponRepository($coupon);
        
        $delete->delete();

        return !!$delete ? redirect('admin/coupons')->with('message', 'Coupon deleted') :
            redirect('admin/banners')->with('error', "Coupon can't be deleted");
    }
}
