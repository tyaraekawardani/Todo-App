@extends('layout')

@section('content')
<style>
    body{
  background-image: url(/assets/img/ya.jpg);
  background-repeat: no-repeat;
  background-size: cover;
}
  </style>
    <form action="/store" method="POST" style="max-width: 500px; margin: auto;">
        {{--menampilkan alert ketika validasi menghasilkan eror--}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>  
                    @endforeach
                </ul>
            </div>
        @endif
        {{--mengirim data ke controller yang ditampung oleh request $request--}}
        @csrf
       <div class="d-flex flex-column">
            <label>Title</label>
            <input type="text" name="title">
       </div>
       <div class="d-flex flex-column">
            <label>Data</label>
            <input type="date" name="date">
       </div>
       <div class="d-flex flex-column">
            <label>Description</label>
            <textarea name="description" cols="30" rows="10"></textarea>
       </div>
        <button type="submit">Kirim</button>
    </form>
@endsection