@extends('layouts.app')

@section('title')
I.O. System Limited,  Support Contact
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
            color: #03071E;
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
    <div class="container">

        <div class="card row mx-auto col-md-10">
            <div class="card-body">
                <div class="card-body">
              <h2 class="text-center text-muted text-uppercase font-weight-bold">Contact</h2>

      <!-- Contact Section Form -->
      <div class="row">
        <div class="col-md-10 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            {!! Form::open(['url' => route('support.request'), 'method' =>'POST',]) !!}
          <div class="control-group">
              <div class="form-group mb-0 pb-2">
                <label class='spcolor font-weight-bold'>Name</label>
                <input class="form-control" id="name" name="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label class='spcolor font-weight-bold'>Email Address</label>
                <input class="form-control text-dark" id="email" name="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label class='spcolor font-weight-bold'>Phone Number</label>
                <input class="form-control" id="phone" type="tel" name="phone" placeholder="Phone Number" required="required" data-validation-required-message="Please enter your phone number.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label class='spcolor font-weight-bold'>Message</label>
                <textarea class="form-control" id="message" rows="5" name="message" placeholder="Message" required="required" data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-success btn-lg" id="sendMessageButton">Request Support</button>
            </div>
            {!! Form::close() !!}

        </div>
      </div>

    </div>
    
<hr>
<div class="text-center">
    @include('layouts.partials.footer')
</div>
</div>
</div>
@endsection