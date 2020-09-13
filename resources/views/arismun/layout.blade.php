<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{mix('/css/arismun.css')}}">
</head>
<body>
    <section class="section is-paddingless py-1 has-background-primary">
        <div class="container">
            <a class="has-text-white" href="/">&larr;ARIS</a>
        </div>
    </section>
    <!-- Navbar -->
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="container">

            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    <img src="/img/arismun/ARISMUN_header.svg" alt="">
                    
                </a>

                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
                    data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div class="navbar-menu">
                
                <div class="navbar-end">
                    <a class="navbar-item @if($title == 'ARISMUN 2020 Home')is-active is-tab @endif">
                       Welcome 
                    </a>
                    <a class="navbar-item">
                        About
                    </a>
                    <a class="navbar-item">
                        Secretariat
                    </a>
                    <div class="navbar-item">
                        <div class="buttons">
                            <a class="button is-light" href="https://docs.google.com/forms/d/e/1FAIpQLSe3OdswirR6eOVhBax3P4KVIT6bSSlBa9czBw-IE20Iu8W92Q/viewform">
                                Apply for Chair
                            </a>
                            <a href="https://docs.google.com/forms/d/e/1FAIpQLSffKN4wxejdgNrs3l3DN4SRaoOP37Nx7MaY8WP5sZ3DsMfsAw/viewform" class="button is-light">
                                Register As Delegate
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </nav>

    @yield('content')

</body>

</html>