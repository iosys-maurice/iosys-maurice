@extends('layouts.portal')

@section('css')
    <script src="https://js.stripe.com/v3/"></script>

@endsection

@section('title')
Check Out
@endsection


@section('content')
<div class="container navbar bg-white shadow-sm">
    <div class="row col-md-12 m-0 p-0">
      <div class="col-md-8 pt-3">
        <h4 class="mb-3">Contact and Billing address</h4>
                  
        {!! Form::open(['url'=>route('payment.submit'), 'method'=>'POST', 'id'=> 'payment-form']) !!}
            <div class="mb-3">
                <label for="username">Contact Email</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                  </div>
                  {!! Form::text('emailadd', auth()->user()->email, ['class'=>"form-control", 'id'=>"emailaddress", 'placeholder'=>"you@example.com", 'required']) !!}
                  <div class="invalid-feedback">
                    Please enter a valid email address for confirmation.
                  </div>
                </div>
            </div>

          <div class="mb-3">
            <label for="name">Contact Name</label>
            {!! Form::text('contactname',auth()->user()->name , ['class'=>"form-control", 'id'=>"contactname", 'required']) !!}           
          </div>

          <div class="mb-3 row">
            <div class="mb-3 px-3">
              <label for="address" class="align-text-top">Billing Address:</label>
            </div>
            <div>
                  <div id="address_line1">{{$billingadd[0]['address_line1']}}</div>
                  {!! Form::hidden('address_line1', $billingadd[0]['address_line1']) !!}
                  {!! Form::hidden('address_city', $billingadd[0]['address_city']) !!}
                  {!! Form::hidden('address_state', $billingadd[0]['address_state']) !!}
                  {!! Form::hidden('address_zip', $billingadd[0]['address_zip']) !!}
                  {!! Form::hidden('address_country', $billingadd[0]['address_country']) !!}
                  <div id="address_city">{{$billingadd[0]['address_city']}}</div>
                  <div><span id="address_state">{{$billingadd[0]['address_state']}}</span> , <span id="address_zip">{{$billingadd[0]['address_zip']}}</span></div>
                  <div id="address_country">{{$billingadd[0]['address_country']}}</div>
            </div>
            
          </div>
          <hr class="mb-4">

          <h4 class="mb-3">Payment</h4>

          <div class="d-block my-3">
          </div>
          <div class="row">
            <div class="col-md-12 mb-12">
                <label for="cc-expiration">Name on Card</label>
                {!! Form::text('name_on_card','', ['class'=>"form-control", 'required','id'=>"name_on_card"]) !!}
                <div class="invalid-feedback">
                  Name on Card required
                </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-12 mb-12">
                <label for="card-element" class="pt-1">
                    Credit or debit card
                </label>
              <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
              </div>
          
              <!-- Used to display form errors. -->
              <div id="card-errors" role="alert"></div>
            </div>
          </div>
          <hr class="mb-4">
          {!! Form::submit('Complete Checkout', ['class'=>"btn btn-primary btn-lg btn-block",'id'=>'complete_submit']) !!}

      </div>
      <div class="col-md-4  pt-3">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">{{$cart->count()}}</span>
            </h4>
            <div class="d-none">{!!$inv = 'Invoice - '!!}</div>

           
            <ul class="list-group mb-3">
              @foreach ($cart as $ct)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <div>
                  <h6 class="my-0">Invoice</h6>
                  <small class="text-muted">{{$ct->name}}</small>
                  <div class="d-none">{!!$inv .= $ct->name . "," !!}</div>

                  {!! Form::hidden('inv', $inv) !!}
                  {!! Form::hidden('id', $ct->id) !!}
                  </div>
                  <div class="d-none">{!!$cur = $ct->options->currency!!}</div>
                  <span class="text-muted">{!! Akaunting\Money\Money::$cur($ct->price, true)!!}</span>
                </li>
              @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total ({{$cur}})</span>
                    {!! Form::hidden('cart_currency', $cur) !!}
                    <strong>{{ Akaunting\Money\Money::$cur($ct->total, true)}}</strong>
                    {!! Form::hidden('cart_total', $ct->total) !!}

                </li>
                </ul>
      </div>
      {!! Form::close() !!}

    </div>
</div>
@endsection


@section('js')
    <script>
        var stripe = Stripe('{{env('STRIPE_KEY')}}');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card',
  {
    style: style,
    hidePostalCode: true
  });

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  document.getElementById('complete_submit').disabled = true;

  var options = {
    name: document.getElementById('name_on_card').value,
    address_line1: document.getElementById('address_line1').innerHTML,
    address_city: document.getElementById('address_city').innerHTML,
    address_state: document.getElementById('address_state').innerHTML,
    address_zip: document.getElementById('address_zip').innerHTML,
    address_country: document.getElementById('address_country').innerHTML,
  }

  stripe.createToken(card, options).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

      // Submit the form with the token ID.
      function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}

    </script>
@endsection