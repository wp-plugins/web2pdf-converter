<?php
/*
Plugin Name: Web2PDF Converter
Description: This widget plugin add button for converting web page to pdf document.
Author: BaltSoft
Version: 1.0
Author URI: www.baltsoft.com
*/

function widget_web2pdf_init(){
	if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') )
		return;

    if ( function_exists('register_sidebar_widget') )
        register_sidebar_widget('Web2PDF Converter Widget', 'web2pdf_sidebar_widget');
		
}

function web2pdf_sidebar_widget($args) 
{
    extract($args);
    echo $before_widget; 
    echo $before_title . $after_title;

	//Load plugin localization
	$locale = get_locale();
	load_textdomain('Web2PDF', WP_PLUGIN_DIR . '/' . plugin_basename(dirname(__FILE__)) . '/lang/' . $locale . '.mo');
	$caption = __('Save page as PDF', 'Web2PDF');

	echo <<<END
<!-- Web2PDF Converter Button BEGIN -->
<script type="text/javascript">
	var pdfbuttonlabel="{$caption}";
</script>
<script src="http://www.web2pdfconvert.com/pdfbutton.js" type="text/javascript"></script>
<!-- Web2PDF Converter Button END -->
END;
	
	echo $after_widget;
}



add_action('plugins_loaded', 'widget_web2pdf_init');
?>