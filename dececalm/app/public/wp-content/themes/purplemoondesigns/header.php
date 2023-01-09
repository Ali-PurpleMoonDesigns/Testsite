<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Purple Moon Designs
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/inc/fontawesome/css/all.css" type="text/css" media="screen">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/inc/slider/glide.core.css" type="text/css" media="screen">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/inc/lightgallery/lightgallery.css" type="text/css" media="screen">
	<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
	<script src="<?php bloginfo('template_url'); ?>/inc/lightgallery/lightgallery.min.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


	<?php wp_head(); ?>	
	
</head>
	
<script>
	function myFunctionDropDown() {
	var element = document.getElementById("navigation");
	element.classList.toggle("active");
	}
</script>
<?php
	$the_query = new WP_Query( array(
		'post_type'		 =>	'contact_info',
		'posts_per_page' => 1,
        'orderby' => 'date',
        'order'   => 'DESC',
		
   )); 
?>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/media.css" type="text/css" media="screen">
	
	<header id="masthead" class="site-header">
		<div class="top-bar">
			<div class="content_wrap">
				<div class="row table">
					<div class="empty-tb cell"></div>
					<div class="tb-contact-details cell">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
						$contact_info = get_field('contact_cpt_contact_info'); 
						$contact_socials = $contact_info['socials'];?>
						<ul class="tbcd">
							<li><i class="fa-solid fa-phone"></i> <a href="<?php echo $contact_info['phone_number']; ?>"><?php echo $contact_info['phone_number']; ?></a></li>
							<li><i class="fa-solid fa-envelope"></i> <a href="<?php echo $contact_info['email']; ?>"><?php echo $contact_info['email']; ?></a></li>
						</ul>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					</div>
					<div class="tb-social cell">
						<ul class="social-list">
							<li><a href="<?php echo $contact_socials['instagram_link']; ?>"><i class="fa-brands fa-instagram"></i></a></li>
							<li><a href="<?php echo $contact_socials['twitter_link']; ?>"><i class="fa-brands fa-twitter"></i></a></li>
							<li><a href="<?php echo $contact_socials['facebook_link']; ?>"><i class="fa-brands fa-facebook"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>		
			<div class="header-bar-menu">
				<div class="site-branding">
						<?php the_custom_logo();?>
					<div class="svg-op">
						<img src="<?php bloginfo('template_url'); ?>/inc/logo-angle.svg" alt="">
					</div>
				</div><!-- .site-branding -->				
				<div class="main-menu" id="menu-nav" >
					<div class="inner-menu">
						<nav id="site-navigation" class="main-navigation">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							) );
							?>
						</nav><!-- #site-navigation -->					
					</div>
				</div>
				<div class="header-btn">
					<div class="main-btn">
						<a href="javascript:void(0)">Get involved</a>
					</div>
				</div>
				<div class="mobile-nav">
					<a href="javascript:void(0)" onclick="myFunctionDropDown();">Menu <i class="fas fa-bars"></i></a>
				</div>
			</div><!-- header bar menu -->	
	</header><!-- #masthead -->
	
	<div class="mobile-menu-box" id="navigation">
		<div class="mobile-inner">
			<div class="close-btn">
				<a href="javascript:void(0)" onclick="myFunctionDropDown();">Close <i class="fa-solid fa-xmark"></i></a>
			</div>
			<?php the_custom_logo();?>
			<?php
				wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				) );
			?>
			<div class="main-btn">
				<a href="javascript:void(0)">Get involved</a>
			</div>
		</div>
	</div>
	
	<div id="content" class="site-content">
		
		