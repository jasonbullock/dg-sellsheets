<?php
get_header(); 
?>


<div class="grid-container">
	<div class="grid-x grid-margin-x">
		<div class="medium-6 large-6 cell">

			<?php global $post; $category = get_the_category($post->ID);  ?>
			<a href="/dg-sellsheets"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $category[0]->slug?>-logo.png" class="smlogo <?php echo $category[0]->slug?>-top-logo"/></a>
			<?php

			$dateFrom = get_field( 'date_from' );
			$dateTo = get_field( 'date_to' );

			echo '<p class="dates">' .  $dateFrom . ' - ' . $dateTo . '</p>';
			?>
		</div>
		<div class="medium-6 large-6 cell">
			<?php include 'inc/post-navigation.php'; ?>
		</div>
	</div>





	<div class="grid-x grid-margin-x">
		<div class="small-12 cell">


			<div class="pptcontainer">
				 <?php if (have_posts()) : while (have_posts()) : the_post(); 
				 	
				 	the_content();	
					endwhile;

				endif; ?>
			</div>

			
		</div>
	</div>





	<div class="grid-x grid-margin-x">
		<div class="small-12 cell">


			<?php
			// check if the repeater field has rows of data
			if( have_rows('videos') ):

				echo '<hr><h2>Videos</h2>';

			 	// loop through the rows of data
			    while ( have_rows('videos') ) : the_row(); ?>

					<div class="embed-container">
						<?php the_sub_field('video_url'); ?>
					</div>
					<p>
					<?php

			    endwhile;

				else :

			endif;
			?>

			
		</div>
	</div>





		<div class="grid-x grid-margin-x">
		<div class="small-12 cell">


			<?php
			// check if the repeater field has rows of data
			if( have_rows('social') ):

				echo '<hr><h2>Social Media</h2>';

			 	// loop through the rows of data
			    while ( have_rows('social') ) : the_row(); ?>

					<div class="embed-container">
						<?php the_sub_field('social_url'); ?>
					</div>
					<p>
					<?php

			    endwhile;

				else :

			endif;
			?>

			
		</div>
	</div>






</div><!-- END GRID CONTAINER -->










<?php get_footer(); ?>