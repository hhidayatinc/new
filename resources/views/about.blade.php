@extends('layouts.app')
@section('title', 'About')
@section('sidebar')
@parent
<p>Sidebar halaman Profil.</p>
@endsection
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
  <body >


<main role="main">

  

  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <h1 class="my-4">Get To Know About Me<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-check-fill" fill="darkblue" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9.854-2.854a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
</svg></h1>
    <div class="row">
      <div class="col-lg-4">
      <img class="bd-placeholder-img rounded-circle" width="240" height="240" src="images/girl.png"></img>
        <h2>My Name & Birthdate</h2>
        <p> </p>
        <p>Hello, my name Hidayati Nur Chasanah usually my friends call me Ana. I was born on 13 October, 2001.</p>
        <p><a class="btn btn-primary" href="https://www.instagram.com/hidayatinc/" role="button">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
      <img class="bd-placeholder-img rounded-circle" width="240" height="240" src="images/graduation.png"></img>
        <h2>Education</h2>
        <p>Back in elementary school I attended SDN Percobaan 2 Malang and graduated in 2013. Then went on to SMP Negeri 6 Malang and graduated in 2016. I went to SMA Negeri 5 Malang, then graduated in 2019 and went on to study at State Polytechnic of Malang until now in the Department of Information Technology .</p>
        <p><a class="btn btn-primary" href="https://www.polinema.ac.id/" role="button">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
      <img class="bd-placeholder-img rounded-circle" width="240" height="240" src="images/dreams.png"></img>
        <h2>My Dreams</h2>
        <p>I have dreams to become a database designer or software testing at one of the largest technology companies </p>
        <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
     
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">
    <h1 class="my-4">Get To Know About Me : Recently I Did The Most!<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill" fill="red" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
</svg></h1>
    
    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Try New Recipe. <span class="text-muted">Its fun and challenging!</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5">
        <img src="images/cooking.png" width="400" height="400">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Listening Music. <span class="text-muted">Find yourself through music!</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="images/listening.png" width="400" height="400">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Watch a lot of videos on Youtube!</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5">
      <img src="images/video.png" height="400" width="600">
      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>&copy; 2017-2020 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</html>

@endsection