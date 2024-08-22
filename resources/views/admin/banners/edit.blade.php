@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">
        <form action="{{ route('admin.banners.update',$banner->id) }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                @method('put')
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title<span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" placeholder="Title" class="form-control" value="{{ $banner->title }}">
                </div>
                <div class="form-group">
                    <label for="section">Section</label>
                    <select name="section" id="section" class="form-control select2" required>
                        <option value="">Select Section</option>
                        <option value="1" {{$banner->section == '1' ? 'selected':''}}>Section 1</option>
                        <option value="2" {{$banner->section == '2' ? 'selected':''}}>Section 2</option>
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
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection