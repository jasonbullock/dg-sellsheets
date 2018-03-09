<?php
/*

*/

get_header(); ?>


<?php

$dateFrom = get_field( 'date_from' );
$dateTo = get_field( 'date_to' );

$spendDollars = get_field( 'spend' );
$unitDollar = get_field( 'unit_dollar' );
$spendIncrease = get_field( 'increase' );
$unitDollarPercent = get_field( 'unit_dollar_percent' );
$comparedTo = get_field( 'compared_to' );


$natTvSpendDollars = get_field( 'national_tv_spend' );
$unitDollar2 = get_field( 'unit_dollar2' );
$natTvSpendIncrease = get_field( 'national_tv_increase' );
$unitDollarPercent2 = get_field( 'unit_dollar_percent2' );
$comparedTo2 = get_field( 'compared_to2' );


$digitalSpendDollars = get_field( 'digital_spend' );
$unitDollar3 = get_field( 'unit_dollar2' );
$digitalSpendIncrease = get_field( 'digital_increase' );
$unitDollarPercent3 = get_field( 'unit_dollar_percent2' );
$comparedTo3 = get_field( 'compared_to2' );


?>

<div class="content">
    <div class="grid-container">
        <div class="inner-content grid-x grid-margin-x grid-padding-x">
            <div class="small-12 medium-12 large-12 cell">
<?php
include 'inc/post-navigation.php';
?>


			<!--VIDEO MODAL-->

				<button data-toggle="exampleModal8"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/buchanans-logo.png" class="smlogo"/></button>

				<div class="reveal" id="exampleModal8" data-reveal>

				  <iframe width="560" height="315" src="<?php the_field( 'video_link' ); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

				  <button class="close-button" data-close aria-label="Close reveal" type="button">
					X
				  </button>
				</div>

<div class="pptcontainer">
 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		    			<?php the_content(); ?>
		    	
		    <?php endwhile; ?>

<?php endif; ?>
</div>
			<!--DATES -->
			<p><?php echo $dateFrom . ' - ' . $dateTo; ?></p>

			<hr>





			<!--MAIN SPEND -->

			<h1>
				<?php echo '$' . $spendDollars . $unitDollar . ' +' . $spendIncrease . $unitDollarPercent . ' vs. ' . $comparedTo;?>
			</h1>





			<!--MEDIA REACH -->

			<h2>Media Reaching </h2>
				

			<?php

			if(get_field('media_reaching')): 

			   
			    $counter = 0;

			    while(the_repeater_field('media_reaching')): 

			    	$reachPercentage = get_sub_field('percentage');
					$reachAudience = get_sub_field('audience');
					$reachAges = get_sub_field('ages');

					if($counter > 0) {
						echo '& ';
					}
			        	echo '<strong>' . $reachPercentage . '%</strong> ' . $reachAudience . ' ' . '<strong>' . $reachAges . '</strong><br>'; 

			        $counter++;
			 
			    endwhile;

			 endif; 

			 ?>

			<hr>





			<!-- NATIONAL TV -->

			<h3>national tv | 
			
				<?php echo '$' . $natTvSpendDollars . $unitDollar2 . ' +' . $natTvSpendIncrease . $unitDollarPercent2 . ' vs. ' . $comparedTo2;?>
			</h3>



			<?php

			if(get_field('national_tv_bullets')): ?>

				<ul>

				    <?php while(the_repeater_field('national_tv_bullets')): ?>

				        <li><?php the_sub_field('ntv_bullets'); ?></li>

				    <?php endwhile; ?>

				</ul>

			 <?php endif;

			?>

			


			<?php
			if(get_field('nat_tv_channels')): ?>



				    <?php while(the_repeater_field('nat_tv_channels')): ?>

				    	<img src="<?php echo the_sub_field('tv_channel_logos'); ?>"/>	
				    	


				    <?php endwhile; ?>



			 <?php endif; ?>




			<hr>




				

			<!-- DIGITAL SOCIAL SEARCH -->

			<h3>digital/social/search | 
			
				<?php echo '$' . $digitalSpendDollars . $unitDollar3 . ' +' . $digitalSpendIncrease . $unitDollarPercent3 . ' vs. ' . $comparedTo3;?>
			</h3>


			<?php

			if(get_field('digitalsocialsearch_bullets')): ?>

				<ul class="bailey-bullet">

				    <?php while(the_repeater_field('digitalsocialsearch_bullets')): ?>

				        <li><?php the_sub_field('dss_bullets'); ?></li>

				    <?php endwhile; ?>

				</ul>
			
			 <?php endif;

			?>




			<?php
			if(get_field('digital_channels')): ?>



				    <?php while(the_repeater_field('digital_channels')): ?>

				    	<img src="<?php echo the_sub_field('digital_channel_logos'); ?>"/>	
				    	

				    <?php endwhile; ?>


			 <?php endif; ?>




			</div>
		</div>
	</div>
</div> <!-- END GRID CONTAINER -->
<?php get_footer(); ?>