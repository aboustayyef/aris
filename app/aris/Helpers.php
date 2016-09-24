<?php namespace Aris ;
class Helpers{
	static function activateAdvancedEditor($field, $uploadImage=false){
		?>
			<script src ="<?php echo asset('js/tinymce/tinymce.min.js') ?>"></script>
			<script>
				tinymce.init({
			    selector: "<?php echo $field; ?>",
			    theme: "modern",
			    <?php
			    	if ($uploadImage) {
			    		echo 'menubar : false,';
			    		echo 'height: 2,';
			    	}else{
			    		echo 'menubar : true,';
			    		echo 'height:300,';
			    	};
			    ?>
			    relative_urls: false,
			    plugins: [
			         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
			         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
			         "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
			   ],
			   <?php
			    	if ($uploadImage) {
			    		?>
			    		toolbar1: "image",
			    		<?php
			    	}else{
			    		?>
			    		toolbar1: "undo redo | bold italic underline blockquote | bullist numlist outdent indent | styleselect",
						toolbar2: "| responsivefilemanager | link unlink anchor | image media | print preview code ",
			    		<?php
			    	};
			    ?>
			   
			   image_advtab: true ,
			   image_dimensions: false,
			   external_filemanager_path:"/filemanager/",
			   filemanager_title:"Responsive Filemanager" ,
			   external_plugins: { "filemanager" : "/filemanager/plugin.min.js"}
			 });
			</script>

		<?php
	}
}