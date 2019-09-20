<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>OBPA</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>OBPA</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/vendor/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/full-width-pics.css')}}" rel="stylesheet">
    <link href="{{asset('css/homestyle.css')}}" rel="stylesheet">


</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">OBPA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Access</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#service"  >Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Header - set the background image for the header in the line below -->
<header class=" bg-image-full ">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/slide1.jpg" width="" alt="First Slide">
            </div>

            <div class="carousel-item">
                <img src="img/slide2.jpg" width="" alt="Second Slide">
            </div>
            <div class="carousel-item">
            <img src="img/slide3.jpg"  alt="Third Slide">
        </div>


    </div>
    <!-- Carousel controls -->
    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next " href="#myCarousel" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
    </div>
    </div>

</header>

<!-- Content section -->
<section class="py-5">
    <div class="container">
        <h2 class="offset-1">Welcome to Online Building Permit  Application</h2>
        <p class="lead offset-4">Applied service is offered in expected time</p>
        <p>Online Building Permit Application facilitates all citizens of Rwanda to apply for building permit online from their homes without spending their time and money going physically to the offices of the ones who are responsible of this service in public sector.</p>
    </div>
</section>


<!-- Content section -->
<section class="py-5" id="service">
    <div class="container">
        <h1 class="offset-4">Our Services</h1>

        <div class="row">
            <div class="col-md-4 py-5">
                <div class="thumbnail">
                    <a href="#">
                        <img src="img/apply.jpg" alt="recive" style="width:100%">
                        <div class="caption">
                            <p>With Online  Building Permit  Application ,we receive your applications in local government institituion</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 py-5">
                <div class="thumbnail">
                    <a href="#">
                        <img src="img/process4.jpg" alt="processing" style="width:100%">
                        <div class="caption">
                            <p>With Online Building Permit Application, we process your application</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 py-5">
                <div class="thumbnail">
                    <a href="#">
                        <img src="img/feedback.jpg" alt="approval" style="width:100%">
                        <div class="caption">
                            <p>With Online Building Permit Application, we provide Favourable application feedback</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="py-2" id="contact">
    <div class="container ">
        <h2 class="offset-4">Contact us</h2>
        <p class="lead offset-3 py-5"><b>Email : </b> ebpoa@gov.rw ,
            <b>Toll free : </b> 4141 ,
            <b>POBOX : </b> 123B Kigali</p>

    </div>
</section>



<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy;Online Building Permit Application 2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="js/vendor/bootstrap.bundle.min.js"></script>

</body>

</html>
