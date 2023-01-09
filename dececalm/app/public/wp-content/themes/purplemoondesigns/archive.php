<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package purplemoondesigns
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>
			<section class="breadcrumbs overlay" style="background-image: url(<?php the_post_thumbnail_url(); ?>); ">
				<?php
				the_archive_title( '<h1 class="white relative">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</section>
		<!-- breadcrumbs -->
		
<section class="blog-content">
	<div class="content_wrap">
		<div class="row">
			<div class="cnt_70">
				<div class="blog-posts margin-right">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
				</div>
			</div>
			<div class="cnt_30">
				<div class="blog-sidebar margin-left">
					<?php get_search_form(); ?>
					<div class="siderbar-box">
						<h3>Categories</h3>
						<ul class="cat-list">
							<?php 
							$categories = get_categories();
							foreach($categories as $category) {
							   echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
							}
							;?>
						</ul>
					</div>
					<div class="siderbar-box">
						<h3>Recent posts</h3>
<?php 
	$the_query = new WP_Query( array(
		'post_type'		 =>	'post',
		'posts_per_page' => 3,
        'orderby' => 'date',
        'order'   => 'DESC',
		'post__not_in' => array( $post->ID )
		
   )); 
?>			

<?php if ( $the_query->have_posts() ) : ?>
	
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

						<div class="recent-posts">
							<div class="rp-img">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
							</div>
							<div class="rp-details">
								<a href="<?php the_permalink(); ?>"><h2><?php the_title();?></h2></a>
								<span class="date"><?php the_time('j F, Y'); ?></span>
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
		</div>
	</div>
</section>

	</main><!-- #main -->

<?php
get_footer();
