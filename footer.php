<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ALPS
 */

?>
	</div><!-- #content -->

<a class="" href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>

	<footer class=" site-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-3 footer-logo">
					<?php $alps_logo =  get_theme_mod( 'alps_logo' ); ?>
					<a href="<?php esc_url( home_url ( '/' ) ) ?>" title="<?php bloginfo( 'title' ); ?> - <?php bloginfo('description'); ?>">
						<img class="footer-logo-img center-block" src="<?php echo $alps_logo;?>" alt="<?php bloginfo( 'title' ); ?> Logo"/>
					</a>
				</div>
				<nav class="col-md-6 col-sm-6 footer-navigation">
					<?php
					wp_nav_menu(
						array(
							'theme_location'    => 'footer',
							'menu_class'           => 'footer-menu list-unstyled no-margin',
							'container'			=> 'ul'
						)
					);
					?>
				</nav>
				<hr class="visible-xs">
				<div class="footer-contact-section col-md-3 col-sm-6">
					<?php
					$phone = get_theme_mod('alps_phone_number');
					$mobile = get_theme_mod('alps_mobile_number');
					if(!empty($phone)):	 ?>
						<p class="no-margin"><?php echo $phone; ?></p>
					<?php
					endif;
					if(!empty($mobile)): ?>
						<p class="no-margin"><?php echo  $mobile; ?></p>
					<?php
					endif;
					if(!empty($email)): ?>
						<a href="mailto:<?php echo $email ?>" class="ellipsis contact-email"><?php $email; ?></a>
					<?php
					endif; ?>
					<hr class="visible-xs">
					<h4>Follow Us</h4>
					<ul class="social-links list-inline">
					<?php
						$social_media_icons = get_theme_mod('alps_social_media_icons');
						if (!empty($social_media_icons)) :
							$social_media_icons_decoded = json_decode($social_media_icons);
							foreach ($social_media_icons_decoded as $social_media_icon) : ?>
								
								<li><a class="button button-inverse button-plain button-border button-circle" target="_blank" href="<?php echo esc_url($social_media_icon->link); ?>">
									<i class="fa <?php echo esc_attr($social_media_icon->icon_value); ?>"></i>
								</a></li>
							<?php endforeach;
						endif; ?>
					</ul>
				</div><!--footer-contact-section-->
			</div><!--row-->
		</div><!--container-->
	</footer><!--site-footer-->
	<div class="container-fluid site-copyright">
		<p class="text-light text-center no-margin">Copyright &copy; <?php echo date('Y'); ?></p>
	</div>

</div><!-- #page -->
<?php wp_footer(); ?>
</body>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-98624697-1', 'auto');
  ga('send', 'pageview');

</script><!-- analytics -->

</html>
