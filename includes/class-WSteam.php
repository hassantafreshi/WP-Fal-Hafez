<?php
/** Prevent this file from being accessed directly */
if (!defined('ABSPATH')) {
    die("Direct access of plugin files is not allowed.");
}

/**
 * Class WSteam
 */
class WSteam {
    public $plugin_path = "";

    public $plugin_url = "";

    /**
     * WSteam constructor.
     */
    public function __construct() {
        $this->plugin_path = WSteam_PLUGIN_DIRECTORY;
        $this->plugin_url  = WSteam_PLUGIN_URL;

        $this->includes();
        $this->init_hooks();
    }

    /**
     * Initial plugin setup.
     */
    private function init_hooks(): void {
        register_activation_hook(
            WSteam_PLUGIN_FILE,
            ['\WSteam\Install', 'install']
        );

        add_action('init', [$this, 'load_textdomain']);
    }

    /**
     * Load plugin textdomain.
     */
    public function load_textdomain(): void {
       
        load_plugin_textdomain(
            WSteam_PLUGIN_TEXTDOMAIN,
            false,
            WSteam_PLUGIN_DIRECTORY . "/languages"
        );
    }

    /**
     * Includes classes and functions.
     */
    public function includes(): void {
        require_once $this->plugin_path . 'includes/class-WSteam-install.php';

        if (is_admin()) {
            require_once $this->plugin_path . 'includes/admin/class-WSteam-admin.php';
         //   require_once $this->plugin_path . 'includes/admin/class-WSteam-create.php';
        }
        else {
            require_once $this->plugin_path . 'includes/class-WSteam-public.php';
        }

        require_once $this->plugin_path . 'includes/class-WSteam-public.php';
    }
}
