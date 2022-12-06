@extends('layout')

@section('content')
{{-- <p>halaman register</p> --}}
<div class="container">
    <div class="d-flex justify-content-center">
        <style>
            body{
          background-image: url(/assets/img/ya.jpg);
          background-repeat: no-repeat;
          background-size: cover;
      }
          </style>
    <div class="kiw">
      <form action="/register" method="POST">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Username</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <br>
        <a href="/">u have login!</a>
      </div>
      </form>
    </div>
</div>
@endsection