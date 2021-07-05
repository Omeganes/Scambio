<!DOCTYPE html>
<html lang="en">
@include('shared._head')
<body>
<section id="title">

    <!-- Nav Bar -->
    <div class="container-fluid imgdiv">


        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="">Scambio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#footer">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#categ">Categories</a>
                    </li>
                    <li class="nav-item">
                        <form class="form-inline">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="button">Find</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Title -->

        <div class="row titleclass">
            <div class="col-lg-6">
                <h1>Replace your assets with others and save your time</h1>
                <a href="login.html"> <button type="button " class="btn btn-dark btn-lg download-button"><i class="fas fa-sign-in-alt"></i> Login </button></a>
                <a href="stock-photo/dist/index.html"><button type="button " class="btn btn-outline-light btn-lg download-button"> Add goods</button></a>
            </div>
            <div class="col-lg-6">
                <i class="re-icon fas fa-people-carry fa-9x"></i>
            </div>
        </div>

    </div>

</section>


<!-- Features -->

<section id="features">

    <div class="container-fluid pad">

        <div class="row">

            <div class="col-lg-4 center">


                <i class="icons-style fas fa-check-circle fa-3x"></i>
                <h3 class="head-style">Easy to use.</h3>
                <p class="p-style">So easy to use, even a baby could do it.</p>
            </div>
            <div class="col-lg-4 center">
                <i class="icons-style fas fa-bullseye fa-3x"></i>
                <h3 class="head-style">Save money</h3>
                <p class="p-style">you don't need money to start</p>
            </div>
            <div class="col-lg-4 center">
                <i class="icons-style fas fa-heart fa-3x"></i>
                <h3 class="head-style">Save time</h3>
                <p class="p-style">Find who needs your assets quickly</p>
            </div>
        </div>

    </div>

</section>


<!-- categ -->

@foreach($categories as $category)
    <section id="categ">
        <h1 style="color:#011c14">{{$category->name}}</h1>
        <div class="top-content">
            <div class="container-fluid">
                <div id="carousel-example1" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner row w-100 mx-auto" role="listbox">
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 active">
                            <img src="assets/img/backgrounds/1.jpg" class="img-fluid mx-auto d-block" alt="img1">
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="assets/img/backgrounds/2.jpg" class="img-fluid mx-auto d-block" alt="img2">
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="assets/img/backgrounds/3.jpg" class="img-fluid mx-auto d-block" alt="img3">
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="assets/img/backgrounds/4.jpg" class="img-fluid mx-auto d-block" alt="img4">
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="assets/img/backgrounds/5.jpg" class="img-fluid mx-auto d-block" alt="img5">
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="assets/img/backgrounds/6.jpg" class="img-fluid mx-auto d-block" alt="img6">
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="assets/img/backgrounds/7.jpg" class="img-fluid mx-auto d-block" alt="img7">
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="assets/img/backgrounds/8.jpg" class="img-fluid mx-auto d-block" alt="img8">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel-example1" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example1" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

        </div>
    </section>
@endforeach


<footer id="footer">
    <h3 class="cta-h3">Contact us</h3>
    <i class="i-edit fab fa-twitter"></i>
    <i class="i-edit fab fa-facebook-f"></i>
    <i class="i-edit fab fa-instagram"></i>
    <i class="i-edit fas fa-envelope"></i>
    <p class="p-edit">© Copyright 2021 Scambio</p>
</footer>

</body>
</html>
