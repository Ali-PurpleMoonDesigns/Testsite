<?php

/*

Template name: Blog

*/

get_header();
$blog_content = get_field('blog_page_content');
$blog_section = get_field('blog_page_blog_section');

?>

<section class="breadcrumbs overlay" style="background-image: url(<?php echo $blog_content['banner_image']; ?>)">
	<h1 class="white"><?php the_title();?></h1>
</section>
<!-- breadcrumbs --> 

<section class="main-service">
	<div class="content_wrap">
		<h3 class="sub-heading"><?php echo $blog_content['heading']; ?></h3>
		<div class="row about-us-hero-row">
			<div class="cnt_40">
				<div class="margin-right">
					<h1 class="about-us-hero-left-heading"><?php echo $blog_content['heading_blurb']; ?></h1>	
				</div>	
			</div>
			<div class="cnt_60">
				<div class="margin-left">
					<div class="about-us-hero-blurb-container">
						<p><?php echo $blog_content['blurb']; ?></p>	
					</div>
				</div>	
			</div>
		</div>
	</div>
</section>
<!-- main services -->

<section class="blog dark-blog">
	<div class="content_wrap">
		<div class="title center">
			<h3><?php echo $blog_section['sub_heading']; ?></h3>
			<h1><?php echo $blog_section['heading']; ?></h1>
		</div>
		<div class="blog-box">
			<div class="flex-row">

<!-- post array -->
				<?php 
				$the_query = new WP_Query( array(
					'post_type'		 =>	'post',
					'posts_per_page' => -1,
					'orderby' => 'date',
					'order'   => 'DESC',

				));?>			
				<?php if ( $the_query->have_posts() ) : ?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<div class="cnt_33">
							<div class="spaced-content">
								<div class="single-blog">
									<?php the_post_thumbnail();?>
									<div class="blog-details">
										<div class="blog-meta">
											<div class="author">by <?php the_author();?></div>
											<div class="date"><?php the_time('j F, Y'); ?></div>
										</div>
										<div class="blog-excerpt">
											<h2><a href="<?php the_permalink(); ?>" class="dark"><?php the_title();?></a></h2>
											<p><?php the_excerpt();?></p>
											<div class="inline-btn">
												<a href="<?php the_permalink(); ?>">READ MORE <i class="fa-solid fa-angle-right"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
				<?php else : ?>
					<p><?php __('No content'); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<!-- blog -->

<?php get_footer();?>