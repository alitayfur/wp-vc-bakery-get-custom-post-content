<?php
if (!function_exists('get_vc_custom_post')) {
    function get_vc_custom_post($ID) {
        $VCPOST = get_post($ID);
        $shortcodes_custom_css = get_metadata( 'post', $VCPOST->ID, '_wpb_shortcodes_custom_css', true );
        if ( ! empty( $shortcodes_custom_css ) ) {
            $shortcodes_custom_css = wp_strip_all_tags( $shortcodes_custom_css );
            $key = 'js_composer_front_'.$VCPOST->ID;
            wp_register_style( $key, false );
            wp_enqueue_style( $key );
            wp_add_inline_style( $key, $shortcodes_custom_css );
        }
        return apply_filters('the_content',$VCPOST->post_content);

    }
}