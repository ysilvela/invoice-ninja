@extends('master')

@section('head')	

<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/> 
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css"/>    

<style type="text/css">
    body {
        padding-top: 40px;
        padding-bottom: 40px;
    }
    .modal-header {
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
    }
    .modal-header h4 {
        margin:0;
    }
    .modal-header img {
        float: left; 
        margin-right: 20px;
    }
    .form-signin {
        max-width: 400px;
        margin: 0 auto;
        background: #fff;
    }
    p.link a {
        font-size: 11px;
    }
    .form-signin .inner {
        padding: 20px;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        border-left: 1px solid #ddd;
        border-right: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
    }
    .form-signin .checkbox {
        font-weight: normal;
    }
    .form-signin .form-control {
        margin-bottom: 17px !important;
    }
    .form-signin .form-control:focus {
        z-index: 2;
    }

</style>

@stop

@section('body')
<div class="container">


    {{ Former::open('login')->rules(['login_email' => 'required|email', 'login_password' => 'required'])->addClass('form-signin') }}
    <div class="modal-header">
        <img src="{{ asset('images/icon-login.png') }}" />
        <h4>Invoice Ninja | {{ trans('texts.account_login') }}</h4></div>
        <div class="inner">
            <p>
                {{ $errors->first('login_email') }}
                {{ $errors->first('login_password') }}
            </p>

            <p>
                {{ Former::text('login_email')->placeholder(trans('texts.email_address'))->raw() }}
                {{ Former::password('login_password')->placeholder(trans('texts.password'))->raw() }}
            </p>

            <p>{{ Button::success_submit(trans('texts.lets_go'), array('class' => 'btn-lg'))->block() }}</p>
            
            <p class="link">
                {{ link_to('forgot_password', trans('texts.forgot_password')) }}
            </p>


            @if (Session::has('warning'))
            <div class="alert alert-warning">{{ Session::get('warning') }}</div>
            @endif

            @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif

            @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

        </div>

        {{ Former::close() }}

        @if (!Utils::isNinja())
        <p/>
        <center>
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=635126583203143";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

            <div class="fb-follow" data-href="https://www.facebook.com/invoiceninja" data-colorscheme="light" data-layout="button" data-show-faces="false"></div>&nbsp;&nbsp;

            <a href="https://twitter.com/invoiceninja" class="twitter-follow-button" data-show-count="false" data-related="hillelcoren" data-size="medium">Follow @invoiceninja</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

            <iframe src="https://ghbtns.com/github-btn.html?user=hillelcoren&repo=invoice-ninja&type=star&count=false" frameborder="0" scrolling="0" width="50px" height="20px"></iframe>
        </center>
        @endif

    </div>

    @stop