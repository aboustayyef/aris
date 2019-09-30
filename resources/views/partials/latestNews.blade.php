<h2 class="latestNews">
    Latest News &amp; Events
    <small><a href="/news">Read All</a></small>
</h2>

@foreach ($news as $key => $news_item) 
<div class="news_item_wrapper">
        <a href="/news/{{$news_item->slug}}">
            <h3>{{$news_item->title}}</h3>
        </a>
        <div class="news_content">
            @if (($news_item->image()))
                <div class="news_item_photo">
                    <a href="/news/{{$news_item->slug}}">
                        <img src="{{$news_item->image()}}" alt="">
                    </a>
                </div>
            @endif
            <div class="news_excerpt">
                <p>{{$news_item->excerpt}}</p>
            </div>
    </div>
    </div> <!-- news_item_wrapper -->
@endforeach