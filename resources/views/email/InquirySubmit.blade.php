@extends('layouts.email')
@section('content')

    <h2 style="font-weight: 500;font-size: 32px;color: #fff;">Hi!</h2>
    <p>A new inquiry has been submitted</p>
    <p>
        {{$inquiry->message}}
    </p>
@endsection
