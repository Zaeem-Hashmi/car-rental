<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">
    <div class="container"><a class="navbar-brand" href="/"><i class="fa fa-taxi"></i>&nbsp;Urban Ride</a><button data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive"
            aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto text-uppercase">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">about</a></li>
                <li class="nav-item"><a class="nav-link" href="/#about">services</a></li>
                <li class="nav-item" style="margin-top: 10px;"><a class="btn btn-primary" role="button"
                        style="background: rgba(10,9,8,0.27);" href="/booking">Book A Ride</a></li>
                        @auth
                        <li class="nav-item" style="margin-top: 10px;"><a class="btn btn-primary btn-login" role="button"
                            href="#" style="background: rgb(99,168,231);" onclick="document.getElementById('logout').submit();">Logout</a></li>            
                            <form action="/logout" method="post" hidden id="logout">
                            @csrf
                            </form>
                        @endauth

                        @guest
                        <li class="nav-item" style="margin-top: 10px;"><a class="btn btn-primary btn-book" role="button"
                            href="/become-driver">Become A Driver</a></li>
                        <li class="nav-item" style="margin-top: 10px;"><a class="btn btn-primary btn-login" role="button"
                                href="/login" style="background: rgb(99,168,231);">Login</a></li>
                        @endguest
            </ul>
        </div>
    </div>
</nav>
