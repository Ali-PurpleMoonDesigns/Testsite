<?php

/*

Template name: Services

*/

get_header();
$services_hero = get_field('services_page_what_we_offer');
$blog_section = get_field('services_page_blog_section');
?>

<section class="breadcrumbs overlay" style="background-image: url(<?php echo $services_hero['banner_image']; ?>)">
	<h1 class="white"><?php the_title('');?></h1>
</section>
<!-- breadcrumbs --> 

<section class="main-service">
	<div class="content_wrap">
		<h3 class="sub-heading"><?php echo $services_hero['heading']; ?></h3>
		<div class="row about-us-hero-row">
			<div class="cnt_40">
				<div class="margin-right">
					<h1 class="about-us-hero-left-heading"><?php echo $services_hero['heading_blurb']; ?></h1>	
				</div>	
			</div>
			<div class="cnt_60">
				<div class="margin-left">
					<div class="about-us-hero-blurb-container">
						<p class=""><?php echo $services_hero['blurb']; ?></p>	
					</div>
				</div>	
			</div>
		</div>
		<?php 
		$the_query = new WP_Query( array(
			'post_type'		 =>	'services',
			'orderby' => 'date',
			'order'   => 'DESC',
		   )); 
		?>	
	<?php if ( $the_query->have_posts() ) :?>
			<div class="services-box">
				<div class="flex-row">
					<div class="cnt_50">
						<div class="service-feat">
							<div class="service-feat-inner">
								<div class="sfi-inner">
									<h2 class="blue">Monday</h2>
									<ul class="service-list">
										<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
										<?php if (in_category('Monday')) : ?>
										<li><a href="<?php the_permalink(); ?>"><span><?php the_field('time_range');?>:</span> <?php the_title();?>
											<?php if(get_field('referral_required')): ?>
											<span class="dis">-Referral required <span class="star">*</span></span></a></li>
											<?php endif; ?>
											<?php endif; ?>
										<?php endwhile;?>
										<?php wp_reset_postdata(); ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="cnt_50">
						<div class="service-feat">
							<div class="service-feat-inner">
								<div class="sfi-inner">
									<h2 class="blue">Tuesday</h2>
									<ul class="service-list">
										<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
										<?php if (in_category('Tuesday')) : ?>
										<li><a href="<?php the_permalink(); ?>"><span><?php the_field('time_range');?>:</span> <?php the_title();?>
											<?php if(get_field('referral_required')): ?>
											<span class="dis">-Referral required <span class="star">*</span></span></a></li>
											<?php endif; ?>
										<?php endif; ?>
										<?php endwhile;?>
										<?php wp_reset_postdata(); ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="cnt_50">
						<div class="service-feat">
							<div class="service-feat-inner">
								<div class="sfi-inner">
									<h2 class="blue">Wednesday</h2>
									<ul class="service-list">
										<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
										<?php if (in_category('Wednesday')) : ?>
										<li><a href="<?php the_permalink(); ?>"><span><?php the_field('time_range');?>:</span> <?php the_title();?>
											<?php if(get_field('referral_required')): ?>
											<span class="dis">-Referral required <span class="star">*</span></span></a></li>
											<?php endif; ?>
										<?php endif; ?>
										<?php endwhile;?>
										<?php wp_reset_postdata(); ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="cnt_50">
						<div class="service-feat">
							<div class="service-feat-inner">
								<div class="sfi-inner">
									<h2 class="blue">Thursday</h2>
									<ul class="service-list">
										<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
										<?php if (in_category('Thursday')) : ?>
										<li><a href="<?php the_permalink(); ?>"><span><?php the_field('time_range');?>:</span> <?php the_title();?>
											<?php if(get_field('referral_required')): ?>
											<span class="dis">-Referral required <span class="star">*</span></span></a></li>
											<?php endif; ?>
											<?php endif; ?>
										<?php endwhile;?>
										<?php wp_reset_postdata(); ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<p class="ref-disclaimer"><?php echo $services_hero['disclaimer']; ?></p>
			</div>
		<?php else : ?>
		<p><?php __('No content'); ?></p>				
		<?php endif; ?>
	</div>
</section>
<!-- main services -->

<?php 
	$the_query = new WP_Query( array(
		'post_type'		 =>	'post',
		'posts_per_page' => -1,
        'orderby' => 'date',
        'order'   => 'DESC',
		
   )); 
?>			

<?php if ( $the_query->have_posts() ) : ?>
	<section class="blog dark-blog">
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