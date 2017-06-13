<?php
/**
 * ALPS Theme Customizer
 *
 * @package ALPS
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function alps_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'alps_nav_logo', array(
			'selector' => '.drawer-brand-img'
		));
        $wp_customize->selective_refresh->add_partial( 'alps_logo', array(
			'selector' => '.site-brand'
		));
        $wp_customize->selective_refresh->add_partial( 'alps_color', array(
            'selector' => '.card-header-img'
        ));

        $wp_customize->selective_refresh->add_partial( 'alps_map', array(
            'selector' => '.contact-us-map'
        ));
        $wp_customize->selective_refresh->add_partial( 'alps_mobile_number', array(
            'selector' => '.contact-numbers'
        ));
        $wp_customize->selective_refresh->add_partial( 'alps_phone_number', array(
            'selector' => '.contact-number'
        ));
        $wp_customize->selective_refresh->add_partial( 'alps_office_address', array(
            'selector' => '.contact-address'
        ));
        $wp_customize->selective_refresh->add_partial( 'alps_email_address', array(
            'selector' => '.contact-email'
        ));
	}
    /*
     * WP CONTROLS
     *
     */
    // $wp_customize->remove_section('header_image');
    $wp_customize->remove_section('static_front_page');
    // $wp_customize->remove_section('background_color');
    // $wp_customize->remove_section('background_image');
    // $wp_customize->remove_section('colors');




    /*
     * Logo Panel
     */
    $wp_customize->add_panel('alps_logo_panel', array(
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Logo', 'alps')
    ));
    /*
    * Logo Section
    */
    $wp_customize->add_section('alps_logo_section', array(
        'title' => esc_html__('Header Logo', 'alps'),
        'panel' => 'alps_logo_panel'
    ));
    $wp_customize->add_setting( 'alps_logo', array(
        'sanitize_callback' => 'esc_url',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 'alps_logo',
            array(
                'label'    => esc_html__( 'Header Logo (For best quality use SVG)', 'alps' ),
                'section'  => 'alps_logo_section',
                'priority'    => 1,
            )
        )
    );
    /**
    * Nav Logo
    **/
    $wp_customize->add_section('alps_nav_logo_section', array(
        'title' => esc_html__('Nav Logo', 'alps'),
        'panel' => 'alps_logo_panel'
    ));
    $wp_customize->add_setting( 'alps_nav_logo', array(
        'sanitize_callback' => 'esc_url',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 'alps_nav_logo',
            array(
                'label'    => esc_html__( 'Nav Logo (For best quality use SVG)', 'alps' ),
                'section'  => 'alps_nav_logo_section',
                'priority'    => 1,
            )
        )
    );
    /**
    * PDF Logo
    **/
    $wp_customize->add_section('alps_pdf_logo_section', array(
        'title' => esc_html__('PDF Logo', 'alps'),
        'panel' => 'alps_logo_panel'
    ));
    $wp_customize->add_setting( 'alps_pdf_logo', array(
        'sanitize_callback' => 'esc_url',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 'alps_pdf_logo',
            array(
                'label'    => esc_html__( 'PDF Logo (Images only: jpeg, gif, png)', 'alps' ),
                'section'  => 'alps_pdf_logo_section',
                'priority'    => 1,
            )
        )
    );

    /* Require Once Icon Picker */
    require_once( 'class/general-customizer-control.php' );
    /**
    * About Page
    **/
    $wp_customize->add_panel('alps_about_page_panel', array(
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'About Page', 'alps')
    ));
    $wp_customize->add_section( 'alps_about_page_first_section' , array(
        'title' => esc_html__( 'About Page First Section', 'alps' ),
        'panel' => 'alps_about_page_panel',
    ));
    $wp_customize->add_setting( 'alps_about_page_first', array(
        'capability' => 'edit_theme_options',
        'default' => 'What we do',
        'sanitize_callback' => 'sanitize_text_field',
        'panel' => 'alps_about_page_panel'
    ) );
    $wp_customize->add_control( 'alps_about_page_first', array(
        'type' => 'textarea',
        'section' => 'alps_about_page_first_section', // // Add a default or your own section
        'label' => __( 'About Page First Section' ),
        'description' => __( 'Write something about what you do.' ),
    ));
    $wp_customize->add_setting( 'alps_about_page_first_repeatable', array(
        'sanitize_callback' => 'alps_sanitize_repeater',
        'default' => json_encode(
            array(
			array( 'icon_value' => 'fa fa-facebook' , 'text' => 'We are awesomeeee', /*'title' => '' */ )
            )
        ),
    ));
    $wp_customize->add_control( new General_Customizer_Control( $wp_customize, 'alps_about_page_first_repeatable', 'ABOUT US', array(
        'label'   => esc_html__( 'Add new','alps' ),
        'section' => 'alps_about_page_first_section',
        'customizer_icon_control' => true,
        'customizer_title_control' => true,
        'customizer_text_control' => true,
    )));
    /**
    * About Page Second Section
    **/
    $wp_customize->add_section( 'alps_about_page_second_section' , array(
        'title' => esc_html__( 'About Page Second Section', 'alps' ),
        'panel' => 'alps_about_page_panel',
    ));

    $wp_customize->add_setting( 'alps_about_page_second_title', array(
        'capability' => 'edit_theme_options',
        'default' => 'How you do it',
        'sanitize_callback' => 'sanitize_text_field',
        'panel' => 'alps_about_page_panel'
    ) );
    $wp_customize->add_control( 'alps_about_page_second_title', array(
        'section' => 'alps_about_page_second_section', // // Add a default or your own section
        'label' => __( 'Content Title' ),
        'description' => __( 'Write something about how you do it.' ),
    ));

    $wp_customize->add_setting( 'alps_about_page_second_desc', array(
        'capability' => 'edit_theme_options',
        'default' => 'How you do it',
        'sanitize_callback' => 'sanitize_text_field',
        'panel' => 'alps_about_page_panel'
    ) );
    $wp_customize->add_control( 'alps_about_page_second_desc', array(
        'type' => 'textarea',
        'section' => 'alps_about_page_second_section', // // Add a default or your own section
        'label' => __( 'Content Description' ),
        'description' => __( 'Write something about how you do it.' ),
    ));


    /**
    * About Page Services Repeatable
    **/
    $wp_customize->add_setting( 'alps_about_page_second_repeatable', array(
        'sanitize_callback' => 'alps_sanitize_repeater',
        'default' => json_encode(
            array(
                array( 'icon_value' => 'fa fa-building' , 'text' => 'We are awesomeeee~~', 'title' => 'Title Here/Leave it empty' )
            )
        ),
        'panel' => 'alps_about_page_panel'
    ));
    $wp_customize->add_control( new General_Customizer_Control( $wp_customize, 'alps_about_page_second_repeatable', 'SERVICES', array(
        'label'   => esc_html__( 'Add new','alps' ),
        'section' => 'alps_about_page_second_section',
        'customizer_icon_control' => true,
        'customizer_title_control' => true,
        'customizer_subtitle_control' => true,
        'customizer_link_control' => true,
        'customizer_text_control' => true,
        'customizer_shortcode_control' => true,

    )));

    /**
    * Front Page Panel
    **/
    $wp_customize->add_panel('alps_front_page_panel', array(
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Front Page', 'alps')
    ));
    /**
    * Front Page Services Section
    **/
    $wp_customize->add_section('alps_services_section', array(
        'title' => esc_html__('Services Section', 'alps'),
        'panel' => 'alps_front_page_panel'
    ));
    $wp_customize->add_setting( 'alps_services_img', array(
        'default' => get_template_directory() . '/images/services.png' ,
        'sanitize_callback' => 'esc_url',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 'alps_services_img',
            array(
                'label'    => esc_html__( 'Services Background Image', 'alps' ),
                'section'  => 'alps_services_section',
                'priority'    => 1,
            )
        )
    );

    // $wp_customize->add_setting( 'alps_servies_public_course', array(
    //     'sanitize_callback' => 'alps_sanitize_repeater',
    //     'default' => json_encode(
    //         array(
    //             array('text' => 'Bla bla bla', 'title' => 'title', 'subtitle' => 'subtitle' )
    //         )
    //     ),
    //     'panel' => 'alps_front_page_panel'
    // ));
    // $wp_customize->add_control( new General_Customizer_Control( $wp_customize, 'alps_about_page_second_repeatable', 'SERVICES', array(
    //     'label'   => esc_html__( 'Add new','alps' ),
    //     'section' => 'alps_services_section',

    // )));






    /**
    * Contact Panel
    **/
    $wp_customize->add_panel('alps_contact_panel', array(
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Contact Section', 'alps')
    ));
    /**
    * Phone Number
    **/
    $wp_customize->add_section('alps_phone_number_section', array(
        'title' => esc_html__('Phone Number', 'alps'),
        'panel' => 'alps_contact_panel',
    ));
    $wp_customize->add_setting( 'alps_phone_number', array (
        'sanitize_callback' => 'alps_sanitize_input',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control( 'alps_phone_number', array (
        'label' => esc_html__( 'Phone Number', 'alps' ),
        'section' => 'alps_phone_number_section',
    ));
    /**
    * Globe Number
    **/
    $wp_customize->add_setting( 'alps_mobile_number', array (
        'sanitize_callback' => 'alps_sanitize_input',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control( 'alps_mobile_number', array (
        'label' => esc_html__( 'Mobile Number', 'alps' ),
        'section' => 'alps_phone_number_section',
    ));

    /**
    * Social Media Links with Icon Picker
    **/
    $wp_customize->add_section( 'alps_social_media_link_section' , array(
        'title' => esc_html__( 'Social Media Link', 'alps' ),
        'panel' => 'alps_contact_panel',
    ));
    $wp_customize->add_setting( 'alps_social_media_icons', array(
        'sanitize_callback' => 'alps_sanitize_repeater',
        'default' => json_encode(
            array(
                array( 'icon_value' => 'fa fa-facebook' , 'link' => '#' )
            )
        ),
    ));
    $wp_customize->add_control( new General_Customizer_Control( $wp_customize, 'alps_social_media_icons', 'SOCIAL LINK',array(
        'label'   => esc_html__( 'Add new social icon','alps' ),
        'section' => 'alps_social_media_link_section',
        'customizer_image_control' => false,
        'customizer_icon_control' => true,
        'customizer_text_control' => false,
        'customizer_link_control' => true,
    )));
    /**
    * Email Address
    **/
     $wp_customize->add_section('alps_email_address_section', array(
        'title' => esc_html__('Email Address', 'alps'),
        'panel' => 'alps_contact_panel',
    ));
    $wp_customize->add_setting( 'alps_email_address', array (
        'sanitize_callback' => 'alps_sanitize_input',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control( 'alps_email_address', array (
        'label' => esc_html__( 'Email Address', 'alps' ),
        'section' => 'alps_email_address_section',
		'type' => 'email'
    ));
    /**
    * Office Address
    **/
    $wp_customize->add_section('alps_office_address_section', array(
			 'title' => esc_html__('Office Address', 'alps'),
			 'panel' => 'alps_contact_panel',
	 ));
	 $wp_customize->add_setting( 'alps_office_address', array (
			 'sanitize_callback' => 'alps_sanitize_input',
			 'transport' => 'postMessage'
	 ));
	 $wp_customize->add_control( 'alps_office_address', array (
		 	 'type' => 'textarea',
			 'label' => esc_html__( 'Office Address', 'alps' ),
			 'section' => 'alps_office_address_section',
	 ));
     /**
     * Map Image
     **/
	 $wp_customize->add_section('alps_map_section', array(
			'title' => esc_html__('Map', 'alps'),
			'panel' => 'alps_contact_panel',
     ));
	 $wp_customize->add_setting( 'alps_map', array (
			'sanitize_callback' => 'alps_sanitize_input',
			'transport' => 'postMessage'
	 ));
	 $wp_customize->add_control(
	       new WP_Customize_Image_Control(
	           $wp_customize,
	           'logo',
	           array(
	               'label'      => __( 'Upload a Map', 'alps' ),
	               'section'    => 'alps_map_section',
	               'settings'   => 'alps_map',
	               'context'    => 'Upload a Map'
	           )
	       )
	   );
     $wp_customize->add_panel('alps_color_panel', array(
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => esc_html__( 'Color Panel', 'alps')
     ));
     /**
     * Banner Color Section
     **/
     $wp_customize->add_section('alps_color_section', array(
            'title' => esc_html__('Primary color', 'alps'),
            'panel' => 'alps_color_panel'
     ));
     $wp_customize->add_setting( 'alps_color', array (
            'sanitize_callback' => 'alps_sanitize_input',
            'transport' => 'postMessage'
     ));
     $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'link_color',
            array(
                'label'      => __( 'Color (Card banner fallback color)', 'alps' ),
                'section'    => 'alps_color_section',
                'settings'   => 'alps_color',
            )
         )
      );


    /**
    * Form reCAPTCHA key and feedback messages
    **/
    $wp_customize->add_panel('alps_form_panel', array(
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Form(reCAPTCHAa Key and Feedback)', 'alps')
    ));
    $wp_customize->add_section( 'alps_form_recaptcha_section' , array(
        'title' => esc_html__( 'reCAPTCHA', 'alps' ),
        'panel' => 'alps_form_panel',
    ));
    $wp_customize->add_setting( 'alps_form_recaptcha', array(
        'sanitize_callback' => 'alps_sanitize_input',
        'transport' => 'postMessage'
    ) );
    $wp_customize->add_control( 'alps_form_recaptcha', array(
        'label' => __( 'reCAPTCHA Site key' ),
        'description' => __( 'Paste it here.' ),
        'section' => 'alps_form_recaptcha_section',
    ));

    $wp_customize->add_section( 'alps_form_feedback_section' , array(
        'title' => esc_html__( 'Form Feedback Message', 'alps' ),
        'panel' => 'alps_form_panel',
    ));

    $form_types = array(
            array(
                'type' => 'contact',
                'label' => 'Contact Form'
            ),
            array(
                'type' => 'inquire',
                'label' => 'Inquiry Form'
            ),
            array(
                'type' => 'registration',
                'label' => 'Registration Form'
            )
        );

    foreach($form_types as $type) {
        $wp_customize->add_setting( 'alps_form_'.$type['type'].'_success', array(
            'sanitize_callback' => 'alps_sanitize_input',
            'transport' => 'postMessage'
        ) );
        $wp_customize->add_control( 'alps_form_'.$type['type'].'_success', array(
            'type' => 'textarea',
            'label' => __( $type['label'] ),
            'description' => __( 'Success! %TEXT HERE%' ),
            'section' => 'alps_form_feedback_section',
        ));
    }
    

}
add_action( 'customize_register', 'alps_customize_register' );




/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function alps_customize_preview_js() {
    wp_enqueue_script( 'customizer', get_template_directory_uri() . '/js/admin-customizer.js', array( 'customize-preview' ),
        '20151215', true );
}
add_action( 'customize_preview_init', 'alps_customize_preview_js' );



function alps_sanitize_input( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
/**
 * Sanitize repeater
 *
 * @param string $input Json to sanitize.
 */
function alps_sanitize_repeater( $input ) {

    $input_decoded = json_decode( $input, true );
    $allowed_html = array(
        'br' => array(),
        'em' => array(),
        'strong' => array(),
        'a' => array(
            'href' => array(),
            'class' => array(),
            'id' => array(),
            'target' => array(),
        ),
        'button' => array(
            'class' => array(),
            'id' => array(),
        ),
        'ul' => array(
            'class' => array(),
            'id' => array(),
            'style' => array(),
        ),
        'li' => array(
            'class' => array(),
            'id' => array(),
            'style' => array(),
        ),
    );

    if ( ! empty( $input_decoded ) ) {
        foreach ( $input_decoded as $boxk => $box ) {
            foreach ( $box as $key => $value ) {
                if ( $key == 'text' ) {
                    $value = html_entity_decode( $value );
                    $input_decoded[ $boxk ][ $key ] = wp_kses( $value, $allowed_html );
                } else {
                    $input_decoded[ $boxk ][ $key ] = wp_kses_post( force_balance_tags( $value ) );
                }
            }
        }

        return json_encode( $input_decoded );
    }

    return $input;
}
