<nav class="navbar navbar-expand-lg navbar-dark navbar-light text-white p-5">
    <div class="container-fluid">
        <a class="navbar-brand" href={{route('home')}}>Scambio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggle-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav me-auto mb-2 mb-lg-0"></div>
            <div>
                <ul class="navbar-nav me-5 mb-lg-0">
                <li><a href="#" class="nav-item me-5">Contact us</a></li>
                <li><a href="#" class="nav-item me-5">Categories</a></li>
                <li><a href="{{route('dashboard')}}" class="nav-item me-5">{{auth()->user()->name}}</a></li>
                <li><a href="{{route('logout')}}" class="nav-item me-5">Log out</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
