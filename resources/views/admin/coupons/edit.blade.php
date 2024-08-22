@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">
        <form action="{{ route('admin.coupons.update',$coupon->id) }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                @method('put')
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="image">Coupon Code</label>
                    <input type="text" name="code" id="code" class="form-control" value="{{$coupon->code}}" required>
                </div>
                <div class="form-group">
                    <label for="image">Discount Percent</label>
                    <input type="text" name="discount" id="discount" class="form-control" value="{{$coupon->discount}}" required>
                </div>
                <div class="form-group">
                    <label for="image">Minimum Amount</label>
                    <input type="text" name="min_amount" id="min_amount" value="{{$coupon->min_amount}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image">Expiry</label>
                    <input type="datetime-local" name="expiry" id="expiry" value="{{($coupon->expiry != null) ? (date('Y-m-d', strtotime($coupon->expiry)).'T'.date('H:i', strtotime($coupon->expiry))):'' }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image">Applicable For</label>
                    <select name="type" class="form-control">
                        <option value="general" {{($coupon->type == "general") ? 'selected' : ''}}>General</option>
                        <option value="subscribers" {{($coupon->type == "subscribers") ? 'selected' : ''}}>Subscribers</option>

                    </select>
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