@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

        @include('layouts.errors-and-messages')
        <!-- Default box -->
        <div class="box">
            <form action="{{ route('admin.offers.store') }}" method="post" enctype="multipart/form-data">
            <div class="box-body">
                <h2>Create Offer</h2>
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Offer Name</label>
                    <input class="form-control" type="text" name="offer_name" id="name" value="{{ old('offer_name') }}" placeholder="Offer Name">
                </div>
                <div class="form-group">
                    <label for="color">Discount</label>
                    <input class="form-control" type="text" name="discount_percent" value="{{ old('discount') }}" placeholder="Discount Percent">
                </div>
                <div class="form-group">
                    <label for="color">Start Date</label>
                    <input class="form-control" type="date" name="start_date" value="{{ old('start_date') }}" placeholder="Start Date">
                </div>
                <div class="form-group">
                    <label for="color">End Date</label>
                    <input class="form-control" type="date" name="end_date" value="{{ old('end_date') }}" placeholder="End Date">
                </div>
                <div class="form-group">
                    <label for="color">Offer Banner</label>
                    <input class="form-control" type="file" name="offer_banner">
                </div>
            </div>
            <!-- /.box-body -->
                <div class="box-footer btn-group">
                    <a href="{{ route('admin.order-statuses.index') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
@section('js')
    <script src="{{ asset('js/jscolor.min.js') }}" type="text/javascript"></script>
@endsection
