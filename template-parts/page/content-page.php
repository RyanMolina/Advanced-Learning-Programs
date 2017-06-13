<?php
/**
 * Template part for displaying page content in page.php
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
    <header class="jumbotron" style="<?php echo $bg; ?>">
		<div class="container">
        	<?php the_title( '<h1 class="no-margin text-light text-shadow">', '</h1>' ); ?>
		</div>
    </header>
    <div class="container">
        <?php the_content();?>
    </div>
    <?php if ( get_edit_post_link() ) : ?>
    <footer class="entry-footer">
        <?php
        edit_post_link(
            sprintf(
            /* translators: %s: Name of current post */
                esc_html__( 'Edit %s', 'alps' ),
                the_title( '<span class="screen-reader-text">"', '"</span>', false )
            ),
            '<span class="edit-link">',
            '</span>'
        );
        ?>
    </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-## -->
