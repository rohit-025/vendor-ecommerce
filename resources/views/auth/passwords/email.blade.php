@extends('layouts.front.app')

@section('content')
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
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
            <!-- <div class="breadcrumb">
                <div class="breadcrumb__wrap">
                    <ul class="breadcrumb__list">
                        <li class="has-separator">

                            <a href="index.html">Home</a></li>
                        <li class="is-marked">

                            <a href="lost-password.html">Reset</a></li>
                    </ul>
                </div>
            </div> -->
            @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
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
                        <h1 class="section__heading u-c-secondary">FORGOT PASSWORD?</h1>
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
                            <h1 class="gl-h1">PASSWORD RESET</h1>

                            <span class="gl-text u-s-m-b-30">Enter your email or username below and we will send you a link to reset your password.</span>
                            <form class="l-f-o__form" role="form" method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="reset-email">E-MAIL *</label>

                                    <input class="input-text input-text--primary-style" type="email" id="email" name="email" placeholder="Enter E-mail">
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                                
                                    <div class="u-s-m-b-30">

                                    <button class="btn btn--e-transparent-brand-b-2" type="submit">Send Password Reset Link</button></div>
                                <div class="u-s-m-b-30">

                                    <a class="gl-link" href="{{route('login')}}">Back to Login</a></div>
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
