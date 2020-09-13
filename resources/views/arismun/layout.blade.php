<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{mix('/css/arismun.css')}}">
</head>
<body>
    <section class="section is-paddingless has-background-primary">
        <div class="container">
            <a class="has-text-white has-text-weight-bold" style="font-size:12px;opacity:0.6" href="/">&larr;BACK TO ARIS</a>
        </div>
    </section>
    <!-- Navbar -->
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="container">

            <div class="navbar-brand">
                <a class="navbar-item" href="/activities/aris-mun-2020">
                    <img src="/img/arismun/ARISMUN_header.svg" alt="">
                </a>

                <a role="button" id="burger" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
                    data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div class="navbar-menu" id="navbar-menu">
                
                <div class="navbar-end">
                    <a 
                        class="navbar-item @if($title == 'ARISMUN 2020 Home')is-active is-tab @endif"
                        href ="/activities/aris-mun-2020"
                    >
                       Welcome 
                    </a>
                    <a 
                        class="navbar-item @if($title == 'About ARISMUN')is-active is-tab @endif"
                        href ="/activities/aris-mun-2020/about"
                    >
                        About
                    </a>
                    <a class="navbar-item @if($title== 'ARISMUN 2020 Secretariat')is-active is-tab @endif"
                        href ="/activities/aris-mun-2020/secretariat"
                    >
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

<footer class="has-text-centered section has-background-light is-paddingless py-4">
ARIS 2020®
</footer>

<script>

let burger = document.getElementById('burger');
let menu = document.getElementById('navbar-menu');

burger.addEventListener('click', function(e){
    console.log('burger clicked' );
    burger.classList.toggle('is-active')
    menu.classList.toggle('is-active')
});


</script>

</body>

</html>