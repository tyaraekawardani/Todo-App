@extends('layout')

@section('content')
<div class="login">
  <style>
    body{
  background-image: url(/assets/img/ya.jpg);
  background-repeat: no-repeat;
  background-size: cover;
}
  </style>
  <p class="text-center">Log in</p>
  <form action="{{ route('login-baru') }}" method="POST">
    @csrf
    <div class="emlclass">
        <label>Email</label>
        <input type="email" placeholder="masukan email" name="email">
    </div>
    <div class="pswdclass">
        <label>Password</label>
        <input type="password" placeholder="masukan password" name="password">
    </div>
    <div class="tmblclass">
        <button type="submit" class="tombol-Login btn btn-primary my-3">login</button>
        <br>
    <a href="register">don"t have an account yet, sign up here!</a>
  </form>
</div>
@endsection