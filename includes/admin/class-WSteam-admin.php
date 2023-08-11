<?php

namespace WSteam;

/**
 * Class Admin
 *
 * @package WSteam
 */
class Admin {

    public function __construct() {
        
        $this->init_hooks();
    }

    /**
     * Initial plugin
     */
    private function init_hooks() {
        // Check exists require function
        if (!function_exists('wp_get_current_user')) {
            include(ABSPATH . "wp-includes/pluggable.php");
           
        }
        
        include(WSteam_PLUGIN_DIRECTORY."includes/functions.php");
        

        // Add plugin caps to admin role
        if (is_admin() and is_super_admin()) {
            $this->add_cap();
        }

        // Actions.
       // add_action('admin_enqueue_scripts', [$this, 'admin_assets']);
        add_action('admin_menu', [$this, 'admin_menu']);
    

        if (is_admin()) {
            // برای نوشتن انواع اکشن مربوط به حذف و اضافه اینجا انجام شود

            if (!function_exists('get_plugin_data')) {
                require_once(ABSPATH . 'wp-admin/includes/plugin.php');
            }


        }

     
    }

    /**
     * Adding new capability in the plugin
     */
    public function add_cap() {
        // Get administrator role
        $role = get_role('administrator');
        $role->add_cap('hafez-wsteam');
        $role->add_cap('WSteam_panel');

    }

   /*  public function admin_assets($hook) {
        global $current_screen;


    
    } */

    /**
     * Register admin menu
     */
    public function admin_menu() {
        $noti_count = false;
        $icon       = WSteam_PLUGIN_URL . '/includes/admin/assets/image/logo-20px.png';


      //  add_menu_page(__('Panel', 'hafez-wsteam'),__('Panel', 'hafez-wsteam'), 'hafez-wsteam', '', '');
        add_menu_page(
            __('Fal Hafez', 'hafez-wsteam'),
            __('Fal Hafez', 'hafez-wsteam'),
            
            'hafez-wsteam',
            'hafez-wsteam',
            '',
            '' . $icon . ''
        ); 
        add_submenu_page('hafez-wsteam', __('Fal Hafez', 'hafez-wsteam'), __('Fal Hafez', 'hafez-wsteam'), 'hafez-wsteam', 'hafez-wsteam', [$this, 'panel_callback']);
        //

    }

    /**
     * Callback outbox page.
     */
    public function panel_callback() {
        include_once WSteam_PLUGIN_DIRECTORY . "/includes/admin/class-WSteam-panel.php";
        $list_table = new Panel_edit();

    }

}

new Admin();


