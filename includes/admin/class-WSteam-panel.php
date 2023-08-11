<?php

namespace WSteam;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly


class Panel_edit  {

	public $nounce;
	protected $db;
	public function __construct() {
		
		$icon       = WSteam_PLUGIN_URL . '/includes/admin/assets/image/logo.png';
		$words =  __(" To use Hafez's horoscope Create a page called \"Hafez Horoscope Display\" and put the short code <b>[Hafez_random]</b> in it. After this, create a page called Hafiz horoscope and give a link to the Hafez horoscope screen." , 'hafez-wsteam');
		$createdby =  __("Created by Yerib.com" , 'hafez-wsteam');
		/* 
		

		*/
		if ( is_admin() ) {
			
			echo '<div class="text-center"> 
			<style>
			.center {
			  display: block;
			  margin-left: auto;
			  margin-right: auto;
			  /* width: 50%; */
			}
			.text-content {
				text-align: center;
			  }
			</style>
     
	  <br><br><br>
	  <img src="'.$icon .'"  class="center" width="200px">
	<br>
	<br>
	<p class="text-content">
	'.$words.'
	<br><br>
	 <a href="https://yerib.com/" class="event-title" target="_blank">'.$createdby.'</a>
	  </p>	
	  <!-- created by H.T -->
				</div>';
					
		}else{
			echo "Hafez Fal: You dont access this section";
		}
	}






}