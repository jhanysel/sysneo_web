<?php

/**
 * @package Business Connect Business Theme - Adodis Drupal Theme
 * @version 1.1 April 28, 2011
 * @author Adodis Theme http://www.drupal-themes.adodis.com
 * @copyright Copyright (C) 2010 Adodis Drupal Theme
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
/**
 * Theme Engine functions. Its change the html,page,block layouts
 * @param All variables and values defined by $variables
 */

//pre-process hook_preprocess_search_block_form

function businessconnect_preprocess_search_block_form(&$variables) {

	/***** Search form Moderation *********/
	$variables['form']['search_block_form']['#title'] = '';
	$variables['form']['search_block_form']['#size'] = 20;
	$variables['form']['search_block_form']['#value'] = 'search entire store here';
	$variables['form']['search_block_form']['#attributes'] = array('onblur' => "if (this.value == '') {this.value = '".$variables['form']['search_block_form']['#value']."';}", 'onfocus' => "if (this.value == '".$variables['form']['search_block_form']['#value']."') {this.value = '';}" );
	unset($variables['form']['search_block_form']['#printed']);
	$variables['search']['search_block_form'] = drupal_render($variables['form']['search_block_form']);
	$variables['search_form'] = implode($variables['search']);
}

/*
 * Process page
 * pre-process hook_preprocess_page
 */

function businessconnect_process_page(&$variables){

	global $base_url;

	/*********front page different color title**********/

	if ($variables['is_front'])
	{
	$variable=$variables['title'];
	$text=(explode(" ", $variable));
	$variables['title'] = '<span>'.$text[0].' '.$text[1].' '.'<span class="title_default">'.$text[2].' '.$text[3].'</span>'.'</span>';
	}


	/***** User login form Moderation *********/

	if($variables['page']['sidebar_left']){
		$variables['page']['sidebar_left']['user_login']['links']='';
		$variables['page']['sidebar_left']['user_login']['name']['#title']='';
		$variables['page']['sidebar_left']['user_login']['name']['#value']='User Name';
		$variables['page']['sidebar_left']['user_login']['name']['#required']='';
		$variables['page']['sidebar_left']['user_login']['pass']['#title']='';
		$variables['page']['sidebar_left']['user_login']['pass']['#value']='Password';
		$variables['page']['sidebar_left']['user_login']['pass']['#required']='';
		$variables['page']['sidebar_left']['user_login']['pass']['#attributes'] = array('onblur' => "if (this.value == '') {this.value = '".$variables['page']['sidebar_left']['user_login']['pass']['#value']."';}", 'onfocus' => "if (this.value == '".$variables['page']['sidebar_left']['user_login']['pass']['#value']."') {this.value = '';}" );
		$variables['page']['sidebar_left']['user_login']['name']['#attributes'] = array('onblur' => "if (this.value == '') {this.value = '".$variables['page']['sidebar_left']['user_login']['name']['#value']."';}", 'onfocus' => "if (this.value == '".$variables['page']['sidebar_left']['user_login']['name']['#value']."') {this.value = '';}" );
	}


	/***** Sidebars class defined *********/

	if($variables['page']['sidebar_left'] && $variables['page']['sidebar_right']){
		$variables['switch_column']='three-column';
	}
	elseif($variables['page']['sidebar_left']){
		$variables['switch_column']='two-column-left';
	}
	elseif($variables['page']['sidebar_right']){
		$variables['switch_column']='two-column-right';
	}
	else{
		$variables['switch_column']='one-column';
	}

	/***** User Positions block class defined *********/

	$userbox= 0;
	if ($variables['page']['user1']) $userbox += 1;
	if ($variables['page']['user2']) $userbox += 1;
	if ($variables['page']['user3']) $userbox += 1;

	switch ($userbox) {
		case 1:
			$userbox = "one";
			break;
		case 2:
			$userbox = "two";
			break;
		case 3:
			$userbox = "three";
			break;
		default:
			$userbox = "";
	}
	$variables['user_column']=$userbox;

	/******* User Positions padding Seperatation *********/
	$variables['user_last'] = '';
	if(empty($variables['page']['user1']) && $variables['page']['user2'] && $variables['page']['user3']) {
		$variables['user_last']='end-top-user';
	}

	/***** Footer column Positions block class defined *********/

	$fcolumnbox= 0;
	if ($variables['page']['fcolumn1']) $fcolumnbox += 1;
	if ($variables['page']['fcolumn2']) $fcolumnbox += 1;
	if ($variables['page']['fcolumn3']) $fcolumnbox += 1;

	switch ($fcolumnbox) {
		case 1:
			$fcolumnbox = "one";
			break;
		case 2:
			$fcolumnbox = "two";
			break;
		case 3:
			$fcolumnbox = "three";
			break;
		default:
			$fcolumnbox = "";
	}
	$variables['footer_column']=$fcolumnbox;

	/***** Footer Items *********/
	$footer_item= 0;
	if ($variables['page']['footer-menu'] || $variables['page']['fcolumn1'] ||
	 $variables['page']['fcolumn2'] || $variables['page']['fcolumn3']) $footer_item += 1;
	if ($variables['page']['footer-content']) $footer_item += 1;

	switch ($footer_item) {
		case 1:
			$footer_item = "one";
			break;
		case 2:
			$footer_item = "two";
			break;
		default:
			$footer_item = "";
	}
	$variables['footer_items']=$footer_item;

}

