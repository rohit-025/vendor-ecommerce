<?php

namespace App\Shop\Banners\Repositories;

use App\Shop\Banners\Banner;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepository;
use App\Shop\Banners\Repositories\Interfaces\BannerRepositoryInterface;

class BannerRepository extends BaseRepository implements BannerRepositoryInterface
{
    public function __construct(Banner $banner)
    {
        parent::__construct($banner);
        $this->model = $banner;
    }

    public function listBanners($sort,$order,array $columns = ['*']){
        return $this->all($columns,$sort,$order);
    }

    public function create($banners){
        return $this->model->create($banners);
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function updateBanner(array $banners)
    {
        return $this->update($banners);
    }

    public function deleteBanner()
    {
        return $this->model->delete();
    }

    public function getLatestBanners($section)
    {
        return $this->model->where('section',$section)->latest()->limit(5)->get();
    }
}