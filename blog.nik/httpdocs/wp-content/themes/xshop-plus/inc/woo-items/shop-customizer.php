<?php
/**
 * XShop Plus woocommerce Customizer
 *
 * @package XShop Plus
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function xshop_plus_shop_customize_register( $wp_customize ) {

	//xshop blog settings
    $wp_customize->add_section('xshop_plus_woo', array(
		'title' => __('XShop Plus Shop Settings', 'xshop-plus'),
		'capability'     => 'edit_theme_options',
		'description'     => __('XShop Plus theme shop settings', 'xshop-plus'),
		'panel'    => 'xshop_plus_settings',
	
	));
	$wp_customize->add_setting('xshop_plus_woo_container', array(
        'default'        => 'container',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'xshop_plus_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('xshop_plus_woo_container', array(
        'label'      => __('Shop Container Type', 'xshop-plus'),
        'description'=> __('You can set standard container or full width container for shop page. ', 'xshop-plus'),
        'section'    => 'xshop_plus_woo',
        'settings'   => 'xshop_plus_woo_container',
        'type'       => 'select',
        'choices'    => array(
            'container' => __('Standard Container', 'xshop-plus'),
            'container-fluid' => __('Full width Container', 'xshop-plus'),
        ),
    ));
    $wp_customize->add_setting('xshop_plus_woo_layout', array(
        'default'        => 'rightside',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'xshop_plus_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('xshop_plus_woo_layout', array(
        'label'      => __('Select Shop Layout', 'xshop-plus'),
        'description'=> __('Right and Left sidebar only show when sidebar widget is available. ', 'xshop-plus'),
        'section'    => 'xshop_plus_woo',
        'settings'   => 'xshop_plus_woo_layout',
        'type'       => 'select',
        'choices'    => array(
            'rightside' => __('Right Sidebar', 'xshop-plus'),
            'leftside' => __('Left Sidebar', 'xshop-plus'),
            'fullwidth' => __('No Sidebar', 'xshop-plus'),
        ),
    ));
	
	
}
add_action( 'customize_register', 'xshop_plus_shop_customize_register' );
