<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package purplemoondesigns
 */

?>
<?php 


	$the_query = new WP_Query( array(
		'post_type'		 =>	'contact_info',
		'posts_per_page' => 1,
        'orderby' => 'date',
        'order'   => 'DESC',
		
   )); 
?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post();
	$contact_info = get_field('contact_cpt_contact_info'); ?>
	<footer id="colophon" class="site-footer bg-blue">
		<div class="footer_wrap">
			<div class="row">
				<div class="cnt_20">
					<div class="footer-col">
						<?php the_custom_logo();?>
						<div class="footer-social">
							<?php $footer_socials = $contact_info['socials']; ?>
							<ul class="social-list">
								<li><a href="<?php echo $footer_socials['instagram_link']; ?>"><i class="fa-brands fa-instagram"></i></a></li>
								<li><a href="<?php echo $footer_socials['twitter_link']; ?>"><i class="fa-brands fa-twitter"></i></a></li>
								<li><a href="<?php echo $footer_socials['facebook_link']; ?>"><i class="fa-brands fa-facebook"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="cnt_20">
					<div class="footer-col">
						<h4 class="white">Menu</h4>						
						<nav id="footer-navigation">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							) );
							?>
						</nav><!-- #site-navigation -->	
					</div>
				</div>
				<div class="cnt_30">
					<div class="footer-col">
						<h4 class="white">Contact us</h4>	
						<div class="contact-list">
							<ul class="tbcd">
								<li><i class="fa-solid fa-phone"></i> <a href="<?php echo $contact_info['phone_number']; ?>"><?php echo $contact_info['phone_number']; ?></a></li>
								<li><i class="fa-solid fa-envelope"></i> <a href="mailto:<?php echo $contact_info['email']; ?>"><?php echo $contact_info['email']; ?></a></li>
								<li><i class="fa-solid fa-location-dot"></i> <a href="javasciprt:void(0)"><?php echo $contact_info['address']; ?></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="cnt_30">
					<div class="footer-col">
						<h4 class="white">Newsletter</h4>
						<p class="white">Subscribe to our newsletter to get the update news related to our latest properties and time-limited discounts.</p>
						<input type="email" placeholder="Enter your e-mail address">
						<div class="btn-div">
							<button class="submit">Subscribe <span class="line"></span></button>
						</div>
					</div>
				</div>
			</div>
			<div class="copyrights">
				<p class="white">Copyright © 2022 Man On Inverclyde. All Rights Reserved by <a href="https://www.purplemoondesigns.co.uk/" target="_blank" class="white">Purple Moon Designs</a></p>
			</div>
		</div>
	</footer><!-- #colophon -->
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
