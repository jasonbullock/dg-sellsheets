<?php
/*
Template Post Type: sell_sheets, post, page, product, categories
*/


get_header(); ?>
<div class="grid-container">
	<div class="grid-x">
		<div class="small-12 medium-9 large-9 cell">

			<!--LOGO AND DATE GRID-->
			<div class="grid-x">




				<button data-toggle="exampleModal8"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/buchanans-logo.png" class="logo-top-buchanan"/></button>

				<div class="reveal" id="exampleModal8"  data-reveal>

				  <iframe id="myVideo" width="560" height="315" src="<?php the_field( 'video_link' ); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

				  <button class="close-button" data-close aria-label="Close reveal" type="button">X</button>

				</div>






					<p class="dates-buchanan">
					<?php the_field( 'date_from' ); ?> - 
					<?php the_field( 'date_to' ); ?>
					</p>




			</div>


			<!--MEDIA SPEND GRID -->
			<div class="grid-x media-spend buchanan-spend ">
				<div class="small-12 medium-12 large-12 cell">

					<h2 class="spend">
						<?php the_field( 'spend_in_dollars' ); ?>
						<?php the_field( 'spend_in_percentage' ); ?>
					</h2>
				</div>


					<p class="right-border">
					<span class="media">Media</span><br>
					<span class="reaching"">Reaching</span>
					</p>
					<p>

					<span class="stats">
							<span class="bld">
							<?php the_field( 'media_reaching_line_1_percentage' ); ?>
							</span>
						<?php the_field( 'media_reaching_line_1_people' ); ?> 
						
						<span class="bld">


					<?php if ( get_field( 'media_reaching_line_1_age_from') ) { ?><?php the_field( 'media_reaching_line_1_age_from' ); ?><?php } ?><?php if ( get_field( 'media_reaching_line_1_age_to') ) { ?>-<?php the_field( 'media_reaching_line_1_age_to' ); ?>
						<?php } ?>


						</span>
					</span><br>

					<span class="stats"">
						&<span class="bld">
						<?php the_field( 'media_reaching_line_2_percentage' ); ?>
						</span>
						<?php the_field( 'media_reaching_line_2_people' ); ?>
						<span class="bld">
						<?php if ( get_field( 'media_reaching_line_2_age_from') ) { ?><?php the_field( 'media_reaching_line_2_age_from' ); ?><?php } ?><?php if ( get_field( 'media_reaching_line_2_age_to') ) { ?>-<?php the_field( 'media_reaching_line_2_age_to' ); ?>
						<?php } ?>

						</span></span>

			</div>




			<p class="tv-social buchanan-social">
			<span class="right-border">national tv</span>
			<?php the_field( 'national_tv_spend_in_dollars' ); ?> 
			<?php the_field( 'national_tv_spend_in_percentage' ); ?>
			<p>

			<div class="grid-x">
				<div class="small-12 medium-5 large-6 cell">

				<?php

				if(get_field('national_tv_bullets')): ?>

				<ul class="buchanan-bullet">
				    <?php while(the_repeater_field('national_tv_bullets')): ?>
				        <li><?php the_sub_field('ntv_bullets'); ?></li>
				    <?php endwhile; ?>
				</ul>

				 <?php endif;

				?>
				</div>
				<div class="small-12 medium-5 large-6 cell">

					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/tv-logos.png"/>	

				</div>
			</div>

				




			<p class="tv-social buchanan-social">
			<span class="right-border">digital/social/search</span>
				<?php the_field( 'digitalsocialsearch_spend_in_dollars' ); ?>
				<?php the_field( 'digitalsocialsearch_spend_in_percentage' ); ?>
			<p>		

			<div class="grid-x">
				<div class="small-12 medium-5 large-6 cell">
				<?php

				if(get_field('digitalsocialsearch_bullets')): ?>

				<ul class="buchanan-bullet">
				    <?php while(the_repeater_field('digitalsocialsearch_bullets')): ?>
				        <li><?php the_sub_field('dss_bullets'); ?></li>
				    <?php endwhile; ?>
				</ul>
				
				 <?php endif;

				?>
				</div>
				<div class="small-12 medium-5 large-6 cell">

					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/social-img.png"/>	

				</div>
			</div>

			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/btm-logos.png"/>

			

		</div>







		<div class="small-12 medium-3 large-3 cell hide-for-small-only">


				<img class="bottle-art" src="<?php echo get_template_directory_uri(); ?>/assets/images/buchanans-btl.gif"/>



		</div>




	</div>	<!--END GRID-X-->
</div>
<?php get_footer(); ?>