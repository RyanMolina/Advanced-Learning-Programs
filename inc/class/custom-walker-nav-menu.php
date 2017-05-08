<?php

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {

    /*
*       <nav class="drawer-nav" role="navigation">
        <ul class="drawer-menu">
          <li class="drawer-menu-item"><a href="./top.html">Home</a></li>
          <li class="drawer-dropdown">
            <a class="drawer-menu-item" data-target="#" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
              In-house Courses <span class="drawer-caret"></span>
            </a>
            <ul class="drawer-dropdown-menu">
              <li><a class="drawer-dropdown-menu-item" href="./fixed-navbar-top.html">Course 1</a></li>
              <li><a class="drawer-dropdown-menu-item" href="./fixed-navbar-left.html">Course 2</a></li>
              <li><a class="drawer-dropdown-menu-item" href="./fixed-navbar-right.html">Course 3</a></li>
            </ul>
          </li>
          <li><a class="drawer-menu-item" href="./top.html">About</a></li>
          <li><a class="drawer-menu-item" href="./top.html">FAQ</a></li>
          <li><a class="drawer-menu-item" href="./top.html">Contact</a></li>
        </ul>
        </nav>
     */


    public function start_lvl( &$output, $depth = 0, $args = array() ) {

        $indent = str_repeat( "\t", $depth );
        $submenu = ($args->depth > 0) ? '-dropdown' : '';
        $output .= "\n$indent<ul role=\"menu\" class=\"drawer$submenu-menu\" >\n";
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $li_attributes = '';
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' .$item->ID;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        if ( $args->has_children ) {
            $class_names .= ' drawer-dropdown';
        }
        if ( in_array( 'current-menu-item', $classes, true ) ) {
            $class_names .= ' active';
        }
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
        $output .= $indent . '<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"' . $id . $value . $class_names . $li_attributes .'>';
        $atts = array();
        if ( empty( $item->attr_title ) ) {
            $atts['title']  = ! empty( $item->title )   ? strip_tags( $item->title ) : '';
        } else {
            $atts['title'] = $item->attr_title;
        }
        $atts['target'] = ! empty( $item->target )	? $item->target	: '';
        $atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';
        $atts['href'] = ! empty( $item->url ) ? $item->url : '';
        // If item has_children add atts to a.
        if ( $args->has_children ) {
            $atts['href']   		= '#';
            $atts['data-toggle']	= 'dropdown';
            $atts['class']			= 'drawer-menu-item';
            $atts['aria-haspopup']	= 'true';
        } else if( $depth === 0 ) {
            $atts['class'] = 'drawer-menu-item';
        }
        else  {
            $atts['class'] = 'drawer-dropdown-menu-item';
        }
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        $item_output = $args->before;

        if ( ! empty( $item->attr_title ) ) :
            $pos = strpos( esc_attr( $item->attr_title ), 'glyphicon' );
            if ( false !== $pos ) :
                $item_output .= '<a' . $attributes . '><span class="glyphicon ' . esc_attr( $item->attr_title ) . '" aria-hidden="true"></span>&nbsp;';
            else :
                $item_output .= '<a' . $attributes . '><i class="fa ' . esc_attr( $item->attr_title ) . '" aria-hidden="true"></i>&nbsp;';
            endif;
        else :
            $item_output .= '<a' . $attributes . '>';
        endif;
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="drawer-caret"></span></a>' : '</a>';
        $item_output .= $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

    }

    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element ) {
            return; }
        $id_field = $this->db_fields['id'];
        // Display this element.
        if ( is_object( $args[0] ) ) {
            $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] ); }
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

    public static function fallback( $args ) {
        if ( current_user_can( 'edit_theme_options' ) ) {
            /* Get Arguments. */
            $container = $args['container'];
            $container_id = $args['container_id'];
            $container_class = $args['container_class'];
            $menu_class = $args['menu_class'];
            $menu_id = $args['menu_id'];
            if ( $container ) {
                echo '<' . esc_attr( $container );
                if ( $container_id ) {
                    echo ' id="' . esc_attr( $container_id ) . '"';
                }
                if ( $container_class ) {
                    echo ' class="' . sanitize_html_class( $container_class ) . '"'; }
                echo '>';
            }
            echo '<ul';
            if ( $menu_id ) {
                echo ' id="' . esc_attr( $menu_id ) . '"'; }
            if ( $menu_class ) {
                echo ' class="' . esc_attr( $menu_class ) . '"'; }
            echo '>';
            echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" title="">' . esc_attr( 'Add a menu', '' ) . '</a></li>';
            echo '</ul>';
            if ( $container ) {
                echo '</' . esc_attr( $container ) . '>'; }
        }
    }
}