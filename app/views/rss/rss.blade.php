<?php 
  // calculate date;
  $pubdate = (new \Carbon\Carbon())->format('r');
?><?xml version="1.0" encoding="UTF-8"?><rss version="2.0"
  xmlns:content="http://purl.org/rss/1.0/modules/content/"
  xmlns:wfw="http://wellformedweb.org/CommentAPI/"
  xmlns:dc="http://purl.org/dc/elements/1.1/"
  xmlns:atom="http://www.w3.org/2005/Atom"
  xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
  xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
  >

  <channel>
    <title>ARIS News</title>
    <atom:link href="http://aris.edu.gh/rss/" rel="self" type="application/rss+xml" />
    <link>http://aris.edu.gh</link>
  <description>News from Alrayan International School</description>
  <lastBuildDate>{{$pubdate}}</lastBuildDate>
  <language>en-US</language>
  <sy:updatePeriod>hourly</sy:updatePeriod>
  <sy:updateFrequency>1</sy:updateFrequency>
  @foreach ($news as $news_item)
    <?php   $content = preg_replace("#<img src((\\s+)?=(\\s+)?\"/img)#um", "<img src=\"http://aris.edu.gh/img", $news_item->content ); ?>
  <item>
    <title>{{htmlspecialchars($news_item->title, ENT_QUOTES)}}</title> 
    <link>{{getenv('WEB_ROOT')}}news/{{$news_item->slug}}</link>

     <?php 
          // calculate date;
          $pubdate = (new \Carbon\Carbon($news_item->public_date))->format('r');
    ?>
  <pubDate>{{$pubdate}}</pubDate>
<guid isPermaLink="true">{{getenv('WEB_ROOT')}}news/{{$news_item->slug}}</guid>
  <description>
    <![CDATA[{{$news_item->excerpt, ENT_QUOTES}}
  ]]>
</description>
<content:encoded>
  <![CDATA[{{$content, ENT_QUOTES}}]]>
</content:encoded>
</item>
@endforeach
</channel>
</rss>