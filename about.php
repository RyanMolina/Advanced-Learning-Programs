<section class="container-fluid section-about-us">
	<div class="row">
		
		   <?php
		   $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
		   $fallback_bg = get_theme_mod('alps_color');
		   $bg = 'background: '.$fallback_bg.' url('.$url.') no-repeat center; background-size: cover;';
		   $page = get_page_by_title(get_the_title());
		   $content = apply_filters('get_the_content', $page->post_content);
		   ?>
			<?php $first_section = get_theme_mod('alps_about_page_first');
			$first_section_repeatable = get_theme_mod('alps_about_page_first_repeatable'); ?>
			<header class="major">
				<h1> What We Do 
					<hr class="aligncenter custom-hr-about"/>
				</h1>
			</header>

			<div class="flexbox">
				<?php
				  if(!empty($first_section_repeatable)) :
					$first_section_repeatable_decoded = json_decode($first_section_repeatable);
					foreach($first_section_repeatable_decoded as $item) : ?>
					<div class=" column about-page-column">
						<i  class="icon rounded big fa <?php echo esc_attr($item->icon_value);?>" style="background-color: #d43c61 !important;" aria-hidden="true" id="element-icon"></i>
					  	<?php
						  if(!empty($item->text)):?>
							<p ><?php echo $item->text; ?></p>
						  <?php endif; ?>
					</div>
					<?php endforeach;
				  endif;
				  ?>
			</div>
	</div>

</section>