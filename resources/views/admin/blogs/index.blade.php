@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($blogs)
            <div class="box">
                <div class="box-body">
                    <h2>Blogs</h2>
                    @include('layouts.search', ['route' => route('admin.blogs.index')])
                    <table class="table">
                        <thead>
                            <tr>
                                <td class="col-md-2">Title</td>
                                <td class="col-md-1">Image</td>
                                <td class="col-md-2">Author</td>
                                <td class="col-md-3">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $blog->title }}</td>
                                <td><img src="{{ asset($blog->image) }}" style="length: 50px;width: 50px;"></td>
                                <td>{{ $blog->author_name }}</td>
                                <td>
                                    <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    
                    
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @else
            <div class="box">
                <div class="box-body"><p class="alert alert-warning">No addresses found.</p></div>
            </div>
        @endif
    </section>
    <!-- /.content -->
@endsection