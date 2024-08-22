<?php

namespace App\Shop\Blogs\Repositories\Interfaces;

use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface BlogRepositoryInterface extends BaseRepositoryInterface
{
    public function list();

    public function paginatedBlogs($limit);

    public function createBlog($data);

    public function getLatestBlog($limit);

    public function exist($slug);

    public function blogBySlug($slug);

    public function blogByTag($tag);
}