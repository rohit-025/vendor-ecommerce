<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('css/admin.min.css') }}">
    @yield('css')
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicons/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicons/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicons/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicons/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicons/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicons/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicons/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('favicons/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicons/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
</head>
<body class="hold-transition skin-purple sidebar-mini">
<noscript>
    <p class="alert alert-danger">
        You need to turn on your javascript. Some functionality will not work if this is disabled.
        <a href="https://www.enable-javascript.com/" target="_blank">Read more</a>
    </p>
</noscript>
<!-- Site wrapper -->
<div class="wrapper">
    @include('layouts.admin.header', ['user' => $admin])

    @include('layouts.admin.sidebar', ['user' => $admin])

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include("layouts.admin.breadcrumb")
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    @include('layouts.admin.footer')

    @include('layouts.admin.control-sidebar')
</div>
<!-- ./wrapper -->

<script src="{{ asset('js/admin.min.js') }}"></script>
<script src="{{ asset('//cdn.ckeditor.com/4.8.0/standard/ckeditor.js') }}"></script>
<!-- <script src="{{ asset('front/ckeditor/ckeditor.js') }}"></script> -->
<script src="{{ asset('js/scripts.js?v=0.2') }}"></script>
@yield('js')
<input type="hidden" id="csrf" value="{{ csrf_token() }}" />
<script>
    jQuery(document).ready(function() {
	
	// 1 Capitalize string - convert textbox user entered text to uppercase
	jQuery('#code').keyup(function() {
		$(this).val($(this).val().toUpperCase());
	});
    })

    
    $(document).ready(function () {
        $("#category").on("change", function () {
            debugger
            var id = $("#category").val();
            var offer_id = $('#offer_id').val()
            $.ajax({
                url: "../admin/product-by-category/" + id,
                type: "GET",
                data:{
                    'offer_id':offer_id,
                    // 'end_date':endDate
                },
                headers: {
                    "X-CSRF-TOKEN": $("#csrf").val(),
                },

                success: function (response) {
                    $("#all").show()
                    var len = 0;
                    len = response.length;

                    if (len > 0) {
                        for (var i = 0; i < len; i++) {
                            var str = '<input class="form-group products-list" name="product_id[]" type="checkbox" value="' + response[i].product_id + '">' + '<label for="vehicle1">' + response[i].products.name + "</label><br>";

                            $("#products").prepend(str);
                        }
                    }
                },
            });
            
            var button = '<br><button type="submit" class="btn btn-primary">Submit</button>';
            $("#products").find("#sub").empty();
            $("#products").find("#sub").append(button);
        });
    });


    CKEDITOR.replace( 'long_description' );

</script>
</body>
</html>