/*
 * Process Block
 * pre-process hook_preprocess_block(()
 */

function businessconnect_preprocess_block(&$variables) {

	/******* Side bar left and right class suffix *********/

	if($variables['block']->region=='sidebar_left'){
		$variables['region_class']='block-content';
		$variables['class_suffix']=$variables['class_suffix'];
	}
	elseif($variables['block']->region=='sidebar_right'){
		$variables['region_class']='block-content';
		$variables['class_suffix']=$variables['class_suffix'];
	}
	elseif($variables['block']->region=='user1' || $variables['block']->region=='user2' || $variables['block']->region=='user3'){
		$variables['region_class']='content';
		$variables['class_suffix']=$variables['class_suffix'];
	}
	else{
		$variables['region_class']='content';
		$variables['class_suffix']='';
		$variables['tab_suffix'] = '';
	}

/**superfish menu**/

	if($variables['block']->region=='navigation'){
		$mainmenu_dv="<div id='naviagtion_menu' class='menu_navigation clearfix'>".$variables['content']."</div>";
		$variables['content']=$mainmenu_dv;
	}

}

/*
 * Process Block
 * pre-process hook_preprocess_html(()
 */

function businessconnect_preprocess_html(&$variables) {

	// Add conditional stylesheets for IE
	drupal_add_css(path_to_theme() . '/css/ie7.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 7', '!IE' => FALSE), 'preprocess' => FALSE));

	/*******slideshow*******/

	if(theme_get_setting('slideshow')=='yes'){
		drupal_add_js(path_to_theme().'/js/jquery-1.4.4.js');
	}
	if(theme_get_setting('slideshow')=='yes'){
		drupal_add_js(drupal_get_path('module', 'slider') . '/slideshow.js');
		drupal_add_css(drupal_get_path('module', 'slider') . '/slider.css');
	}

	/***********superfish menu*************/
	if(!empty($variables['page']['navigation'])) {
			drupal_add_js(path_to_theme().'/js/superfish.js');
			drupal_add_css(path_to_theme() . '/css/superfish.css');
			drupal_add_js('jQuery(function(){ jQuery("ul.menu").superfish(); });','inline');
	}

}


function businessconnect_menu_link(array $variables) {

	$element=$variables['element'];

	$link = $variables['element']['#original_link'];
	$class = implode(" ",$variables['element']['#attributes']['class']);
	$class = "menu-".$variables['element']['#original_link']['mlid']." ".$class;


	if (isset($link['href'])) {


	$sh_link = link_create($link['title'], $link['href'], isset($link['localized_options']) ? $link['localized_options'] : array());
	$sh=explode("+",$sh_link);
	$ado =$sh[0];
	if(isset($sh[1]))
	{
	$class .='';
	$class .=' active-trail';
	}

	}
	elseif (!empty($link['localized_options']['html'])) {
	$ado .= $link['title'];
	}
	else {
	$ado .= check_plain($link['title']);
	}
	if ($element['#below']) {
	$ado .= drupal_render($element['#below']);
	}

	$output1 = '<li class="'.$class.'">';
	$output1 .= $ado;
	$output1 .= "</li>\n";
	return $output1;

}


function link_create($text, $path, array $options = array()) {

	global $language_url;

	static $use_theme = NULL;

	// Merge in defaults.
	$options += array(
	'attributes' => array(),
	'html' => FALSE,
	);

	if (($path == $_GET['q'] || ($path == '<front>' && drupal_is_front_page())) &&
	(empty($options['language']) || $options['language']->language == $language_url->language)) {
	$options['attributes']['class'][] = 'active';
	}

	if (isset($options['attributes']['title']) && strpos($options['attributes']['title'], '<') !== FALSE) {
	$options['attributes']['title'] = strip_tags($options['attributes']['title']);
	}
	if (!isset($use_theme) && function_exists('theme')) {
	if (variable_get('theme_link', TRUE)) {
	drupal_theme_initialize();
	$registry = theme_get_registry();
	$use_theme = !isset($registry['link']['function']) || ($registry['link']['function'] != 'theme_link');
	$use_theme = $use_theme || !empty($registry['link']['preprocess functions']) || !empty($registry['link']['process functions']) || !empty($registry['link']['includes']);
	}
	else {
	$use_theme = FALSE;
	}
	}
	if ($use_theme) {
	return theme('link', array('text' => $text, 'path' => $path, 'options' => $options));
	}



	$output = '<a href="' . check_plain(url($path, $options)) . '"' . drupal_attributes($options['attributes']) . '><span>' . ($options['html'] ? $text : check_plain($text)) . '</span></a>';

		if(isset($options['attributes']['class']))
		{
			if($options['attributes']['class'][0]=='active')
			{
				$output .='+set';
			}
		}

	return $output;

}