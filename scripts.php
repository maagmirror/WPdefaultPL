<?php

add_action( 'wp_enqueue_scripts', function() {
    $script_path = '/js/script.js'; // Ruta relativa al archivo dentro del plugin
    wp_enqueue_script(
        pluginSlug,
        plugins_url( $script_path, __FILE__ ), // __FILE__ apunta al archivo actual
        array(), // Dependencias, si las hay, como array('jquery')
        filemtime( plugin_dir_path( __FILE__ ) . $script_path ) // Versión basada en la última modificación del archivo
    );
} );
