<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ALPS
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    	$url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
		$fallback_bg = get_theme_mod('alps_color');
		$bg = 'background: '.$fallback_bg.' url('.$url.') no-repeat center; background-size: cover;';
    ?>
    <header class="jumbotron section-header " style="<?php echo $bg; ?>">
  		<div class="container">
			<div class="section-header-content text-light text-shadow ">
  				<?php the_title('<h1>', '</h1>'); ?>
  				<?php echo get_the_excerpt(); ?>
			</div>
  		</div><!--.entry-header-text-->
    </header><!-- .entry-header -->
    <div class="container">
		<div class="row">
			<div id="sidebar" class="col-md-3 hidden-sm hidden-xs">
				<div class="container-fluid ">
					<?php the_title('<h3>', '</h3>'); ?>
					<?php the_excerpt(); ?>
					<div class="row">
					<button data-toggle="modal" data-target="#modalInquire" class="col-lg-12 col-md-12 button button-caution" title="Inquire about <?php echo get_the_title(); ?>">Inquire Now</button>
					<?php if(get_post_type(get_the_ID()) == 'public-course'):?>
					<form action="<?php echo esc_url(home_url( '/registration' )); ?>"  method="post">
						<input type="hidden" value="<?php echo get_the_ID(); ?>" name="course_id" id="course_id" />
						<button type="submit" value="<?php echo get_the_title();?>" name="course_name" class="col-lg-12 col-md-12 button button-default" title="Register to <?php echo get_the_title(); ?>">Register Now</button>
					</form>
						<?php endif; ?>
					</div>
				</div><!--.stick-->
			</div><!--col-md-3-->
			<div class="col-md-9">
				<h2>Description</h2>
				<?php 
				the_content();
				if(get_post_type(get_the_ID()) == 'public-course'): ?> <!--Display only on Public Course -->
					<h2>Schedule</h2>
					<?php 
					$day_schedule = show_date('course_day_schedule', 'AM class');
					$night_schedule = show_date('course_night_schedule', 'PM class');

					if(empty($day_schedule) && empty($night_schedule)):
						echo '<i>No schedule available</i>';
					endif;

			
				endif;
				function show_date($id, $title) {
					$schedule = get_post_meta(get_the_ID(), $id, true);
					if(!empty($schedule)):
						$schedule_filtered = array_filter($schedule, 'blank_filter');
						if(!empty($schedule_filtered)): ?>
							<h4><?php echo $title; ?></h4>
							<ul><?php 
							foreach($schedule_filtered as $date):
								echo '<li>'.$date.'</li>';
							endforeach;?>
							</ul><?php
						endif;
					endif;
					return $schedule_filtered;
				}

				?>
				<h2>Course Objective</h2>
				<?php
					$course_outline = get_post_meta(get_the_ID(), 'course_outline_wysiwyg', true);
					echo $course_outline;
				?>
				<h2 class="entry-module-header">Modules</h2>
				<?php
					$course_module = get_post_meta(get_the_ID(), 'course_module_wysiwyg', true);
					echo $course_module;

					$_SESSION['course_title'] = get_the_title();
					$_SESSION['course_description'] = get_the_content();
					$_SESSION['course_outline'] = $course_outline;
					$_SESSION['course_module'] = $course_module;
					$_SESSION['company_name'] = get_bloginfo('title');
					$_SESSION['company_logo'] = get_theme_mod('alps_pdf_logo');
					$_SESSION['company_phone'] = get_theme_mod('alps_phone_number');
					$_SESSION['company_mobile'] = get_theme_mod('alps_mobile_number');
					$_SESSION['company_email'] = get_theme_mod('alps_email_address');
				?>
				<br/>
				<br/>
				<a class="no-padding" href="<?php echo(get_template_directory_uri() . '/inc/print_page.php');?>" title="Download PDF for <?php echo get_the_title(); ?>">Download PDF <i class="fa fa-file-pdf-o"></i></a>
				<?php
					edit_post_link(
						sprintf(
							/* translators: %s: Name of current post */
							esc_html__( 'Edit %s', 'alps' ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						),
						'<br/><span class="edit-link ">',
						'</span>'
					);
				?>
			</div> <!--col-md-9-->
		</div><!--.row-->
    </div><!-- container -->

    <div class="entry-footer container-fluid">
		<div class="row ">
		   <?php if(get_post_type(get_the_ID()) == 'public-course'): ?>
		   <button data-toggle="modal" data-target="#modalInquire" class="col-sm-6 col-xs-6 hidden-lg hidden-md button button-default">Inquire Now</button>
		   <form action="<?php echo esc_url(home_url( '/registration' )); ?>"  method="post">
				<input type="hidden" value="<?php echo get_the_ID(); ?>" name="course_id" id="course_id" />
			   	<button type="submit" value="<?php echo get_the_title();?>" name="course_name" class="col-sm-6 col-xs-6 hidden-lg hidden-md button button-caution" title="Register to <?php echo get_the_title(); ?>">Register Now</button>
		   </form>
		   <?php else: ?>
		   <button data-toggle="modal" data-target="#modalInquire" class="col-xs-12 hidden-lg hidden-md button button-caution" title="Inquire about <?php echo get_the_title(); ?>">Inquire Now</button>
		   <?php endif; ?>
		</div><!--.row-->
    </div><!-- .entry-footer -->

	<div class="modal fade" id="modalInquire" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
		<div class="modal-dialog" >
			<div class="modal-content">
				<div class="modal-header" style="background-color: rgb(204, 0, 0); color:white;">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">
						Inquire about <span><?php echo get_the_title(); ?></span>
					</h4>
				</div><!--Modal Header-->
				<div class="modal-body">
					<form id="inquire_form" data-toggle="validator" action="javascript: sendInquiryData();" method="POST" >
						<input type="hidden" value="<?php echo get_the_title(); ?>" name="course" id="course" />
						<?php get_template_part('template-parts/form/content', 'contactform'); ?>
					</form>
					<div class="alert alert-success alert-dismissable" id="success_message">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Success!</strong> <?php echo get_theme_mod('alps_form_inquire_success'); ?>
					</div>
				</div><!--modal-body-->
			</div><!--modal-content-->
		</div><!--modal dialog-->
	</div><!--modal -->
</article><!-- #post-## -->
