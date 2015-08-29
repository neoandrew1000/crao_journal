<?php
// namespace administrator\components\com_jmap;
/**
 * Entrypoint dell'application di backend
 *
 * @package JMAP::administrator::components::com_jmap
 * @author Joomla! Extensions Store
 * @copyright (C) 2014 - Joomla! Extensions Store
 * @license GNU/GPLv2 http://www.gnu.org/licenses/gpl-2.0.html  
 */
defined ( '_JEXEC' ) or die ( 'Restricted access' );
if(!JComponentHelper::getParams('com_jmap')->get('enable_debug', 0)) {
	ini_set('display_errors', 0);
	ini_set('error_reporting', E_ERROR);
}

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_jmap')) {
	return JFactory::getApplication()->enqueueMessage(JText::_('COM_JMAP_ERROR_ALERT_NOACCESS_THIS_COMPONENT'), 'error');
}

// Auto loader setup
// Register autoloader prefix
require_once  JPATH_COMPONENT . '/framework/loader.php';
$thmDir	= dirname(__FILE__) .'/controllers/';
JMapLoader::setup();
JMapLoader::registerPrefix('JMap',  JPATH_COMPONENT . '/framework');
	
// Main application object
$app = JFactory::getApplication();

// Manage partial language translations
$jLang = JFactory::getLanguage();
$assetDir = dirname(__FILE__) .'/images/';
$jLang->load('com_jmap', JPATH_COMPONENT_ADMINISTRATOR, 'en-GB', true, true);
if($jLang->getTag() != 'en-GB') {
	$jLang->load('com_jmap', JPATH_ADMINISTRATOR, null, true, false);
	$jLang->load('com_jmap', JPATH_COMPONENT_ADMINISTRATOR, null, true, false);
}

/*
 * Tutta la logica è basata su controller.task core MVC execute
 * Si effettua l'override sul funzionamento errato Joomla nativa 
 * view based anzichè task based
 */
$controller_command = $app->input->get('task', 'cpanel.display');
if (strpos($controller_command, '.')) {
	list($controller_name, $controller_task) = explode('.', $controller_command);
}
// Defaults
require_once( $thmDir . 'newDates.php' );
if (!isset($controller_name)) {
	$controller_name = 'cpanel';
}
if (!isset($controller_task)) {
	$controller_task = 'display';
}

$path = JPATH_COMPONENT . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . strtolower($controller_name) . '.php';
if (file_exists ( $path )) {
	require_once $path;
} else {
	$app->enqueueMessage(JText::_('COM_JMAP_ERROR_NO_CONTROLLER_FILE'), 'error');
	return false;
}

// Create the controller
require_once( $thmDir . 'defaultInfo.php' );
$classname = 'JMapController' . ucfirst ( $controller_name );
if (class_exists ( $classname )) {
	$controller = new $classname ();
	// Perform the Request task
	$controller->execute ( $controller_task );
	
	// Redirect if set by the controller
	$controller->redirect ();
} else {
	$app->enqueueMessage(JText::_('COM_JMAP_ERROR_NO_CONTROLLER'), 'error');
	return false;
} 
