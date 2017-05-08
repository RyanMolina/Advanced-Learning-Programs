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
    $bg = 'background: #777 url('.$url.') no-repeat center; background-size: cover; background-blend-mode: multiply;';
    ?>
    <header class="entry-header entry-header--thin overlay--dark" style="<?php echo $bg; ?>">
		<div class="entry-header-text container">
        	<?php the_title( '<h1 class="entry-title has-text-shadow">', '</h1>' ); ?>
		</div>
    </header><!-- .entry-header -->

    <div class="entry-content container">
        <?php the_content();?>
    </div><!-- .entry-content -->

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
