@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($coupons)
            <div class="box">
                <div class="box-body">
                    <h2>Coupons</h2>
                    @include('layouts.search', ['route' => route('admin.coupons.index')])
                    <table class="table">
                        <thead>
                            <tr>
                                <td class="col-md-2">Coupon Code</td>
                                <td class="col-md-1">Discount Percent</td>
                                <td class="col-md-2">Minimum Amount</td>
                                <td class="col-md-2">Expiry</td>
                                <td class="col-md-3">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($coupons as $coupon)
                            <tr>
                                <td>{{ $coupon->code }}</td>
                                <td>{{ $coupon->discount }}</td>
                                <td>{{ $coupon->min_amount }}</td>
                                <td>{{ $coupon->expiry }}</td>
                                <td>
                                    <form action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.coupons.edit', $coupon->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
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