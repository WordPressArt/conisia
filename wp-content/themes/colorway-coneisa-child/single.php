<?php get_header();	 ?>

<?php 

		$pageType = get_post_type( get_the_ID() );
		$templateDir = "inc/";
		//var_dump($pageType);
		switch ($pageType) {
			case 'application':
				# code...
				include_once($templateDir."single-application.php");
				break;	

			
		
			default:
				# code...
				include_once($templateDir."single.php");
				break;
		}
	
?>

<?php get_footer(); ?>