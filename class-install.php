<?php

class CH_Install {
    
    public function __construct() {
        $this->hook();
    }

    public function hook() {
        register_activation_hook( 
            CG_PLUGIN_FILE,
            [ $this, 'handle_activate' ]
        );
    }

    public function handle_activate() {
        $this->init_db();
    }

    public function init_db() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = 'nibiru_service';
    
        $sql = "CREATE TABLE $table_name (
            id int AUTO_INCREMENT PRIMARY KEY,
            active boolean NOT NULL DEFAULT 1,
            user text NOT NULL,
            pass text NOT NULL
        ) $charset_collate";
    
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    
        $result = dbDelta($sql);
    
        if ($wpdb->last_error) {
            // Handle the error, for example:
            error_log("Database error: " . $wpdb->last_error);
        }
    }
    
}

new CH_Install();
