<?php

add_shortcode( 
    'ch_cards', 
    function( $atts ) {

        ob_start();
        #esto es si queres traer lo que se va a imprimir de otro lado, el shortcode lo usas con [ch_cards]
        //require plugin_dir_path( __FILE__ ) . '/../template-parts/frontend/cardsasd.php';

        echo 'esto funka';
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    } 
);