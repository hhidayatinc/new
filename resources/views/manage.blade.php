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
    
   <p><a href="/print" class="btn btn-primary" target="_blank" >Cetak Data </a></p>
 
   <p><a href="/create" class="btn btn-primary">Tambah Data</a></p>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form action="/manage/search2" method="GET" class="form-inline">
		<input type="search" class="form-control mr-sm-2"name="search" placeholder="Cari Artikel .." value="{{ old('search') }}">
		<input type="submit" value="Search" class="btn btn-outline-success my-2 my-sm-0">
	</form>
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
 <td>
                <form action="{{ route('articles.destroy',$a->id) }}" method="POST">
   
                    <a class="btn btn-info" href="article/{{$a->id}}">Show</a>
    
                    <a class="btn btn-primary" href="editarticle/{{$a->id}}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
 <!-- <td>
 <a href="article/{{$a->id}}" class="btn btn-outline-success">Show</a>
 <a href="editarticle/{{$a->id}}" class="btn btn-outline-success">Edit Data</a>
 <a href="delete/{{ $a->id }}" class="btn btn-outline-danger">Hapus</a></td>
 </tr> -->
 @endforeach
 </tbody>
</table>

</div>
</html>
@endsection