@extends('layout')

@section('content')
<style>
    body{
  background-image: url(/assets/img/ya.jpg);
  background-repeat: no-repeat;
  background-size: cover;
}
  </style>
@if (session('successUpdate'))
<div class="alert alert-success">
    {{session('successUpdate')}}
</div>
@endif
@if (session('successDelete'))
<div class="alert alert-danger">
    {{session('successDelete')}}
</div>
@endif
@if (session('successComplated'))
<div class="alert alert-warning">
    {{session('successComplated')}}
</div>
@endif
<table class="table table-striped table-bordered">
    <tr>
        <td>No</td>
        <td>Kegiatan</td>
        <td>Deskripsi</td>
        <td>Batas Waktu</td>
        <td>Status</td>
        <td>Aksi</td>
    </tr>
    @php
        $no= 1;
    @endphp
    @foreach ($todos as $todo)
    <tr>
        {{-- tiap di lauting, $no bakal ditambah --}}
        <td>{{$no++}}</td>
        <td>{{$todo['title']}}</td>
        <td>{{$todo['description']}}</td>
        {{-- carbon : mengubah packge data pada laravel, nntinya sidata yang di 2022-11-22 
        formalnya jadi 22 november,2022 --}}
        <td>{{\carbon\carbon::parse($todo['data'])->format('J F, Y')}}</td>
        {{-- konsep ternary if satunya 1 nampilinteks complated kalo 0
        nampilin teks on-process tuh boolean kan? cuma antara 1 dan 0  --}}
        <td>{{$todo['status'] == 1 ? 'complated' : 'on-process'}}</td>
        <td>
            {{-- karena path {id} merupakan path dinamis, jadi kita harus ini path dinamis tersebut, 
            karena kita mengisinya dengan data dinamis/data dari databasenya id buat isi nya pake kurawal dua kali  --}}
            <a href="/edit/{{$todo['id']}}">edit</a>|
            <form action="/delete/{{$todo['id']}}"method="POST">
                @csrf

                @method('DELETE')
            <button type="submit">hapus</button>
            </form>
            {{-- button hanya muncul ketika statusnya masih on-process --}}
            @if ($todo['status'] == 0)
            <form action="/complated/{{$todo['id']}}"
            method="POST">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-success">complated</button>
            </form>
            @endif
        </td>
    @endforeach
</table>
@endsection