<?php

/*

Template name: Contact Us

*/

get_header();
$contact_content = get_field('contact_page_content');
$contact_socials = $contact_content['socials'];
?>

<section class="breadcrumbs overlay" style="background-image: url(<?php echo $contact_content['banner_image']; ?>)">
	<h1 class="white"><?php the_title('');?></h1>
</section>
<!-- breadcrumbs --> 
<?php 


	$the_query = new WP_Query( array(
		'post_type'		 =>	'contact_info',
		'posts_per_page' => 1,
        'orderby' => 'date',
        'order'   => 'DESC',
		
   )); 
?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
	$post_contact_content = get_field('contact_cpt_contact_info');
	$post_contact_socials = $post_contact_content['socials']; ?>
	<section class="contact-us-hero">
		<div class="content_wrap">
			<div class="row">
				<div class="cnt_50">
					<div class="contact-us-content-container">
						<h2 class="contact-us-heading"><?php echo $contact_content['blurb']; ?></h2>
						<ul class="contact-us-content-list">
							<li class="contact-us-content-list">
								<p class="contact-us-content-list-text">Email</p>
								<a href="mailto:<?php echo $post_contact_content['email']; ?>" class="contact-us-content-list-text"><?php echo $post_contact_content['email']; ?></a>
							</li>
							<li class="contact-us-content-list">
								<p class="contact-us-content-list-text">Phone</p>
								<a href="tel:<?php echo $post_contact_content['phone_number']; ?>" class="contact-us-content-list-text"><?php echo $post_contact_content['phone_number']; ?></a>
							</li>		
							<li class="contact-us-content-list">
								<p class="contact-us-content-list-text">Address</p>
								<a href="" class="contact-us-content-list-text"><?php echo $post_contact_content['address']; ?></a>
							</li>		
							<li class="contact-us-content-list">
								<p class="contact-us-content-list-socials">Socials: <?php echo $post_contact_socials['socials_@']; ?></p>
								<ul class="contact-us-socials-list">
									<li class="contact-us-socials-list-item"><a href="<?php echo $post_contact_socials['instagram_link']; ?>" class="contact-us-socials-icon"><i class="fa-brands fa-instagram"></i></a></li>
									<li class="contact-us-socials-list-item"><a href="<?php echo $post_contact_socials['facebook_link']; ?>" class="contact-us-socials-icon"><i class="fa-brands fa-facebook-f"></i></a></li>
									<li class="contact-us-socials-list-item"><a href="<?php echo $post_contact_socials['twitter_link']; ?>" class="contact-us-socials-icon"><i class="fa-brands fa-twitter"></i></a></li>
									<li class="contact-us-socials-list-item"><a href="<?php echo $post_contact_socials['linkedin_link']; ?>" class="contact-us-socials-icon"><i class="fa-brands fa-linkedin-in"></i></a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				<div class="cnt_50">
					<div class="contact-us-hero-form-container">
						<?php echo do_shortcode( '[contact-form-7 id="40" title="Contact form 1"]' );  ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>

<section class="contact-us-map">
<div class="contact-us-map-container">
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1117.0744181357297!2d-4.771784327929506!3d55.9467922113845!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2095d793bfe262d4!2sMan%20On%20Inverclyde%20SCIO!5e0!3m2!1sen!2suk!4v1654519137050!5m2!1sen!2suk"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
</section>


<?php get_footer();?>