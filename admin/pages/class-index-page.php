<?php

require_once plugin_dir_path( __FILE__ ) . 'class-pages.php';

class CH_Admin_Page_Default extends CH_Admin_Page {

    protected $title = pluginTitle;
    protected $slug =  pluginSlug;
    protected $icon = pluginIcon;
    protected $position = 2;

    public function render() {
        $this->render_part('frontend/form.php');
    }
}
