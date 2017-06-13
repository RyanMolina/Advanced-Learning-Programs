<?php /* Template Name: Contact Us */ ?>
<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ALPS
 */
get_header();
	$page = get_page_by_title(get_the_title());
	$content = apply_filters('the_content', $page->post_content);
	$url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
	$fallback_bg = get_theme_mod('alps_color');
	$bg = 'background: '.$fallback_bg.' url('.$url.') no-repeat center; background-size: cover;';
	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<header class="jumbotron " style="<?php echo $bg; ?>">
		  		<div class="container text-centered text-light text-shadow">
		  			<?php the_title('<h1>', '</h1>'); ?></h1>
		  			<h2><?php echo get_the_excerpt(); ?></h2>
		  		</div><!--.entry-header-text-->
		    </header><!-- .entry-header -->
			<section class="text-center">
				<h2>Connect with us today!</h2>
				<h4>We will reply within 24 hours</h2>
			</section>
			<hr/>
			<div class="container">
				<div class="row">
					<div class="col-lg-7 col-md-6">
						<form method="post" id="contact_form" class="contact-form" action="javascript: sendContactData();" role="form" data-toggle="validator">
						<?php get_template_part('template-parts/form/content', 'contactform'); ?>
						</form>
						<div class="alert alert-success alert-dismissable" id="success_message">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Success!</strong> <?php echo get_theme_mod('alps_form_contact_success'); ?>
						</div>
					</div>
					<hr class="visible-sm visible-xs"/>
					<div class="col-lg-5 col-md-6 center-block">
						<div class="pull-right-lg pull-right-md">
							<div>
								<h3><?php echo bloginfo( 'title' )?></h4>
								<?php $phone = get_theme_mod('alps_phone_number'); 
								if(!empty($phone)): ?>
									<h5><strong>Telephone: </strong><?php echo $phone; ?></h5>
								<?php 
								endif; 
								$smart = get_theme_mod('alps_smart_number'); 
								$mobile = get_theme_mod('alps_mobile_number');
								if(!empty($mobile)): ?>
									<h5><strong>Mobile: </strong><?php echo $mobile; ?></h5>
								<?php 
								endif;
								$email = get_theme_mod('alps_email_address'); 
								if(!empty($email)):?>
								<h5><strong>Email: </strong><a href="mailto:<? echo $email; ?>" class="contact-email"><?php echo $email; ?></a></h5>
								<?php endif; ?>
							</div>
							<div>
								<?php $office_address = get_theme_mod('alps_office_address'); ?>
								<h5><strong>Office Address: </strong><?php echo $office_address; ?></h5>
								<?php $map = get_theme_mod( 'alps_map' ); 
								if(!empty($map)):?>
									<img title="<?php echo $office_address; ?>" src="<?php echo $map; ?>" alt="<?php echo $office_address; ?>"/>
								<?php
								endif;?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--site-main-->
	</div><!--conteent-area-->
<?php
get_footer();
