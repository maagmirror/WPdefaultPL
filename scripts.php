<?php

add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_script(
		'ch-verify',
		plugins_url( '/js/script.js', __DIR__ . '..' )
	);
} );
