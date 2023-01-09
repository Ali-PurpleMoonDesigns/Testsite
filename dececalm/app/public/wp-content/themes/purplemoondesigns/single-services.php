<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package purplemoondesigns
 */

get_header();
$more_support = get_field('service_cpt_support');

?>

<main id="primary" class="site-main">

	<section class="breadcrumbs overlay" style="background-image: url(/wp-content/uploads/2022/06/Rectangle.jpg)">
		<h1 class="white"><?php the_title('');?></h1>
		<h2 class="white"><?php the_category(', '); ?>: <?php the_field('time_range');?></h2>
	</section>
	<!-- breadcrumbs --> 
	
	<section class="entry-service">
		<div class="content_wrap">
			<h3 class="sub-heading"><?php the_field('heading');?></h3>
			<div class="row about-us-hero-row">
				<div class="cnt_40">
					<div class="margin-right">
						<h1 class="about-us-hero-left-heading"><?php the_field('heading_blurb');?></h1>	
					</div>	
				</div>
				<div class="cnt_60">
					<div class="margin-left">
						<div class="about-us-hero-blurb-container">
							<p class=""><?php the_field('description');?></p>	
						</div>
					</div>	
				</div>
			</div>
		</div>
	</section>
	<!-- entry service -->
	
	<section class="service-main">
		<div class="content_wrap">
			<div class="row">
				<div class="cnt_70">
					<div class="margin-right">
						<div class="service-content">
							<?php if(have_rows('faq')):?>
								<div class="accordion">
									<div class="tab-title bg-blue">
										<h2 class="yellow">Programme Frequently Asked Questions</h2>
									</div>
									<?php while( have_rows('faq')) : the_row();?>
									<div class="accordion__item">
										<button class="accordion__btn">
										  <span class="accordion__caption"><i class="far fa-lightbulb"></i><?php the_sub_field('question'); ?></span>
										  <span class="accordion__icon"><i class="fa fa-plus"></i></span>
										</button>
										<div class="accordion__content">
											<p><?php the_sub_field('answer'); ?></p>
										</div>
									</div>
									<?php endwhile; ?>
								</div>
							<?php endif; ?>
							<div class="our-story os-smaller">
								<div class="os-img">
									<img src="http://devmoi.local/wp-content/uploads/2022/06/Group-26.png" alt="">
								</div>
								<div class="our-story-content-container">
									<h3 class="sub-heading"><?php echo $more_support['heading']; ?></h3>
									<h1 class="our-story-heading"><?php echo $more_support['headin_blurb']; ?></h1>
									<div class="our-story-blurb-container">
										<p class=""><?php echo $more_support['blurb']; ?></p>
									</div>
									<?php if($more_support['statistics']):?>
									<div class="row">
										 <?php foreach($more_support['statistics'] as $row) :?>
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
				<div class="cnt_30">
					<div class="margin-left">
						<div class="service-sidebar">
							<?php if ( $the_query->have_posts() ) :?>
								<div class="sidebar-box">
									<div class="sidebar-title">
										<h3 class="yellow">Our services</h3>
									</div>
									<ul class="sidebar-list">
										<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
										<li><a href="javascript:void(0)"><?php the_title();?></a><span><?php the_category(', '); ?>: <?php the_field('time_range');?></span></li>
										<?php endwhile;?>
										<?php wp_reset_postdata(); ?>
									</ul>
								</div>
							<?php else : ?>
							<p><?php __('No content'); ?></p>				
							<?php endif; ?>
							<div class="sidebar-box second-sidebar">
								<div class="sidebar-title">
									<h3 class="yellow">Contact us</h3>
								</div>
								<div class="sidebar-form">
									<?php echo do_shortcode( '[contact-form-7 id="40" title="Contact form 1"]' );  ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- service main content -->
	
<?php 
	$the_query = new WP_Query( array(
		'post_type'		 =>	'post',
		'posts_per_page' => 3,
        'orderby' => 'date',
        'order'   => 'DESC',
		
   )); 
?>			

<?php if ( $the_query->have_posts() ) : ?>
<section class="blog dark-blog">
	<div class="content_wrap">
		<div class="title center">
			<h3>Our Blog</h3>
			<h1>News &amp; Campaigns</h1>
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
	


	</main><!-- #main -->
							
<script>
// select all accordion items
const accItems = document.querySelectorAll(".accordion__item");

// add a click event for all items
accItems.forEach((acc) => acc.addEventListener("click", toggleAcc));

function toggleAcc() {
  // remove active class from all items exept the current item (this)
  accItems.forEach((item) => item != this ? item.classList.remove("accordion__item--active") : null
  );

  // toggle active class on current item
  if (this.classList != "accordion__item--active") {
    this.classList.toggle("accordion__item--active");
  }
}
							
</script>	

<?php
get_footer();
