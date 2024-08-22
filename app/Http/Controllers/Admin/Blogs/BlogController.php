<?php

namespace App\Http\Controllers\Admin\Blogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Blogs\Repositories\Interfaces\BlogRepositoryInterface;
use App\Shop\Blogs\Requests\StoreBlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $blogRepo;

    public function __construct(BlogRepositoryInterface $blog)
    {
        $this->blogRepo = $blog;
    }

    public function index()
    {
        $blogs = $this->blogRepo->list();

        return view('admin.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        $image = $this->fileToUpload($request->image, 'uploads/blogs/');

        $slug = preg_replace('/[^A-Za-z0-9\-]/','',str_replace(" ","-",strtolower($request->title)));

        $uniqueSlug = $this->uniqueSlug($slug);

        $blog = $this->blogRepo->createBlog(['title' => $request->title,'image' => $image,'blog' => $request->blog,'author_name'=> $request->author_name,'tags' => $request->tags,'slug' => $uniqueSlug]);

        return redirect(route('admin.blogs.index'))->with('message',"Blog Stored Successfully");
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fileToUpload($file, $path)
    {

        $fileName = uniqid() . time() . '.' . str_replace(' ', '_', $file->getClientOriginalName());

        $file->move(public_path($path), $fileName);

        return $path . $fileName;
    }

    public function uniqueSlug($slug){
        $i = 1;
        $uniqueSlug = $slug;
        do {
            $exist = $this->blogRepo->exist($uniqueSlug);

            if($exist)
            $uniqueSlug = $slug."-".$i;
            $i++;
        } while ($exist == true);

        return $uniqueSlug;
    }
}
