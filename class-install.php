<?php

class CH_Install {
    
    public function __construct() {
        $this->hook();
    }

    protected function hook() {
        register_activation_hook( 
            CG_PLUGIN_FILE,
            [ $this, 'handle_activate' ]
        );
    }

    public function handle_activate() {
        $this->init_db();
    }

    protected function init_db() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = 'ch_cards';

        $sql = "CREATE TABLE $table_name (
            id int AUTO_INCREMENT PRIMARY KEY,
            active boolean NOT NULL DEFAULT 1,
            cardname text NOT NULL
        ) $charset_collate;";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        dbDelta($sql);
    }
}

new CH_Install();