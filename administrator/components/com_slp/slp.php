<?php
/*
------------------------------------------------------------------------------
# Sitelinkx Component
# ----------------------------------------------------------------------------
# author    eXtro-media.de
# copyright Copyright (C) 2010-2013. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl.html
# website   www.eXtro-media.de
# forum     http://www.eXtro-media.de/en/extro-forum.html
# contact   sitelinkx@eXtro-media.de
# The lights are up now let the play begin
-------------------------------------------------------------------------------
*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Added for Joomla 3.0
if(!defined('DS')):
	define('DS',DIRECTORY_SEPARATOR);
endif;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_slp')):
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
endif;

// Load cms libraries
JLoader::registerPrefix('J', JPATH_PLATFORM . '/cms');
// Load joomla libraries without overwrite
JLoader::registerPrefix('J', JPATH_PLATFORM . '/joomla',false);

// require helper files
JLoader::register('SlpHelper', dirname(__FILE__) . DS . 'helpers' . DS . 'slp.php');

// import joomla controller library
jimport('joomla.application.component.controller');

// Add CSS file for all pages
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_slp/assets/css/slp.css');
$document->addScript('components/com_slp/assets/js/slp.js');

// Get an instance of the controller prefixed by Slp
$controller = JControllerLegacy::getInstance('Slp');

// Perform the Request task
$controller->execute(JRequest::getCmd('task'));

// Redirect if set by the controller
$controller->redirect();

?>