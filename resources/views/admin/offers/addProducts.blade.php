@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

        @include('layouts.errors-and-messages')
        
        <div class="col-md-3">
            <select class="form-control" name="category" id="category">
                <option value="" disabled selected>--Select Category--</option>
                @foreach($categories as $category)
                <option value="{{ $category->id}}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="box-body" style="overflow: scroll;height: 400px;">
            <div id="all" hidden>
                <input class="form-group" id="select_all" name="select_all" type="checkbox"><label for="vehicle1">Select All</label>
            </div>
            <form method="post" id="products" action="{{ url('admin/offer/add-products') }}" class="">
                @csrf
                <input name="offer_id" id="offer_id" value="{{ $offerId }}" hidden/>
                <div id="sub"></div>
            </form>

                        
        </div>
    </section>
    <!-- /.content -->
@endsection
@section('js')
    <script src="{{ asset('js/jscolor.min.js') }}" type="text/javascript"></script>
@endsection
