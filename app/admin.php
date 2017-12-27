<?php

namespace App;

/**
 * Theme customizer
 *
 * "add_section"
 * represent the navigation within the Customizer. You should already see four of them:
 * Site Identity, Menus, Static Front Page and Additional CSS.
 * By defining a section we can create a new entry within the
 * navigation and fill it up with controls.
 *
 * "add_control"
 * are the visual elements – the user interface – that allow us
 * to manipulate settings. These may be input fields,
 * text areas, color selectors and other types of controls
 * that serve to create a better user experience.
 *
 * "add_settings"
 * represent the data that we want our theme to accept and use.
 * We create controls to allow users to manipulate settings easily.
 *
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {

  // Add postMessage support
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
  $wp_customize->selective_refresh->add_partial('blogname', [
    'selector' => '.brand',
    'render_callback' => function () {
        bloginfo('name');
    }
  ]);

});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
  wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});
