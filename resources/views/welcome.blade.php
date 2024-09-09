@extends('layouts.app')

@section('title')
I.O. System Limited,  A Jamaican Owned I.T Company
@endsection

@section('css')
    <style>
        html,
        body,
        header,
        .view {
            height: 100%;
        }

        @media (max-width: 740px) {
            html,
            body,
            header,
            .view {
                height: 1000px;
            }
        }
        @media (min-width: 800px) and (max-width: 850px) {
            html,
            body,
            header,
            .view {
                height: 600px;
            }
        }

        .btn .fa {
        margin-left: 3px;
        }

        .top-nav-collapse {
        background-color: #330000 !important;
        }

        .navbar:not(.top-nav-collapse) {
            background: transparent !important;
        }

        @media (max-width: 991px) {
            .navbar:not(.top-nav-collapse) {
                background: #330000 !important;
            }
        }

        .rgba-gradient {
        background: -moz-linear-gradient(45deg, rgba(42, 27, 161, 0.7), rgba(29, 210, 177, 0.7) 100%);
        background: -webkit-linear-gradient(45deg, rgba(42, 27, 161, 0.7), rgba(29, 210, 177, 0.7) 100%);
        background: -webkit-gradient(linear, 45deg, from(rgba(42, 27, 161, 0.7)), to(rgba(29, 210, 177, 0.7)));
        background: -o-linear-gradient(45deg, rgba(42, 27, 161, 0.7), rgba(29, 210, 177, 0.7) 100%);
        background: linear-gradient(to 45deg, rgba(42, 27, 161, 0.7), rgba(29, 210, 177, 0.7) 100%);
        }

        html, body {
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
        
        .full-height {
            height: 100%;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #330000;
            padding: 0 25px;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .links>a:hover{
            text-decoration: underline;
            color: #01BAEF;
            
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .img-main{
            width:480px;
        }

        .lower-text{
            font-size: 20px;
        }
        
        .specialnote{
            padding-top: 5px;
            font-size: 12px;
            color: #03071E;
        }
        .spcolor{
            color: #d90429;
        }
        
    </style>
@endsection

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            <figure class="logo animated fadeInDown delay-07s ">
                <a href="/"><img src="img/logo-500.png" alt="" class="img-main"></a>
            </figure>
        </div>
            <p class="spcolor lower-text">
                <b class="font-weight-bold">I.O. System Limited </b><b class="font-weight-bold text-muted">(iosys), A Privately Owned I.T Company</b>
            </p>
            <div class="links">
            {{-- <a href="https://fiwiyaad.com" disabled class="disabled">FiwiYaad</a>
            <a href="{{ route('tokengen.index') }}">TokenGen</a>
            <a href="#">ClickClock</a>
            <a href="#">Pass-Q</a> --}}
        </div>
{{-- <h6 class="specialnote"><small> *** <b><i>ClickClock</i></b> and <b><i>Pass-Q</i></b> are current privately used platforms and not yet available to the public</small></h6> --}}
        
    </div>
</div>
@endsection