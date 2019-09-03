<?php
	require_once( explode( "wp-content" , __FILE__ )[0] . "wp-load.php" );

	if ( ! defined( 'ABSPATH' ) ) exit; 
	
	
	//Displayin error reporting 
	if ( ! WP_DEBUG || ( WP_DEBUG && ! WP_DEBUG_DISPLAY ) ) {
				@ini_set( 'display_errors', 'Off' ); // Turn off display_errors
	}else{
		@ini_set('display_errors', 'On'); // Turn on display_error
	}
	?>
		<ul>
	<?php
	//If user enter wrong keyword or network error   
	$errormessage = "<p class='errormessages'>Network Error, <span class='more'>Try Again</span></p>";
	$keyword = sanitize_text_field($_GET['keyword']);       
				$xml = simplexml_load_file(utf8_encode("http://suggestqueries.google.com/complete/search?output=toolbar&hl=en&q=$keyword"),'SimpleXMLElement',LIBXML_COMPACT) or die("".$errormessage."");            
				foreach ($xml->children() as $child) {                               
					foreach ($child->suggestion->attributes() as $dta) {
					  ?> 
					  	<li id="postagli" title="Add to tag">
						  <p class="tagmeh" onclick="document.getElementById('new-tag-post_tag').value += this.innerHTML;document.getElementById('postagli').parentNode.removeChild(document.getElementById('postagli'));"><?php echo esc_html($dta); ?>,</p>
						 </li>
					  
							 
	<?php
                                    
	 				}            
				}                    
			   
		
   ?>
   </ul>