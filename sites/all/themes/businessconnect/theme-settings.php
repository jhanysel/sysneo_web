<?php
/**
 * @package Business Connect Business Theme - Adodis Drupal Theme
 * @version 1.1 April 28, 2011
 * @author Adodis Theme http://www.drupal-theme.adodis.com
 * @copyright Copyright (C) 2010 Adodis Drupal Theme
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
/**
 * Setting the theme from the back end
 *
 * @param form values $form
 * @param form state values $form_state
 */
function businessconnect_form_system_theme_settings_alter(&$form, $form_state) {

	/*
	 * Create the form using Forms API
	 */
if(theme_get_setting('slideshow')) {

	$form['theme_config'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('Theme settings'),
    '#attributes'    => '',
	);

	$form['theme_config']['slideshow'] = array(
	    '#type'          => 'select',
	    '#title'         => t('Slide Show Option'),
	    '#default_value' => theme_get_setting('slideshow'),
  		'#options'       => array(
                          'yes'=> t('Yes'),
                          'no' => t('No'),
	),
        '#description'   => t(''),
	);

}
}
