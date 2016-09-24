@extends('layouts.admin')
<?php
use Aris\Node;
?>
@section('content')

@if(Session::has('message'))
	<div class="container-fluid">
	  <div class="row">
	  	<p class="bg-info" style="padding:15px">
	  		{{Session::get('message')}}
	  	</p>
	  </div>
	</div>
@endif

<hr>
<h2>Manage Pages</h2>

<?php
	echo '<ul>';
		$sections = (new Node)->topLevel();
		foreach ($sections as $key => $section) {
			echo "<li>$section->name ";
			if (!$section->hasChildren()) {
				echo '<a href="/pages/' . $section->id . '/edit">edit</a>';
			} else {
				$subsections = $section->children();
				echo "<ul>";
				foreach ($subsections as $key => $subsection) {
					echo "<li>$subsection->name ";
					if (!$subsection->hasChildren()) {
						echo '<a href="/pages/' . $subsection->id . '/edit">edit</a>';
					}else{
						$pages = $subsection->children();
						echo "<ul>";
							foreach ($pages as $key => $page) {
								echo '<li>'.$page->name. ' <a href="/pages/' . $page->id . '/edit">edit</a></li>';
							}
						echo "</ul>";
					}
					echo "</li>";
				}
				echo "</ul>";
			}
			echo "</li>";
		}
	echo "</ul>";
?>

@stop