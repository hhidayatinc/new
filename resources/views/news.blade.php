@extends('layouts.app')
@section('title', 'Home')
@section('content')

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Carousel Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/carousel/">

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
  

<main role="main">

  <div class="container marketing">
    <h1 class="my-4">Articles</h1>
 
    <div class="row" >
      @foreach($artikel as $a)
    <div class="card" style="width: 18rem; border-radius: 20px; box-shadow: 0 4px 20px 0 rgba(34, 68, 123, 0.2); margin: 2.5rem; ">
  <img src="{{$a->urlToImage}}" class="card-img-top" alt="..." style=" border-radius: 20px 20px 0 0;">
  <div class="card-body" style="cursor: pointer;">
    <h5 class="card-title">{{$a->title}}</h5>
    <p class="card-text">{{$a -> description}}</p>
    
    <a href="{{$a->url}}" class="btn btn-primary">View More</a>
  </div>
</div>
@endforeach


  </div><!-- /.container -->
  

  <!-- PAGINATION -->
  

      
</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</html>


@endsection
