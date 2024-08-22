<!DOCTYPE html>
<html class="no-js" lang="en">
@include('layouts.front.head-links')
@livewireStyles

<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">
            <img class="preloader__img" src="{{asset('front/images/preloader.png')}}" alt="">
        </div>
    </div>
    <!--====== Main App ======-->
    <div id="app">
        @livewire('header')


        @include('layouts.front.messages')
        

        @yield('content')
        @livewireScripts
        @include('layouts.front.footer')
        @include('layouts.front.foot-links')
    </div>
</body>

</html>