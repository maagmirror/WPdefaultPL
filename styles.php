<?php

add_action( 'wp_enqueue_scripts',  function() {
    wp_enqueue_style(
        'ch-styles', 
        plugins_url( '/css/styles.css', __DIR__ . '..' )
    );
} );