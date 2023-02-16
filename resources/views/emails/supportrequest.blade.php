@extends('emails.layout.default')

@section('title', 'Contact Request')

@section('name')
{{$info['name']}}
@endsection

@section('body')
<p>
   Thank you for contacting us.  Your information has been relayed to our support team, please allow for up to 24 hours for response.
</p>
<p>
    <p>Phone: {{$info['phone']}}</p>
    <h4>Message</h4>
    <p>{{$info['message']}}</p>
</p>

<p>
    Should you have any additional question please feel free to reach out to us at <a href="mailto:support@iosys.com.jm">support@iosys.com.jm</a>
</p>
    
@endsection