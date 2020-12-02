@extends('layouts.app')
@section('title', 'Article')
@section('sidebar')
@endsection
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

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">{{$article->title1}}</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">Start Bootstrap</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on {{$article->created_at}}</p>

        <hr>

        <!-- Preview Image -->
        <!-- <img class="img-fluid rounded" src="{{$article->featured_image1}}" alt=""> -->
        <img class="img-fluid rounded" src="{{$article->featured_image1}}" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">{{$article->content1}}</p>

        

        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form action="" method="post">
            @csrf
            <input type="hidden" name="_token" value="
            <?php echo csrf_token()?>">
              <div class="form-group">
              <p>Name : </p>
               <input class="form-control" type="text" name="nama"></input>
              </div>
              <div class="form-group">
              <p>Comment : </p>
               <input class="form-control" type="text" name="komentar"></input>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

        <!-- Single Comment -->
        @foreach($komen as $c)
        @if($c->id_article==$id)
        <div class="media mb-4">
          
          <div class="media-body">
            <h2 class="mt-0">{{$c->name}}</h2>
            <h5 >{{$c->comment}}</h5>
          </div>
        </div>
      </div>
      @endif
      @endforeach

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>


@endsection