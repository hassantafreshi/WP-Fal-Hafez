<?php

namespace WSteam;

/**
 * Class _Public
 * @package WSteam
 */
require_once('functions.php');

class _Public {
	/**
	 * _Public constructor.
	 */
	
	//public $plugin_url;
	public $value;
	public $id;
	public $ip;
	public $name;
	protected $db;
	//private $wpdb;
	
	public function __construct() {


		global $wpdb;
		$this->db = $wpdb;
		add_shortcode('Hafez_random', array( $this,'hafez_random_fun'));
		
		
		add_shortcode('Hafez_poem', array( $this,'hafez_poem_fun'));
		
	}


	public function hide_toolmenu(){
		// this function hide admin bar in bublic side for subscribers user
		if(is_user_logged_in()){
			$user = wp_get_current_user();
			if ( in_array( 'subscriber', (array) $user->roles ) ) {
					//hide admin bar in public pages
					show_admin_bar( false );
			}
		}
	}

	public function hafez_random_fun(){
		$table_name = $this->db->prefix . "hafez_";
		$this->value = $this->db->get_results( "SELECT * FROM `$table_name` ORDER BY RAND() LIMIT 1" );
		$content = $this->value[0]->content;
		//$content = $this->value[0]->content;
		//$content=str_replace('"', '\"', $this->value[0]->content);
		/* error_log(gettype($content));
		error_log($content); */
		error_log($this->value[0]->content);
		/* $content ="<!-- start hafez --!>";
		$content += '<div class="">'.$this->value[0]->content . '</div></br>';
		$content +="<!-- start hafez --!>"; */
		return $content;

	}
	public function hafez_poem_fun($id){
		//error_log(js);
		$table_name = $this->db->prefix . "hafez_";
		$id_= end($id);
		$this->value = $this->db->get_results( "SELECT * FROM `$table_name` where omen_id = $id_" );
		$content = $this->value[0]->content;
		//$content = $this->value[0]->content;
		//$content=str_replace('"', '\"', $this->value[0]->content);
		/* error_log(gettype($content));
		error_log($content); */
	
		/* $content ="<!-- start hafez --!>";
		$content += '<div class="">'.$this->value[0]->content . '</div></br>';
		$content +="<!-- start hafez --!>"; */
		return $content;

	}
}

new _Public();