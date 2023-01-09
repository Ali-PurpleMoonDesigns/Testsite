<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package purplemoondesigns
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="blog-sng">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
						<span class="date"><?php the_time('j F, Y'); ?></span>
						<a href="<?php the_permalink(); ?>"><h2><?php the_title();?></h2></a>
						<?php the_excerpt();?>
						<div class="main-btn">
							<a href="<?php the_permalink(); ?>">Read more</a>
						</div>
					</div>
					
	
</article><!-- #post-<?php the_ID(); ?> -->
