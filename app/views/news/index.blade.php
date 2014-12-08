@extends('layouts.main')
@section('content')
<div class="inner">
    <div id="content-area">
        <h1>Aris News</h1>
        @foreach ($news as $key => $newsitem)
            <div class="newsItem">
                <?php
                    $date = new Carbon\Carbon($newsitem->date);
                ?>
                <h3><a href="/news/{{$newsitem->slug}}">{{$newsitem->title}}</a><small>{{$date->format('d M Y')}}</small> </h3>
                @if(!empty($newsitem->featured_image))
                    <div class="featured_image"><img src="{{$newsitem->featured_image}}" alt=""></div>
                @endif
                {{$newsitem->excerpt}}
            </div>
        @endforeach
    </div>
</div>
@stop