<nav>
	<div class="inner">
		<div class="mobileMenuButton">
			Menu
		</div>
		<ul class="megaMenu">
			<?php $sections = (new \Aris\Node)->topLevel(); ?>
			@foreach($sections as $section)	
				@if($section->hasChildren())
					<li class="megaMenu__section">
						{{$section->name}}<i class="fa fa-caret-down"></i>
						<div class="megaMenu__wrapper">
							<div class="megaMenu__title">
								<h2>{{$section->name}}</h2>
							</div>
							<div class="megaMenu__featuredImage">
								<img src="/img/featured/sections/{{$section->getLink()}}.jpg">
							</div>
							<div class="megaMenu__description">
								<div class="desc">{!!$section->excerpt!!}</div>
							</div>
							<div class="megaMenu__left_panel">
								<ul>
									@foreach($section->children() as $key => $subsection)
										@if($subsection->hasChildren())
											<li class="haschildren">
												<a href="{{$subsection->getLink()}}">{{$subsection->name}}</a>
												<div class="megaMenu__center_panel">
													<ul>
														@foreach($subsection->children() as $key => $page)
															<li><a href="/{{$page->getLink()}}">{{$page->name}}
																@if($page->hasRole())
																	<i class="fa fa-lock"></i>
																@endif
															</a></li>
														@endforeach
													</ul>
												</div>
											</li>
										@else
											<li class="nochildren"><a href="/{{$subsection->getLink()}}">{{$subsection->name}}</a></li>
										@endif
									@endforeach
								</ul>
							</div>
						</div>
					</li>
				@else
					<li class="megaMenu__section"><a href="/{{$section->getLink()}}">{{$section->name}}</a>
				@endif
			@endforeach
		</ul>		
	</div>
</nav>