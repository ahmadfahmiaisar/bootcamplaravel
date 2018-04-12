
@extends('layouts.lte')
@section('css')
  <style>

    .container{
      background: white;
      border-radius: 4px;
    }
  </style>
@endsection
@section('header')
User
@endsection
@section('content')
<div class="container p-4">
  <h1 class="text-center">U S E R</h1>
    <a class="btn btn-md btn-success" href="users/create" >Tambah User</a><br><br>
  <table class="table">
    <tr>
      <td>No</td>
      <td>Nama</td>
      <td>Email</td>
      <td>Opsi</td>
    </tr>
    @php
      $no = 1;
    @endphp
    @foreach($user as $users)
    <tr>
      <td>{{$no++}}</td>
      <td>{{$users->name}}</td>
      <td>{{$users->email}}</td>
      <td>
        <form action="users/{{$users->id}}" method="post">
          {{csrf_field()}}
        <button type="button" class="btn btn-sm btn-primary" name="button" onclick="location.href='users/{{$users->id}}/edit'"> <i class="fa fa-pencil"></i>   Edit</button>
        <button type="submit" class="btn btn-sm btn-danger" name="submit" onclick="confirm('Yakin ingin menghapus ?')"> <i class="fa fa-trash"></i> Hapus</button>
      </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection
