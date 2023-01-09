<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package purplemoondesigns
 */

get_header();
?>

	<main id="primary" class="site-main">
			<div class="breadcrumbs">
				<h1><?php the_title();?></h1>
			</div>

		<div class="content_wrap">
			<div class="the_content">				
				<?php the_content();?>
			</div>
		</div>

	</main><!-- #main -->

<?php
get_footer();
