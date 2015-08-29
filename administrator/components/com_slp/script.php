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

jimport('joomla.installer.installer');
jimport('joomla.installer.helper');

/**
 * Script file of slp component
 */
class com_slpInstallerScript
{
	/**
	 * method to install the component
	 *
	 *
	 * @return void
	 */
	function install($parent)
	{

  jimport( 'joomla.installer.installer' );
  jimport( 'joomla.filesystem.folder' );
  jimport( 'joomla.filesystem.file' );

  $dbb =& JFactory::getDBO();
  $queryb = "SELECT * FROM `#__extensions` WHERE `element` = 'sitelinkx'";
  $dbb->setQuery($queryb);
  $rowsb = $dbb->LoadObjectList();
  $installiert = count($rowsb);

  if ($installiert == 0) { $queryc = "INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`, `client_id`, `enabled`, `access`, `protected`, `manifest_cache`, `params`, `custom_data`, `system_data`, `checked_out`, `checked_out_time`, `ordering`, `state`) VALUES ('', 'Content - Sitelinkx', 'plugin', 'sitelinkx', 'content', 0, 1, 1, 0, '{\"legacy\":true,\"name\":\"Content - Sitelinkx\",\"type\":\"plugin\",\"creationDate\":\"02\\/2011\",\"author\":\"www.eXtro-media.de\",\"copyright\":\"(c) 2009-2013 all rights reserved\",\"authorEmail\":\"sitelinkx@eXtro-media.de\",\"authorUrl\":\"http:\\/\\/www.eXtro-media.de\",\"version\":\"1.6.4\",\"description\":\"Sitelinkx plugin V1.6.4\",\"group\":\"\"}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0)"; }
  if ($installiert > 0)  { $queryc = "UPDATE `#__extensions` SET `enabled` = '1' WHERE `element` = 'sitelinkx'"; }

  $quelle = JPATH_ADMINISTRATOR.'/components/com_slp/plugin/';
  $ziel = JPATH_ROOT.'/plugins/content/sitelinkx/';
  $kopieren = JFolder::create($ziel);
  $kopieren = $kopieren && JFile::copy($quelle.'sitelinkx.php', $ziel.'sitelinkx.php');
  $kopieren = $kopieren && JFile::copy($quelle.'sitelinkx.xml', $ziel.'sitelinkx.xml');
  $dbb->setQuery($queryc);
  $kopieren = $kopieren && $dbb->query();
  
  echo '<h2>Important note: The Sitelinkx Plugin has been activated automatically. If you have purchased the the Sitelinkx Booster Plugin, you must disable the Sitelinkx Content Plugin!</h2>';

	}

	/**
	 * method to uninstall the component
	 *
	 * @return void
	 */
	function uninstall($parent)
	{

	}

	/**
	 * method to update the component
	 *
	 * @return void
	 */
	function update($parent)
	{

  jimport( 'joomla.installer.installer' );
  jimport( 'joomla.filesystem.folder' );
  jimport( 'joomla.filesystem.file' );

  $dbb =& JFactory::getDBO();
  $queryb = "SELECT * FROM `#__extensions` WHERE `element` = 'sitelinkx'";
  $dbb->setQuery($queryb);
  $rowsb = $dbb->LoadObjectList();
  $installiert = count($rowsb);

  if ($installiert == 0) { $queryc = "INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`, `client_id`, `enabled`, `access`, `protected`, `manifest_cache`, `params`, `custom_data`, `system_data`, `checked_out`, `checked_out_time`, `ordering`, `state`) VALUES ('', 'Content - Sitelinkx', 'plugin', 'sitelinkx', 'content', 0, 1, 1, 0, '{\"legacy\":true,\"name\":\"Content - Sitelinkx\",\"type\":\"plugin\",\"creationDate\":\"02\\/2011\",\"author\":\"www.eXtro-media.de\",\"copyright\":\"(c) 2009-2013 all rights reserved\",\"authorEmail\":\"sitelinkx@eXtro-media.de\",\"authorUrl\":\"http:\\/\\/www.eXtro-media.de\",\"version\":\"1.6.4\",\"description\":\"Sitelinkx plugin V1.6.4\",\"group\":\"\"}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0)"; }
  if ($installiert > 0)  { $queryc = "UPDATE `#__extensions` SET `enabled` = '1' WHERE `element` = 'sitelinkx'"; }

  $quelle = JPATH_ADMINISTRATOR.'/components/com_slp/plugin/';
  $ziel = JPATH_ROOT.'/plugins/content/sitelinkx/';
  $kopieren = JFolder::create($ziel);
  $kopieren = $kopieren && JFile::copy($quelle.'sitelinkx.php', $ziel.'sitelinkx.php');
  $kopieren = $kopieren && JFile::copy($quelle.'sitelinkx.xml', $ziel.'sitelinkx.xml');
  $dbb->setQuery($queryc);
  $kopieren = $kopieren && $dbb->query();
  
  echo '<h2>Important note: The Sitelinkx Plugin has been activated automatically. If you have purchased the the Sitelinkx Booster Plugin, you must disable the Sitelinkx Content Plugin!</h2>';

	}

	/**
	 * method to run before an install/update/uninstall method
	 *
	 * @return void
	 */
	function preflight($type, $parent)
	{

	}

	/**
	 * method to run after an install/update/uninstall method
	 *
	 * @return void
	 */
	function postflight($type, $parent)
	{

	}
}
?>