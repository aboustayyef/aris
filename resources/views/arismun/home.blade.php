@extends('arismun.layout')
@section('content')
<!-- Hero Intro -->
<section class="hero is-medium">
    <div class="hero-body">
        <div class="container">
            <div class="columns">
                <div class="column is-4 is-three-quarters-mobile is-offset-2-mobile">
                    <img src="/img/arismun/aris_mun_logo.svg" alt="">
                </div>
                <div class="column is-offset-1 is-7">
                    <h1 class="title is-3 is-spaced">
                        October 15 - October 17, 2020
                    </h1>
                    <h2 class="subtitle is-4" style="opacity:0.7;line-height: 1.7;">
                        Model UN is a popular activity for those interested in learning more about how the UN
                        operates. Hundreds of thousands of students worldwide take part every year at all
                        educational levels. Many of today’s leaders in law, government, business and the arts –
                        including at the UN itself – participated in Model UN as student.
                    </h2>
                    <div class="buttons control">
                        
                            <a href="/activities/aris-mun-2020/about" class="button is-primary">
                                    <img src="/img/arismun/book.svg" class="mr-2">
                                    Learn More &nbsp;
                            </a>
                            <a href="https://docs.google.com/forms/d/e/1FAIpQLSe3OdswirR6eOVhBax3P4KVIT6bSSlBa9czBw-IE20Iu8W92Q/viewform" class="button is-warning">
                                        <img src="/img/arismun/pen.svg" class="mr-2">
                                    Apply For Chair &nbsp;
                                </button>
                            </a>
                            <a href="https://docs.google.com/forms/d/e/1FAIpQLSffKN4wxejdgNrs3l3DN4SRaoOP37Nx7MaY8WP5sZ3DsMfsAw/viewform" class="button is-warning">
                                    <img src="/img/arismun/clipboard.svg" class="mr-2">
                                    Register As Delegate &nbsp;
                                </button>
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Hero Word from UN Secretaries-->
<section class="section has-background-primary">
    <div class="container">
            <h1 class="has-text-centered has-text-white is-size-2 has-text-weight-bold	">
                A Welcome Message from your Secretaries-General
            </h1>
            <hr>
    </div>
    <div class="container mt-6">
        <div class="columns has-text-white">
            <div class="column"><img src="/img/arismun/riwa_and_yasmine.png" alt=""> </div>
            <div class="column">
                <p>In the spirit of both open and international mindedness, we extend nothing but warm greetings
                    from Al-Rayan International School in Ghana. Our names are Riwa Mattouk and Yasmin Alfa and
                    we’ve had the privilege of hosting this year’s conference virtually.</p><p class="mt-4"> <span class="has-text-warning has-text-weight-bold">Our theme, “The Future We
                    Want”</span> resonates very well with us because we have witnessed the severe effects of COVID-19
                    around the globe and experienced its impact on our lives in varying degrees. If we are to become
                    today's leaders and tomorrow’s decision makers, then we must fight for the future we want, the
                    future we hope for and the future we dream of. </p>
            </div>
            <div class="column">
                <p>Discussing this theme is of great importance in understanding who we are as people and what role
                    we are to play in shaping the future we so earnestly desire.
                    Our hope for ARISMUN 2020 is that all participants give themselves the opportunity to think
                    outside the box and tread into situations with both an open mind and an international mindset.
                </p>
                <p class="mt-4">If you, like us, are compelled to be the change and strive for the future you want,
                    then ARISMUN 2020 virtual conference is the place for you to voice your opinions and be the
                    change. Welcome to ARISMUN 2020! Riwa Mattouk & Yasmin Alfa.</p>
            </div>
        </div>
    </div>
</section>

<section class="section has-background-primary is-medium py-5" style="background-color:#0592A4 !important">
<div class="container">
    <div class="columns">
        <div class="column is-offset-1 is-5">
        <h2 class="title is-size-4 has-text-weight-bold has-text-white">Read more messages and introductions from Under-Secretaries and Directors in the <a href="/activities/aris-mun-2020/secretariat" class="has-text-warning has-text-weight-bold">Secretariat Page &rarr;</a></h2>
        </div>
        <div class="column is-1 is-half-mobile is-offset-3-mobile"><figure class="image"><img src="/img/arismun/nadia.jpg" class="is-rounded" alt=""></figure></div>
        <div class="column is-1 is-half-mobile is-offset-3-mobile"><figure class="image"><img src="/img/arismun/ouahil.jpg" class="is-rounded" alt=""></figure></div>
        <div class="column is-1 is-half-mobile is-offset-3-mobile"><figure class="image"><img src="/img/arismun/fedaus.jpg" class="is-rounded" alt=""></figure></div>
        <div class="column is-1 is-half-mobile is-offset-3-mobile"><figure class="image"><img src="/img/arismun/anik.jpg" class="is-rounded" alt=""></figure></div>
        <div class="column is-1 is-half-mobile is-offset-3-mobile"><figure class="image"><img src="/img/arismun/sara.jpg" class="is-rounded" alt=""></figure></div>
    </div>
</div>
</section>

@endsection()