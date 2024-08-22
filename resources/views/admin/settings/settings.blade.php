@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.tax') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label for="title">Tax (%)<span class="text-danger">*</span></label>
                        <input type="text" name="tax" placeholder="Tax (%)" class="form-control" value="{{isset($tax) ? $tax->tax_percent : ''}}">
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <!-- <a href="{{ route('admin.banners.index') }}" class="btn btn-default">Back</a> -->
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="box">
            <form action="{{ route('admin.shipping') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label for="title">Shipping Cost<span class="text-danger">*</span></label>
                        <input type="text" name="shipping" placeholder="Title" class="form-control" value="{{isset($shipping) ? $shipping->shipping_cost : ''}}">
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <!-- <a href="{{ route('admin.banners.index') }}" class="btn btn-default">Back</a> -->
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->
        <div class="box">
            <form action="{{ route('admin.sizes') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label for="title">Sizes<span class="text-danger">*</span></label>
                        <input type="text" name="sizes" placeholder="Sizes" class="form-control" value="{{isset($sizes) ? $sizes->sizes : ''}}">
                    <small>Insert Comma Seprated Values e.g S,M,L</small>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <!-- <a href="{{ route('admin.banners.index') }}" class="btn btn-default">Back</a> -->
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>

    </section>
    <!-- /.content -->
@endsection
