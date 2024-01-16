<?php

class CH_Install
{

    public function __construct()
    {
        $this->hook();
    }

    public function hook()
    {
        register_activation_hook(
            CG_PLUGIN_FILE,
            [$this, 'handle_activate']
        );
    }

    public function handle_activate()
    {
        $this->init_db();
    }

    public function init_db()
    {
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
        } else {
            // Table created successfully, now insert default values
            $default_user = 'default_user';
            $default_pass = 'default_pass';

            $wpdb->insert(
                $table_name,
                array(
                    'active' => 1,
                    'user' => $default_user,
                    'pass' => $default_pass,
                )
            );

            if ($wpdb->last_error) {
                // Handle the insert error, for example:
                error_log("Insert error: " . $wpdb->last_error);
            } else {
                // Default entry inserted successfully
            }
        }
    }

}

new CH_Install();
