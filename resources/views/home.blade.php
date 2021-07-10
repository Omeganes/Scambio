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
                        <a class="nav-link" href="{{route('categories.index')}}">Categories</a>
                    </li>

                    @if(Auth::user())
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                   id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ auth()->user()->name }}
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href={{route('dashboard')}}>Profile</a></li>
                                    <li><a class="dropdown-item" href={{route('dashboard.edit')}}>Edit Profile</a></li>
                                    <div class="dropdown-divider"></div>
                                    <li><a class="dropdown-item" href={{route('logout')}}>Log out</a></li>
                                    <div class="dropdown-divider"></div>
                                    <li>
                                        <span class="dropdown-item">Credit:
                                            <span class="text-primary">{{auth()->user()->credit}}</span>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">Login</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <form class="form-inline" action={{route('products.index')}}>
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query">
                            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </li>


                </ul>
            </div>
        </nav>

        <!-- Title -->

        @include('shared._flash')

        <div class="row titleclass">
            <div class="col-lg-6">
                <h1>Exchange your belongings with others and save your time</h1>
                <a href="{{route('login')}}"> <button type="button" class="btn btn-dark btn-lg download-button"><i class="fas fa-sign-in-alt me-3"></i> {{Auth::user() ? "Profile" : "Login"}}</button></a>
                <a href="{{route('products.create')}}"><button type="button" class="btn btn-outline-light btn-lg download-button">Add belongings</button></a>
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
                <div id="carousel-example-{{$category->id}}" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner row w-100 mx-auto" role="listbox">
                        @for($i = 0; $i< 5; $i++)
                            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 {{ $i != 0 ?: "active"}}">
                                <img src="{{$category->products[$i]->images[0]}}" class="img-fluid mx-auto d-block" alt="img1">
                            </div>
                        @endfor
                    </div>
                    <a class="carousel-control-prev" href="#carousel-example-{{$category->id}}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-{{$category->id}}" role="button" data-slide="next">
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
