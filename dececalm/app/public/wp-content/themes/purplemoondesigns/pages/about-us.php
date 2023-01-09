<?php

/*

Template name: About Us

*/

get_header();
$about_us_hero = get_field('about_us_page_about_us');
$our_story_section= get_field('about_us_page_our_story');
$team_section = get_field('about_us_page_team_section');
$blog_section = get_field('about_us_page_blog_section');



?>

<section class="breadcrumbs overlay" style="background-image: url(<?php echo $about_us_hero['banner_image']; ?>)">
	<h1 class="white"><?php the_title('');?></h1>
</section>
<!-- breadcrumbs --> 

<section class="about-us-hero">
	<div class="content_wrap">
		<h3 class="sub-heading"><?php echo $about_us_hero['heading']; ?></h3>
		<div class="row about-us-hero-row">
			<div class="cnt_40">
				<div class="margin-right">
					<h1 class="about-us-hero-left-heading"><?php echo $about_us_hero['heading_blurb']; ?></h1>	
				</div>	
			</div>
			<div class="cnt_60">
				<div class="margin-left">
					<div class="about-us-hero-blurb-container">
						<p class=""><?php echo $about_us_hero['blurb']; ?></p>	
					</div>
				</div>	
			</div>
		</div>
		<img src="/wp-content/uploads/2022/06/Group-26.png" alt="" class="about-us-hero-group-img">
		<div class="our-story">
			<img src="/wp-content/uploads/2022/06/Group-21.jpg" alt="" class="our-story-decor-img">
			<div class="row rtl">
				<div class="cnt_50 ltr">
					<div class="our-story-content-container margin-left">
						<h3 class="sub-heading"><?php echo $our_story_section['heading']; ?></h3>
						<h1 class="our-story-heading"><?php echo $our_story_section['heading_blurb']; ?></h1>
						<div class="our-story-blurb-container">
							<p><?php echo $our_story_section['blurb']; ?></p>
						</div>
						<?php if($our_story_section['statistics']):?>
						<div class="row">
							 <?php foreach($our_story_section['statistics'] as $row) :?>
							<div class="cnt_33">
								<div class="our-story-stats-container">
									<h1 class="our-story-stats"><?php echo $row['heading'];?></h1>
									<p class="our-story-stats-description"><?php echo $row['statistic'];?></p>
								</div>
							</div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
				</div>
				<div class="cnt_50 ltr">
					<div class="our-story-video-container margin-right">
						<?php $story_image = $our_story_section['image']; 
						if( !empty( $story_image ) ): ?>
							<img class="partner-img01" src="<?php echo esc_url($story_image['url']); ?>" alt="<?php echo esc_attr($story_image['alt']); ?>" class="our-story-decor-img"/>
						<?php endif; ?>
					</div>	
				</div>
			</div>
		</div>
	</div>
</section>
<!-- about us -->

<?php 
	$the_query = new WP_Query( array(
		'post_type'		 =>	'team',
        'orderby' => 'date',
        'order'   => 'DESC',
   )); 
?>	
<?php if ( $the_query->have_posts() ) : ?>
	<section class="team">
		<img src="/wp-content/themes/purplemoondesigns/inc/decor.svg" alt="" class="decor top-right">
		<img src="/wp-content/themes/purplemoondesigns/inc/decor-2.svg" alt="" class="decor mid-left">
		<div class="content_wrap">
			<div class="title center">
				<h3><?php echo $team_section['sub_heading']; ?></h3>
				<h1><?php echo $team_section['heading']; ?></h1>
			</div>
			<div class="team-box">
				<div class="flex-row">
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class="cnt_33">
						<div class="spaced-content">
							<div class="single-team">
								<img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php echo esc_attr(get_the_post_thumbnail()); ?>">
								<div class="team-details">
									<div class="team-des">
										<div class="team-des-inner">
											<h4><?php the_title();?></h4>
											<p><?php the_field('description'); ?></p>
										</div>
									</div>
									<div class="team-details-inner">
										<h3><?php the_field('position'); ?></h3>
										<h4><?php the_title();?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php endwhile;?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	</section>
<!-- team -->
<?php else : ?>
	<p><?php __('No content'); ?></p>				
<?php endif; ?>
<?php 


	$the_query = new WP_Query( array(
		'post_type'		 =>	'contact_info',
		'posts_per_page' => 1,
        'orderby' => 'date',
        'order'   => 'DESC',
		
   )); 
?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
	$contact_section = get_field('contact_cpt_contact_info');
	$contact_socials = $contact_section['socials'];?>
	<section class="about-us-map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1579.7817923075822!2d-4.771784327929506!3d55.9467922113845!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2095d793bfe262d4!2sMan%20On%20Inverclyde%20SCIO!5e0!3m2!1sen!2suk!4v1654506432686!5m2!1sen!2suk" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		<div class="about-us-map-contact-container">
			<div class="about-us-contact-box">
				<ul class="about-us-contact-list">
					<li class="about-us-contact-list-item"><i class="fa-solid fa-location-dot"></i><p class=""><?php echo $contact_section['address']; ?><?php echo $contact_section['address']; ?></p> </li>	
					<li class="about-us-contact-list-item"><i class="fa-solid fa-envelope"></i><a href="mailto:<?php echo $contact_section['email']; ?>" ><?php echo $contact_section['email']; ?></a> </li>	
					<li class="about-us-contact-list-item"><i class="fa-solid fa-phone"></i><a href="tel:<?php echo $contact_section['phone_number']; ?>"><?php echo $contact_section['phone_number']; ?></a></li>	
					<li class="about-us-contact-list-item">
						<a href="<?php echo $contact_socials['instagram_link']; ?>" ><i class="fa-brands fa-instagram-square"></i></a>	
						<a href="<?php echo $contact_socials['facebook_link']; ?>" ><i class="fa-brands fa-facebook"></i></a>	
						<a href="<?php echo $contact_socials['twitter_link']; ?>" ><i class="fa-brands fa-twitter-square"></i></a>	
						<a href="<?php echo $contact_socials['linkedin_link']; ?>" ><i class="fa-brands fa-linkedin"></i></a>	
						<p >Socials: <?php echo $contact_socials['socials_@']; ?></p> 
					</li>
				</ul>
			</div>	
		</div>
	</section>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<!-- map -->

<?php 
	$the_query = new WP_Query( array(
		'post_type'		 =>	'post',
		'posts_per_page' => -1,
        'orderby' => 'date',
        'order'   => 'DESC',
		
   )); 
?>			

<?php if ( $the_query->have_posts() ) : ?>
	<section class="blog">
		<div class="content_wrap">
			<div class="title center">
				<h3><?php echo $blog_section['sub_heading']; ?></h3>
				<h1><?php echo $blog_section['heading']; ?></h1>
			</div>
			<div class="blog-box">
				<div class="flex-row">
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
				</div>
			</div>
			<div class="main-btn center">
				<a href="javascript:void(0)">VIEW ALL NEWS</a>
			</div>
		</div>
	</section>
	<!-- blog -->
<?php else : ?>
	<p><?php __('No content'); ?></p>				
<?php endif; ?>

<?php get_footer();?>