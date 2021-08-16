<?php
/*
	Plugin Name: Cartrawler Search Engine in Sidebar
	Description: Show the Cartrawler Search Engine in Sidebar.
	Version: 0.1
	Author: Joaquín Ronda
	License: GPL2
*/

/*  Copyright 2014 Joaquín Ronda  (email : ximo@imediastudio.es)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class SearchEngineSidebarCartrawler_Widget extends WP_Widget {

	/** constructor */
	function __construct() {
		parent::__construct('search_engine_sidebar_cartrawle_Widget', __( 'Cartrawler Search Engine', 'searchenginesidebarcartrawler'), array( 'description' => __( 'Show the Cartrawler Search Engine in Sidebar.', 'searchenginesidebarcartrawler')));
	}

	/** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
		$instance = $old_instance;
		$instance['clientID'] = $new_instance['clientID'];
		$instance['lang'] = $new_instance['lang'];
		$instance['urlresults'] = $new_instance['urlresults'];
		$instance['proxyURL'] = $new_instance['proxyURL'];
	    return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {			
        $clientID = $instance['clientID'];
        $lang = $instance['lang'];
        $urlresults = $instance['urlresults'];
        $proxyURL = $instance['proxyURL'];
        ?>
        	<p>
	        	<label for="<?php echo $this->get_field_id('clientID'); ?>"><?php _e('Client ID:', 'searchenginesidebarcartrawler'); ?></label>
	            <input class="widefat" id="<?php echo $this->get_field_id('clientID'); ?>" name="<?php echo $this->get_field_name('clientID'); ?>" type="text" value="<?php echo $clientID; ?>" />
	        </p>
        	<p>
	        	<label for="<?php echo $this->get_field_id('lang'); ?>"><?php _e('Lang:', 'searchenginesidebarcartrawler'); ?></label>
	            <input class="widefat" id="<?php echo $this->get_field_id('lang'); ?>" name="<?php echo $this->get_field_name('lang'); ?>" type="text" value="<?php echo $lang; ?>" />
	        </p>
	        <p>
	        	<label for="<?php echo $this->get_field_id('urlresults'); ?>"><?php _e('URL results:', 'searchenginesidebarcartrawler'); ?></label>
	            <input class="widefat" id="<?php echo $this->get_field_id('urlresults'); ?>" name="<?php echo $this->get_field_name('urlresults'); ?>" type="text" value="<?php echo $urlresults; ?>" />
	        </p>
	        <p>
	        	<label for="<?php echo $this->get_field_id('proxyURL'); ?>"><?php _e('Proxy URL:', 'searchenginesidebarcartrawler'); ?></label>
	            <input class="widefat" id="<?php echo $this->get_field_id('proxyURL'); ?>" name="<?php echo $this->get_field_name('proxyURL'); ?>" type="text" value="<?php echo $proxyURL; ?>" />
	        </p>
        <?php 
    }

    /** @see WP_Widget::widget */
	function widget($args, $instance) {
		extract( $args );
		$clientID = $instance['clientID'];
		$lang = $instance['lang'];
		$urlresults = $instance['urlresults'];
		$proxyURL = $instance['proxyURL'];
		// Opening of widget
		echo $before_widget;
		?>
		<div id="sec">
			<div class="sec-wrapper">
				<div id="sec">
				<!--<div id="abe_ABE">
					<noscript>YOUR BROWSER DOES NOT SUPPORT JAVASCRIPT</noscript>
				</div>-->
				<div ct-app><noscript>YOUR BROWSER DOES NOT SUPPORT JAVASCRIPT</noscript></div>					
				<script type="text/javascript">
						<!--
						var CT = {
							ABE: {
								Settings: {
									//proxyURL: '/otaproxy.php',
									clientID: '545295',
									//clientID: '555545',
									currency: 'EUR',
									language: 'ES',
									theme: {
                        						primary: '#067FCC', // e.g #0000FF
      											secondary: '#689A19', // e.g #FF0000
      											complimentary: '#067FCC' // e.g #000000
                						},
									step1: {
										legacy:false,
										deeplinkURL: 'https://quarentacars.com/search-results-es/'
									}
								}
							}
						};
						// -->

					</script>
					<script>
						var url = window.location.href;
						let str = url.split("/")
						console.log(str[3]);
						if(str[3]=="en"){
							CT.ABE.Settings.language= 'EN';
							CT.ABE.Settings.step1.deeplinkURL= 'https://quarentacars.com/en/search-results-en/';
						}else{
							CT.ABE.Settings.language= 'ES';
							CT.ABE.Settings.step1.deeplinkURL= 'https://quarentacars.com/search-results-es/';
						}
					</script>
					<script type="text/javascript">
						var isMobile=false;
						(function(a){
							if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))isMobile=true
						})(navigator.userAgent||navigator.vendor||window.opera);
						if(isMobile==true){
							CT.ABE.Settings.type= 'mobile';
						}
					
		
					</script>

					<script type="text/javascript">
						(function() {
							CT.ABE.Settings.version = '5.0';
							var cts = document.createElement('script'); cts.type = 'text/javascript'; cts.async = true;
							cts.src = '//ajaxgeo.cartrawler.com/abe' + CT.ABE.Settings.version + '/ct_loader.js?' + new Date().getTime();
							var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(cts, s);
						})();
					</script>
				</div>
			</div>
		</div>
		<?php
		// Closing of widget
		echo $after_widget;
	}
}

function searchenginesidebarcartrawler_loadTranslations() {
	load_plugin_textdomain('searchenginesidebarcartrawler', false, dirname(plugin_basename(__FILE__)).'/languages');
}

add_action('plugins_loaded', 'searchenginesidebarcartrawler_loadTranslations');

function searchenginesidebarcartrawler_register_widgets() {
	register_widget( 'SearchEngineSidebarCartrawler_Widget' );
}

add_action( 'widgets_init', 'searchenginesidebarcartrawler_register_widgets' );

function searchenginesidebarcartrawler_scripts_styles() {
	wp_enqueue_style('searchenginesidebarcartrawler-style', plugins_url('/css/styles.css', __FILE__ ), array(), null );	
}

add_action( 'wp_enqueue_scripts', 'searchenginesidebarcartrawler_scripts_styles' );
