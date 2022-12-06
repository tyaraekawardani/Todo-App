@extends('layout')

@section('content')
    
<div class="container">
  <div class="d-flex justify-content-center">
    <style>
      body{
    /* background-image: url(/assets/img/ya.jpg);
    background-repeat: no-repeat;
    background-size: cover; */
}
    </style>
  {{-- <div class="card" style="width: 18 rem"> --}}
    <div class="wow">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Username</label>
          <input type="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
          {{-- <input type="checkbox" class="form-check-input" id="exampleCheck1"> --}}
          {{-- <label class="form-check-label" for="exampleCheck1">Check me out</label> --}}
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
  </div>
</div>
@endsection