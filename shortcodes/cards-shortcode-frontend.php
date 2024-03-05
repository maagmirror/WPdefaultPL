<?php

add_shortcode( 
    'default_shortcode', 
    function( $atts ) {

        ob_start();
        #esto es si queres traer lo que se va a imprimir de otro lado, el shortcode lo usas con [ch_cards]
        //require plugin_dir_path( __FILE__ ) . '/../template-parts/frontend/cardsasd.php';

        echo 'helloww wooorld';
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    } 
);
