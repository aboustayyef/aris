
<?php 
	$navigation = new Aris\Navigation;
?>
	<nav>
		<div class="inner">

			<?php 
			if ( ! Cache::has('fullnav')) {
				Cache::forever('fullnav', $navigation->renderFullNav());
			}

			echo Cache::get('fullnav');

			?>
			
		</div>
	</nav>

	<!-- Mobile Navigation -->
	
	<div id="mobileMenu">
		<h3><i class="fa fa-bars"></i> Menu</h3>
		<ul class="sectionsMobile">
			<?php 
			if ( ! Cache::has('mobilenav')) {
				Cache::forever('mobilenav', $navigation->renderMobileNav());
			}

			echo Cache::get('mobilenav');

			?>
			{{$navigation->renderMobileNav()}}
		</ul>
	</div>