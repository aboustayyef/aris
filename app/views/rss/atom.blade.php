<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
  <channel>
    <title>ARIS News</title>
    <link>http://aris.edu.gh</link>
    <atom:link href="{{getenv('WEB_ROOT')}}rss" rel="self" type="application/rss+xml" />
    <description>The Latest News from Al-Rayane International School in Ghana</description>
    <copyright>http://aris.edu.gh</copyright>
    <ttl>20</ttl>

    @foreach ($news as $news_item)
      <item>
        <title>{{ $news_item->title }}</title>
        <description>{{htmlspecialchars($news_item->content)}}</description>
        <content>{{htmlspecialchars($news_item->content)}}</content>
        <link>{{getenv('WEB_ROOT')}}news/{{$news_item->slug}}</link>
        <guid isPermaLink="true">{{getenv('WEB_ROOT')}}news/{{$news_item->slug}}</guid>
        <?php 
          // calculate date;
          $pubdate = (new \Carbon\Carbon($news_item->public_date))->format('r');
        ?>
        <pubDate>{{$pubdate}}</pubDate>
      </item>
    @endforeach
  </channel>
</rss>