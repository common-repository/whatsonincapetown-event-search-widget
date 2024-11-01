<?php

/*
Plugin Name: Mc Lennan Design & Development WOICT Event Search by date Widget
Plugin URI: http://www.mc-lennan.com
Description: This plugin will search for events on the WhatsOnInCapetown Site.
Author: Philip Mc Lennan
Version: 1.0
Author URI: http://www.mc-lennan.com
*/


class WOICT_Event_Search extends WP_Widget {
	


  function WOICT_Event_Search() {
     /* Widget settings. */
    $widget_ops = array(
      'classname' => 'searchpost',
      'description' => 'This plugin will search for events on the WhatsOnInCapetown Site.');

     /* Widget control settings. */
    $control_ops = array(
       'width' => 250,
       'height' => 250,
       'id_base' => 'searchpost-widget');

    /* Create the widget. */
   $this->WP_Widget('searchpost-widget', 'WOICT Event Date Search', $widget_ops, $control_ops );
  }

  function form ($instance) {
	  
	  
	
    /* Set up some default widget settings. */
    $defaults = array('numberposts' => '5','catid'=>'1','title'=>'','rss'=>'');
    $instance = wp_parse_args( (array) $instance, $defaults ); ?>
		

<p>
    <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
    <input type="text" name="<?php echo $this->get_field_name('title') ?>" id="<?php echo $this->get_field_id('title') ?> " value="<?php echo $instance['title'] ?>" size="20">
  </p>

 

  <?php
}

function update ($new_instance, $old_instance) {
  $instance = $old_instance;
  $instance['title'] = $new_instance['title'];


  return $instance;
}

function widget ($args,$instance) {
   extract($args);
   
   	$title = $instance['title'];
	
  	echo $before_title.$title.$after_title;
  
	
	
   
  ?>
    
 <div style="padding:10px;">
  <form id="frm1" action="http://www.whatsonincapetown.com/event-search-results/" method="post"  name="frm1" target="_blank" >
      
 <span style="font-size:12px; margin-bottom:2px;">Start Date</span><br />
  <input type="text" name="event_start" id="event_start" value="<?php echo date('d/m/Y') ;?>"/>
      <script type="text/javascript">
	  //jQuery(document).ready(function($) {
//			$('.event_start').datepicker({
//				dateFormat : 'yy-mm-dd'
//		});
//		});	  
      // <![CDATA[       
        var opts = {     
                // Attach input with an id of "dp-1" and give it a "d-sl-m-sl-Y" date format (e.g. 13/03/1990)                        
                formElements:{"event_start":"d-sl-m-sl-Y"}               
        };        
        datePickerController.createDatePicker(opts);
      // ]]>
         </script>
         <br /><br />
         
      <span style="font-size:12px; margin-top:5px;margin-bottom:2px;">End Date</span><br />
     <input type="text" name="event_end" id="event_end" value="<?php echo date('d/m/Y') ;?>"/>
         <script type="text/javascript">
      // <![CDATA[       
        var opts = {     
                // Attach input with an id of "dp-1" and give it a "d-sl-m-sl-Y" date format (e.g. 13/03/1990)                        
                formElements:{"event_end":"d-sl-m-sl-Y"}                  
        };        
        datePickerController.createDatePicker(opts);
      // ]]>
         </script>
     <br>
<input type="submit" id="categorysubmit" value="Go" style="margin-top:5px; margin-bottom:5px; background-color:#060; color:#FFF;" />

<br>
<span style="font-size:10px; margin-top:2px;margin-bottom:2px;">Powered by Whatsonincapetown.com</span>
</td>
 
         
  </form>
</div>
 <?PHP	



 }
}
//add_action('wp_enqueue_scripts', 'load_my_scripts');

function phil_load_widgets() {
  register_widget('WOICT_Event_Search');
}

add_action('widgets_init', 'phil_load_widgets');

add_action( 'widgets_init', function(){
    set_date_pickers();
	//load_my_scripts();
});


function set_date_pickers() {
		

	$plugindir = plugins_url(dirname(plugin_basename(__FILE__)));
	
	
	wp_enqueue_style( 'my-style',  $plugindir . '/js/datepicker.css', false, '1.0', 'all' ); // Inside a plugin
	wp_enqueue_script('loadjs', $plugindir . '/js/datepicker.js');
	
	//wp_enqueue_script('jquery-ui-datepicker');
	//wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
	
	
  


}
/*function load_my_scripts(){
	wp_enqueue_script('jquery-ui-datepicker');
    wp_enqueue_style('jquery-ui-datepicker','http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/redmond/jquery-ui.min.css' );
}*/
?>