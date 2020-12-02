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

    <div class="jumbotron">
    <p class="h1 text-center"> Form Tambah Artikel </p>
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="/store" method="post" enctype="multipart/form-data">
 @csrf 
 <div class="form-group">
 <label for="title">Judul</label>
 <input type="text" class="form-control" 
required="required" name="title1"></br>
 </div>
 <div class="form-group">
 <label for="exampleFormControlTextarea1">Content</label>
    <textarea class="form-control" required="required" name="content1" rows="3"></textarea>

 </div>
 <div class="form-group">
 <label for="image">Feature Image</label>
 <br><input type="file"  class="form-control" required="required" name="featured_image1"></br>
 </div>
 <button type="submit" name="add" class="btn btn-primary float-right">Tambah Data</button>

 </form>
    </div>
    </html>
@endsection