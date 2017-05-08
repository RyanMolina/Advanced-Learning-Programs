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
    $bg = 'background: #777 url('.$url.') no-repeat center; background-size: cover; background-blend-mode: multiply;';
    ?>
    <header class="entry-header overlay--dark hidden-print" style="<?php echo $bg; ?>">
  		<div class="entry-header-text container">
  			<?php the_title('<h1 class="entry-title title is-1 has-text-white">', '</h1>'); ?></h1>
  			<h2 class="entry-headline subtitle is-3 has-text-white"><?php echo get_the_excerpt(); ?></h2>
  		</div><!--.entry-header-text-->
    </header><!-- .entry-header -->
    <div class="container entry-content">
		<div class="row">
			<div class="col-md-3 hidden-sm hidden-xs">
				<aside class="sticky container-fluid">
				  <h3 class="title is-3"><?php the_title(); ?></h3>
				  <p><?php the_excerpt(); ?></p>
          <div class="row hidden-print">
				        <button class="col-lg-12 col-md-12 button">Inquire Now</button>
				      <button class="col-lg-12 col-md-12 button button-caution">Register Now</button>
          </div>
				</aside><!--.stick-->
			</div><!--col-md-3-->
			<div class="col-md-9">
				<div class="entry-description">
					<h2>Description</h2>
					<?php the_content(); ?>
				</div><!--entry-description-->
				<div class="entry-outline">
					<h2>Course Objective</h2>
					<?php $course_outline = get_post_meta(get_the_ID(), 'course_outline_wysiwyg', true);
					echo $course_outline; ?>
				</div><!--.entry-outline-->
				<div class="entry-module">
					<h2 class="entry-module-header">Modules</h2>
					<span class="entry-module-count "></span>
					<?php $course_module = get_post_meta(get_the_ID(), 'course_module_wysiwyg', true);
		      echo $course_module;?>
				</div><!--.entry-module-->
				<a href="javascript:window.print()" class="">Download Modules as PDF</a>
				<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'alps' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<br/><span class="edit-link">',
					'</span>'
				);
				?>
			</div> <!--col-md-9-->
		</div><!--.row-->
    </div><!-- .entry-content -->


    <footer class="entry-footer container-fluid">
		<div class="row hidden-print">
       <button class="col-sm-6 col-xs-6 hidden-md hidden-lg button">Inquire Now</button>
		   <button class="col-sm-6 col-xs-6 hidden-md hidden-lg button button-caution">Register Now</button>
		</div><!--.row-->
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
