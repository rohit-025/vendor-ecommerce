@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.blogs.store') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label for="title">Title<span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" placeholder="Title" class="form-control" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="image">Banner Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">Author Name</label>
                        <input type="text" name="author_name" id="image" class="form-control" placeholder="Author Name" value="{{ old('author_name') }}">
                    </div>
                    <div class="form-group">
                        <label for="image">Tags</label>
                        <input type="text" name="tags" class="form-control" placeholder="Author Name" value="{{ old('tags') }}">
                        <small>Tags Should be seprated by comma.</small>
                    </div>
                    <div class="form-group">
                        <label for="image">Blog</label>
                        <textarea name="blog" class="form-control ckeditor"></textarea>
                    </div>
                    
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
