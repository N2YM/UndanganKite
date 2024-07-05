@extends('Template.User.base')

@section('content')
    <h1>Hii</h1>
    <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
@endsection
