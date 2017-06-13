<?php /* Template Name: About Us */ ?>
<?php
get_header();?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		   <?php
		   $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
		   $fallback_bg = get_theme_mod('alps_color');
		   $bg = 'background: '.$fallback_bg.' url('.$url.') no-repeat center; background-size: cover;';
		   $page = get_page_by_title(get_the_title());
		   $content = apply_filters('get_the_content', $page->post_content);
		   ?>
		   <header class="jumbotron no-margin" style="<?php echo $bg; ?>">
		   		<div class="container text-shadow text-light word-break">
		   			<?php the_title('<h1>', '</h1>'); ?>
		   			<p><?php echo $content; ?></p>
		   		</div>
			</header>
			<?php $first_section = get_theme_mod('alps_about_page_first');
			$first_section_repeatable = get_theme_mod('alps_about_page_first_repeatable'); ?>
			<div class="jumbotron">
				<div class="container">
					<h1 class="text-center"><?php echo esc_attr($first_section); ?></h1>
				</div>
			</div>

			<div class="flexbox">
				<?php
				  if(!empty($first_section_repeatable)) :
					$first_section_repeatable_decoded = json_decode($first_section_repeatable);
					foreach($first_section_repeatable_decoded as $item) : ?>
					<div class="column word-break about-page-column">
						<i class="fa <?php echo esc_attr($item->icon_value);?>" aria-hidden="true" id="element-icon"></i>
					  	<?php
						  if(!empty($item->text)):?>
							<p ><?php echo $item->text; ?></p>
						  <?php endif; ?>
					</div>
					<?php endforeach;
				  endif;
				  ?>
			</div>
			<?php
				$second_section_title = get_theme_mod('alps_about_page_second_title');
				$second_section_desc = get_theme_mod('alps_about_page_second_desc');
				$second_section_repeatable = get_theme_mod('alps_about_page_second_repeatable');
			?>
			<header class="jumbotron text-center">
				<div class="container">
					<h1 class="text-center"><?php echo $second_section_title ?></h1>
					<p><?php echo esc_attr($second_section_desc); ?></p>
				</div>
			</header>
			<div class="flexbox">
				<?php
				if(!empty($second_section_repeatable)) :
					$second_section_repeatable_decoded = json_decode($second_section_repeatable);
					foreach($second_section_repeatable_decoded as $item) : ?>
						<div class="column about-page-column">
							<i class="fa <?php echo esc_attr($item->icon_value);?>" aria-hidden="true" id="element-icon"></i>
							<h2><span id="about-us-tp-tag"><?php echo $item->title ?></span></h2>
							<p ><?php echo $item->text; ?></p>
						</div>
					<?php endforeach;
				endif;?>
			</div>

			</div>
		</div>
<?php
get_footer();
