<?php

namespace App\Shop\Blogs\Repositories;

use App\Shop\Banners\Banner;
use App\Shop\Blogs\Blog;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepository;
use App\Shop\Blogs\Repositories\Interfaces\BlogRepositoryInterface;

class BlogRepository extends BaseRepository implements BlogRepositoryInterface
{
    public function __construct(Blog $blog)
    {
        parent::__construct($blog);
        $this->model = $blog;
    }

    public function list(){
        return $this->all();
    }

    public function createBlog($data)
    {
        return $this->create($data);
    }

    public function getLatestBlog($limit)
    {
        return $this->model->latest()->limit($limit)->get();
    }

    public function exist($slug)
    {
        return $this->model->where('slug',$slug)->exists();
    }

    public function paginatedBlogs($limit)
    {
        return $this->model->paginate($limit);
    }

    public function blogBySlug($slug)
    {
        return $this->model->where('slug',$slug)->first();
    }

    public function blogByTag($tag)
    {
        return $this->model->where('tags','like','%'.$tag.'%')->paginate(10);
    }



    
}