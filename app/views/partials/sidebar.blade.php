<aside id="content-sidebar">
	<!-- Navigation of sibling sections -->
	<div class="box siblings">
		@include('partials.quickAccess')
	</div>
	<div class="box siblings">
			<?php
				if ($node->hasParent()) {

					echo '<div class="box_header"><h3>' . $node->parent()->name . '</h3></div>';
				}
				echo '<div class="box_body"><ul>';
				$siblings = $node->siblings();
				foreach ($siblings as $key => $sibling) {
					if ($sibling == $node) {
						echo '<li>' . $sibling->name . '</li>';
						continue;
					}
					echo '<li><a href="/' . $sibling->getLink() . '">' . $sibling->name . '</a></li>';
				}
			?>
		</ul>
	</div><!-- / box body -->
	</div>

	<div class="box latestnews">
		<div class="box_header">
			<h3>Latest News &amp; Events</h3>
		</div>
		<div class="box_body">
			<ul>
				<?php
					if (!Cache::has('latestNews')) {
						Cache::put('latestNews', (new Aris\NewsArticles())->get(3) , 10); //10 minutes
					}
					$news = Cache::get('latestNews');
				?>
				@foreach ($news as $key => $news_item)
					<li>
						@if($news_item->image())
							<a href="{{$news_item->link()}}"><img src="{{$news_item->image()}}" alt="{{$news_item->title()}}"></a><br>
						@endif

						<a href="{{$news_item->link()}}">{{$news_item->title()}}</a>
					</li>
				@endforeach
			</ul>
		</div>

	</div>


</aside>