
<nav id="site-navigation" class="main-navigation drawer-nav" role="navigation">
    <?php
    require(get_template_directory() . '/inc/class/custom-walker-nav-menu.php');
    wp_nav_menu(
        array(
            'menu'            => 'primary',
            'theme_location'  => 'primary',
            'container'       => 'ul',
            'depth'           => 2,
            'container_class' => 'drawer-menu',
            'menu_class'      => 'drawer-menu',
            'walker'          => new Custom_Walker_Nav_Menu()
        )
    );
 	get_search_form();
    ?>

</nav>
