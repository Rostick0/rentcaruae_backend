@extends('layouts.mail')

@section('title', $theme)

@section('content')
    <tr>
        <td style="font-size:1.375em;font-weight:500;padding:0 20px 0 20px">
            {{ $content }}
        </td>
    </tr>
@endsection
