@extends('layouts.app')
@section('title', 'Manage')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog Post - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/blog-post.css" rel="stylesheet">

</head>

<body>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

    <p> <a href="/add" class="btn btn-outline-dark">Tambah Data</a> </p>
<table class="table table-striped">
<thead class="thead">
 <tr>
 <th>No</th> 
 <th>Judul</th>
 <th>Tanggal</th>
 <th>Tindakan</th>
 </tr>
 </thead>
 <tbody>
 @foreach($article as $a)
 <tr>
 <td>{{$a->id}}</td>
 <td>{{$a->title1}}</td>
 <td>{{$a->created_at}}</td>
 <td> <a href="editarticle/{{$a->id}}" class="btn btn-outline-success">Edit Data</a>
 <a href="delete/{{ $a->id }}" class="btn btn-outline-danger">Hapus</a></td>
 </tr>
 @endforeach
 </tbody>
</table>
</div>

</html>
@endsection