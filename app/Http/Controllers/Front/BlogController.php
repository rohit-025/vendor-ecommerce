<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Blogs\Repositories\Interfaces\BlogRepositoryInterface;


class BlogController extends Controller
{
    public $blogRepo;

    public function __construct(BlogRepositoryInterface $blog)
    {
        $this->blogRepo = $blog;
    }

    public function index(Request $request){

        $blogs = isset($request->tag) ? $this->blogRepo->blogByTag($request->tag) : $this->blogRepo->paginatedBlogs(10);

        $latestBlogs = $this->blogRepo->getLatestBlog(3);

        $tags = [];

        foreach($blogs as $blog){
            $blogTags = explode(",",$blog->tags);
            foreach($blogTags as $tag){
                if(!in_array($tag,$tags))
                array_push($tags,$tag);
            }
        }
        
        return view('front.blogs.blog',compact('blogs','latestBlogs','tags'));
    }

    public function blogBySlug($slug){
        $blog = $this->blogRepo->blogBySlug($slug);

        return view('front.blogs.blogPage',compact('blog'));
    }

}
