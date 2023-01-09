<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package purplemoondesigns
 */

get_header();
?>

	<main id="primary" class="site-main">
			<div class="breadcrumbs">
				<h1 class="page-title">Oops! The page can't be found</h1>
			</div>

		<div class="content_wrap">
			<div class="the_content">	
	
			<div class="cta-btn">
				<a href="<?php echo get_home_url(); ?>">Return home</a>
			</div>
			</div>
		</div>

	</main><!-- #main -->

<?php
get_footer();
