<?php

namespace App\Shop\Banners\Repositories\Interfaces;

use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface BannerRepositoryInterface extends BaseRepositoryInterface
{
    public function listBanners($sort,$order);
    
    public function create(array $banners);

    public function findById($id);

    public function updateBanner(array $banners);

    public function deleteBanner();

    public function getLatestBanners($section);
}