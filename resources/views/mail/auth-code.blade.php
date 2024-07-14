@extends('layouts.mail')

@section('title', 'Auth code')

@section('content')
    <tr>
        <td style="font-size:1.75em;font-weight:700;letter-spacing:0.02em;padding:0 40px 20px 40px">
            Hi!
        </td>
    </tr>
    <tr>
        <td style="font-size:1.375em;font-weight:500;padding:0 60px 40px 60px;">
            Your authorization code for the RentCarUAE website
        </td>
    </tr>
    <tr align="center" style="font-size:1.75em;font-weight:700;letter-spacing:0.02em;">
        <td>{{ $code }}</td>
    </tr>
@endsection
