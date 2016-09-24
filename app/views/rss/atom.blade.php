<?xml version="1.0" encoding="utf-8"?>
 
<feed xmlns="http://www.w3.org/2005/Atom">
 
  <title>ARIS News</title>
  <link href="http://aris.edu.gh/rss/" rel="self" />
  <link href="http://aris.edu.gh/" />
    <?php 
          // calculate date;
          $pubdate = (new \Carbon\Carbon)->format('Y-m-d\TH:i:sP');
    ?>
  <updated>{{$pubdate}}</updated>

  @foreach ($news as $news_item)
  <entry>
    <title>{{htmlspecialchars($news_item->title)}}</title>
    <link>{{getenv('WEB_ROOT')}}news/{{$news_item->slug}}</link>
    <?php 
          // calculate date;
          $pubdate = (new \Carbon\Carbon($news_item->public_date))->format('Y-m-d\TH:i:sP');
    ?>
    <updated>{{$pubdate}}</updated>
    <summary>{{htmlspecialchars($news_item->excerpt)}}</summary>
    <content type="xhtml">
      <div xmlns="http://www.w3.org/1999/xhtml">
        {{htmlspecialchars($news_item->content)}}
      </div>
    </content>
  </entry>
  @endforeach
 
</feed>