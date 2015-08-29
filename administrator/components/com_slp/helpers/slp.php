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

/**
 * Slp component helper.
 */
abstract class SlpHelper
{
	/**
	 *	Configure the Linkbar.
	 */
	public static function addSubmenu($submenu) 
	{
		if(JVERSION >= '3.0.0') {
      JHtmlSidebar::addEntry(JText::_('SL_MAN').' Manager', 'index.php?option=com_slp&view=slp', $submenu == 'slp');
		  JHtmlSidebar::addEntry(JText::_('SL_ABOUT'), 'index.php?option=com_slp&view=slpconfig', $submenu == 'slpconfig');
		}
	}

	/**
	 *	Get the actions
	 */
	public static function getActions($Id = 0)
	{
		jimport('joomla.access.access');

		$user	= JFactory::getUser();
		$result	= new JObject;

		if (empty($Id)):
			$assetName = 'com_slp';
		else:
			$assetName = 'com_slp.message.'.(int) $Id;
		endif;

		$actions = JAccess::getActions('com_slp', 'component');

		foreach ($actions as $action):
			$result->set($action->name, $user->authorise($action->name, $assetName));
		endforeach;

		return $result;
	}
}
?>