<?php

/*

Template name: Home

*/

get_header();

$banner = get_field('home_page_banner');
$banner_button = $banner['button'];
$content = get_field('home_page_content');
$services_section = get_field('home_page_our_services');
$team_section = get_field('home_page_team');
$blog_section = get_field('home_page_blog_section');
?>

<section class="hero overlay" style="background-image: url(<?php echo $banner['banner_image']; ?>)">
	<div class="content_wrap">
		<div class="hero-text">
			<div class="hero-inner relative">
				<p class="white"><?php echo $banner['sub_heading']; ?></p>
				<h1 class="white"><?php echo $banner['heading']; ?></h1>
				<?php if($banner['button']):?>
					<div class="main-btn hero-btn">
						<a href="<?php echo $banner_button['button_link'];?>"><?php echo $banner_button['button_text']?></a>
					</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</section>
<!-- hero -->

<section class="about-us">
	<div class="row table">
		<div class="cnt_50 bg-blue cell">
			<div class="full-width">
				<h3 class="white"><?php echo $content['content_heading'];?></h3>
				<h2 class="white"><?php echo $content['content_heading_blurb'];?></h2>
				<p class="white"><?php echo $content['content_blurb'];?></p>
				<div class="usp-box">  
				<?php if($content['content_list']):?>
					<ul class="usp-list">
						 <?php foreach($content['content_list'] as $row) :?>
							<li><i class="fa-brands fa-buffer"></i> <h4><?php echo $row['heading'];?></h4><span><?php echo $row['description'];?></span></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="cnt_50 cell bg-image">
			<div class="about-stats">
				<div class="empty-col"></div>
				<div class="col">
					<div class="col-stats bg-yellow">
						<div class="flex-middle">
							<h1><?php echo $content['years_of_experience'];?></h1>
							<h1>Years of experience</h1>
						</div>
					</div>
					<div class="col-stats bg-white">
						<div class="flex-middle">
							<img src="/wp-content/uploads/2022/05/therapy-icon.jpg" alt="">
							<h2><?php echo $content['helped_clients_blurb'];?></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- services -->

<?php 
	$the_query = new WP_Query( array(
		'post_type'		 =>	'services',
        'orderby' => 'date',
        'order'   => 'DESC',
		'posts_per_page' => 2,
   )); 
?>	
<?php if ( $the_query->have_posts() ) : ?>

<section class="services">
	<div class="content_wrap">
		<div class="title center">
			<h3><?php echo $services_section['sub_heading']; ?></h3>
			<h1><?php echo $services_section['heading']; ?></h1>
		</div>
		<div class="service-box">
			<div class="row">
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class="cnt_50">
						<div class="margin-right">
							<div class="single-service">
								<img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php echo esc_attr(get_the_post_thumbnail()); ?>" alt="">
								<div class="service-description">
									<h2><a href="<?php the_permalink(); ?>" class="blue"><?php the_title();?></a></h2>
									<p><?php the_field('description'); ?></p>
									<div class="inline-btn">
										<a href="<?php the_permalink(); ?>">Read more <i class="fa-solid fa-angle-right"></i></a>
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
<!-- services -->
<?php else : ?>
	<p><?php __('No content'); ?></p>				
<?php endif; ?>


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