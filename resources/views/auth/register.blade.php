@extends('layouts.front.app')

@section('content')
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->



<!--====== App Content ======-->
<div class="app-content">

<!--====== Section 1 ======-->
<div class="u-s-p-y-60">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="breadcrumb">
                <div class="breadcrumb__wrap">
                    <ul class="breadcrumb__list">
                        <li class="has-separator">

                            <a href="{{route('home')}}">Home</a></li>
                        <li class="is-marked">

                            <a href="{{route('register')}}">Signup</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Section 1 ======-->


<!--====== Section 2 ======-->
<div class="u-s-p-b-60">

    <!--====== Section Intro ======-->
    <div class="section__intro u-s-m-b-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__text-wrap">
                        <h1 class="section__heading u-c-secondary">CREATE AN ACCOUNT</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Intro ======-->


    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="row row--center">
                <div class="col-lg-6 col-md-8 u-s-m-b-30">
                    <div class="l-f-o">
                        <div class="l-f-o__pad-box">
                            <h1 class="gl-h1">PERSONAL INFORMATION</h1>
                            <form class="l-f-o__form" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="reg-fname">NAME *</label>

                                    <input class="input-text input-text--primary-style" type="text" id="name" name="name" placeholder="Name" required>
                                    
                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                </div>
                                
                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="reg-email">E-MAIL *</label>

                                    <input class="input-text input-text--primary-style" type="text" id="email" name="email" placeholder="Enter E-mail" required>

                                    @if ($errors->has('email'))
                                    <span class="help-block" >
                                        <strong style="color:red">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="reg-password">PASSWORD *</label>

                                    <input class="input-text input-text--primary-style" type="password" id="password" name="password" placeholder="Enter Password" required>
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>

                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="reg-password">CONFIRM PASSWORD *</label>

                                    <input class="input-text input-text--primary-style" type="password" id="password-confirm" name="password_confirmation" placeholder="Confirm Password" required>
                                    
            
                                </div>
                                <div class="u-s-m-b-15">

                                    <button class="btn btn--e-transparent-brand-b-2" type="submit">CREATE</button></div>

                                <a class="gl-link" href="{{route('home')}}">Return to Store</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - Section 2 ======-->
</div>
<!--====== End - App Content ======-->

@endsection
