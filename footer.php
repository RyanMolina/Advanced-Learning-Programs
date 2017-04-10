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

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">

            <?php echo get_theme_mod('alps_contact_number'); ?>

            <ul class="social-icons">
            <?php
            $social_media_icons = get_theme_mod('alps_social_media_icons');
            if (!empty($social_media_icons)) :
                $social_media_icons_decoded = json_decode($social_media_icons);
                foreach ($social_media_icons_decoded as $social_media_icon) : ?>

                    <a href="<?php echo esc_url($social_media_icon->link); ?>">
                        <span class="fa <?php echo esc_attr($social_media_icon->icon_value); ?>"></span>
                    </a>

                <?php endforeach;
            endif; ?>
            </ul>

            <?php get_template_part( 'template-parts/navigation/navigation', 'footer' ); ?>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
