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
  <form action="/manage/search2" method="GET" class="form-inline">
		<input type="search" class="form-control mr-sm-2"name="search" placeholder="Cari Artikel .." value="{{ old('search') }}">
		<input type="submit" value="Search" class="btn btn-outline-success my-2 my-sm-0">
	</form>
  <hr>
  
<div class="row">
<a href="/create"   class="btn btn-primary float-left" ><i class="fas fa-plus"></i>Tambah Data</a>
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
  <a href="/print"  class="btn btn-primary float-right" target="_blank"><i class="fas fa-"></i>Cetak PDF</a>

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

 @endforeach
 </tbody>
</table>


 <!-- PAGINATION -->
 
 <div class="pagination justify-content-center">
      {{$article-> links()}}
    </div>
    
</div>
</html>
@endsection