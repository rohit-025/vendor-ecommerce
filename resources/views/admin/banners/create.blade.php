@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.banners.store') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label for="title">Title<span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" placeholder="Title" class="form-control" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="section">Section</label>
                        <select name="section" id="section" class="form-control select2" required>
                            <option value="">Select Section</option>
                            <option value="1">Section 1</option>
                            <option value="2">Section 2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Banner Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.banners.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
