<?php

add_action( 'wp_enqueue_scripts', function() {
    $style_path = '/css/styles.css'; // Ruta relativa a la hoja de estilos dentro del plugin
    wp_enqueue_style(
        pluginSlug, 
        plugins_url( $style_path, __FILE__ ), // Usar __FILE__ para obtener la URL del archivo correctamente
        array(), // Dependencias, si las hay
        filemtime( plugin_dir_path( __FILE__ ) . $style_path ) // Versión basada en la última modificación del archivo
    );
} );
