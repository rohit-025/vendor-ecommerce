<?php

namespace App\Http\Controllers\Front;

use App\Shop\Banners\Repositories\Interfaces\BannerRepositoryInterface;
use App\Shop\Blogs\Repositories\Interfaces\BlogRepositoryInterface;
use App\Shop\Carts\Repositories\CartRepository;
use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepo;

    /**
     * HomeController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository,
    BannerRepositoryInterface $bannerRepository,
    ProductRepositoryInterface $productRepository,
    CartRepository $cartRepository,
    BlogRepositoryInterface $blogRepository)
    {
        $this->categoryRepo = $categoryRepository;

        $this->bannerRepo = $bannerRepository;

        $this->productRepo = $productRepository;

        $this->cartRepo = $cartRepository;

        $this->blogRepo = $blogRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $banners1 = $this->bannerRepo->getLatestBanners(1);

        $featuredCategories = $this->categoryRepo->featuredCategories();

        $banners2 = $this->bannerRepo->getLatestBanners(2);

        $blogs = $this->blogRepo->getLatestBlog(3);

        return view('front.index', compact('banners1','featuredCategories','banners2','blogs'));
    }
}
