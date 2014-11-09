
<?php 
	$navigation = new Aris\Navigation;
	echo '<nav>';
		echo '<div class="inner">';
			$navigation->renderFullNav();
		echo '</div>';
	echo '</nav>';
		$navigation->renderMobileNav();
?>
