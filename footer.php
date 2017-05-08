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
<a class="hidden-print" href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
</div><!-- #page -->

<?php wp_footer(); ?>
<script>
    $(document).ready(function() {
        $('.drawer').drawer();
    });
</script>
<script>
    new UISearch( document.getElementById( 'sb-search' ) );
    new UISearch( document.getElementById( 'search' ) );
</script>
</body>
</html>
