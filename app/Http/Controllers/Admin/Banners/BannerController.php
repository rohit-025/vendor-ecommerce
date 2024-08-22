<?php

namespace App\Http\Controllers\Admin\Banners;

use App\Http\Controllers\Controller;
use App\Shop\Banners\Repositories\BannerRepository;
use App\Shop\Banners\Requests\StoreBannerRequest;
use App\Shop\Banners\Requests\UpdateBannerRequest;
use Illuminate\Http\Request;
use App\Shop\Banners\Repositories\Interfaces\BannerRepositoryInterface;

class BannerController extends Controller
{
    public function __construct(BannerRepositoryInterface $bannerRepository)
    {
        $this->bannerRepo = $bannerRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = $this->bannerRepo->listBanners('created_at', 'desc');

        return view('admin.banners.list', ['banners' => $banners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBannerRequest $request)
    {
        $image = $this->fileToUpload($request->image, 'uploads/banners/');

        $store = $this->bannerRepo->create(['title' => $request->title, 'image' => $image, 'section' => $request->section]);

        return !!$store ? redirect('admin/banners')->with('message', 'Banner added') :
            redirect()->back()->with('error', "Banner can't be stored");
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
        $banner = $this->bannerRepo->findById($id);

        return view('admin.banners.edit', ['banner' => $banner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBannerRequest $request, $id)
    {
        $existingBanner = $this->bannerRepo->findById($id);

        $bannerData = ['title' => $request->title, 'section' => $request->section];

        if (isset($request->image)) {
            unlink(public_path($existingBanner->image));

            $image = $this->fileToUpload($request->image, 'uploads/banners/');

            $bannerData['image'] = $image;
        }

        $update = new BannerRepository($existingBanner);
        $update->updateBanner($bannerData);

        return !!$update ? redirect('admin/banners')->with('message', 'Banner updated') :
            redirect()->back()->with('error', "Banner can't be updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $existingBanner = $this->bannerRepo->findById($id);

        unlink(public_path($existingBanner->image));

        $delete = new BannerRepository($existingBanner);
        
        $delete->deleteBanner();

        return !!$delete ? redirect('admin/banners')->with('message', 'Banner deleted') :
            redirect('admin/banners')->with('error', "Banner can't be deleted");
    }

    public function fileToUpload($file, $path)
    {

        $fileName = uniqid() . time() . '.' . str_replace(' ', '_', $file->getClientOriginalName());

        $file->move(public_path($path), $fileName);

        return $path . $fileName;
    }
}
