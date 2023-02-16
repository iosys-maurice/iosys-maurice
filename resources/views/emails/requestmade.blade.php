@extends('emails.layout.default')

@section('title', 'Contact Request')

@section('name')
Admin
@endsection

@section('body')
<p>
A new Demo request has been made to {{$info['name']}} @ email address {{$info['email']}}

<p>

    <p>Phone: {{$info['phone']}}</p>
    <h4>Message</h4>
    <p>{{$info['message']}}</p>
</p>

</p>
    
@endsection