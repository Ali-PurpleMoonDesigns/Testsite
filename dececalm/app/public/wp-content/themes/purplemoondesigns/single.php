<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package purplemoondesigns
 */

get_header();
?>

<main id="primary" class="site-main">


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="breadcrumbs overlay" style="background-image: url(<?php the_post_thumbnail_url(); ?>); ">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="white relative">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
		<?php endif; ?>
	</section><!-- .entry-header -->
	
<section class="blog-content">
	<div class="content_wrap">
		<div class="row">
			<div class="cnt_70">
				<div class="blog-posts margin-right">
					<div class="blog-cnt">
						<div class="meta-content">
							<?php purplemoondesigns_post_thumbnail(); ?>
							<div class="date-posted">
								<span><?php the_time('j'); ?></span>	
								<span><?php the_time('F'); ?></span>								
							</div>
						</div>
						<div class="full-content">
							<div class="info">
								<h2><?php the_title();?></h2>
							</div>
							<?php the_content();?>
						</div>
					</div>
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
	
	<section class="other-posts">
		<div class="content_wrap">
			<div class="row">
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
	</section>
	
</article><!-- #post-<?php the_ID(); ?> -->
	
</main><!-- #main -->

<?php
get_footer();
