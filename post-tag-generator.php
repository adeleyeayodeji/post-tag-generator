<?php
/*
Plugin Name: Post Tag Generator
Plugin URI: https://wordpress.org/plugins/post-tag-generator/
Version: 1.05
Description: A cool plugin that generate post tags directly from google keywords.
Author: Adeleye Ayodeji
Author URI: http://adeleyeayodeji.com/
Text Domain: post-tag-generator
Domain Path: /languages
*/

/*  Copyright (c) 2019 by Adeleye Ayodeji (https://adeleyeayodeji.com/)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/
if ( ! defined( 'ABSPATH' ) ) exit; 


class posttagcode {
 
    /*--------------------------------------------*
     * Constructor
     *--------------------------------------------*/
 
    /**
     * Initializes the plugin by setting localization, filters, and administration functions.
     */
    function __construct() {
    
     
        // Register hooks that are fired when the plugin is activated, deactivated, and uninstalled, respectively.
        register_activation_hook( __FILE__, array( $this, 'activate' ) );
        register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );
        register_uninstall_hook( __FILE__, 'uninstall_removedata');   


  //Loading custom script for the plugin
function post_tag_generator_style_me(){
    //Loading my personal styles
      wp_enqueue_style( 'tag-css', plugin_dir_url( __FILE__ ).'css/tag.css' );
      wp_enqueue_style( 'tag2-css', plugin_dir_url( __FILE__ ).'css/loader.css' );
      wp_enqueue_script( 'corejs', plugin_dir_url( __FILE__ ).'js/core-js.js' );
      wp_localize_script('corejs', 'corejs', array('pluginsUrl' => plugin_dir_url( __FILE__ )));
        
  }

function post_tag_generator_action() {
  ?>
  <!-- Container holding all package -->
   <div class="allposttag">
  <h2 class="posttagh2"><span>Post Tag Generator</span><br><small>Developed by <a href="https://adeleyeayodeji.com" target="_blank">Adeleye Ayodeji</a></small>
  </h2>
  <!-- form keyword -->
<form class="tagform">
 <center><input autocomplete="off" onkeydown="return event.key != 'Enter';" type="text" class="tagkey" id="mainme" placeholder="Enter your keyword" /><p class="button button-primary button" onclick="showHint(document.getElementById('mainme').value)">Go</p></center>
</form>
<!-- Container holding result-->
    <div id="txtHint"><center><small class="tagoutputt">Your Result HERE</small></center></div>
        <center>
          <!-- Container holding loading spinner-->
          <div  id="loader" class="lds-css ng-scope">
              <div class="lds-spin"><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div></div>
          </div>
        </center>
</div>
  <?php
}


// Should come after the visual editor
  add_action( 'submitpost_box', 'post_tag_generator_action');
 // Action for the above functions
  add_action('admin_enqueue_scripts', 'post_tag_generator_style_me');
 
  //Thanks for using my plugin, Happy coding *wink*

    } // end constructor
 
 
    public function activate( $network_wide ) {   
    } // end activate
 
    public function deactivate( $network_wide ) {     
    } // end deactivate
    
    public function uninstall( $network_wide ) {
    } // end uninstall
 
 
    /*--------------------------------------------*
     * Core Functions
     *---------------------------------------------*/


 
} // end class
 
$plugin_name = new posttagcode();