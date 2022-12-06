@extends('layout')

@section('content')
<style>
    body{
  background-image: url(/assets/img/ya.jpg);
  background-repeat: no-repeat;
  background-size: cover;
}
  </style>
<a href="{{ route('logout') }}" style="color:blueviolet; text-style:underline">Logout</a>

<h1>Username : {{ auth()->user()->username }}</h1>
<h1>Email : {{ auth()->user()->email }}</h1>

<h1>Selamat Datang di Halaman Dashboard</h1>
@if (Session::get('addTodo'))
<div class="alert alert-success">
    {{Session::get('addTodo')}}
</div>
@endif

@if(session('isGuest'))
<h2>
    <b>
        <i>
            {{session('isGuest') }}
        </i>
    </b>
</h2>
@endif

@endsection