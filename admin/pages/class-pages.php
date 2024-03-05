<?php

abstract class CH_Admin_Page
{

    protected $parent = null;
    protected $title = null;
    protected $privileges = 'administrator';
    protected $slug = null;
    protected $icon = null;
    protected $position = null;

    public function __construct()
    {
        $this->hook();
    }

    protected function hook()
    {
        add_action('admin_menu', [$this, 'add_to_menu']);
    }

    public function add_to_menu()
    {
        if (!!$this->parent) {
            add_submenu_page(
                $this->parent,
                $this->title,
                $this->title,
                $this->privileges,
                $this->slug,
                [$this, 'render']
            );
        } else {
            add_menu_page(
                $this->title,
                $this->title,
                $this->privileges,
                $this->slug,
                [$this, 'render'],
                $this->icon,
                $this->position
            );
        }
    }

    public abstract function render();

    protected final function render_part($path)
    {
        require plugin_dir_path(__FILE__) . $path;
    }

}
