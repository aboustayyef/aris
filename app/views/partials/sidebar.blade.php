<aside id="content-sidebar">
	<!-- Navigation of sibling sections -->
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
				<?php $news = News::orderBy('created_at', 'DESC')->take(3)->get(); ?>
				@foreach ($news as $key => $news_item)
					<li>
						@if($news_item->hasImage())
							<a href="/news/{{$news_item->slug}}"><img src="{{$news_item->featured_image}}" alt=""></a><br>
						@endif
						
						<a href="/news/{{$news_item->slug}}">{{$news_item->title}}</a>
					</li>
				@endforeach
			</ul>
		</div>
		
	</div>
		

</aside>