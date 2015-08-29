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

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * slp View
 */
class SlpViewslp extends JViewLegacy
{
	/**
	 * Slp view display method
	 * @return void
	 */
	function display($tpl = null) 
	{
		// Include helper submenu
		SlpHelper::addSubmenu('slp');

		// Get data from the model
		$items = $this->get('Items');
		$pagination = $this->get('Pagination');

      $state = $this->get('State');
      $this->sortDirection = $state->get('list.direction');
      $this->sortColumn = $state->get('list.ordering');

		// Check for errors.
		if (count($errors = $this->get('Errors'))):
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		endif;

		// Assign data to the view
		$this->items = $items;
		$this->pagination = $pagination;

		// Set the toolbar
		$this->addToolBar();
		// Show sidebar
		if(JVERSION >= '3.0.0') {
		  $this->sidebar = JHtmlSidebar::render();
		}

		// Display the template
		parent::display($tpl);

		// Set the document
		$this->setDocument();
	}

	/**
	 * Setting the toolbar
	 */
	protected function addToolBar() 
	{
		$canDo = SlpHelper::getActions();
		JToolBarHelper::title(JText::_('SL_MAN'), 'slp');
		if($canDo->get('core.create')):
			JToolBarHelper::addNew('slpedit.add', 'JTOOLBAR_NEW');
		endif;
		if($canDo->get('core.edit')):
			JToolBarHelper::editList('slpedit.edit', 'JTOOLBAR_EDIT');
		endif;
		if($canDo->get('core.delete')):
			JToolBarHelper::deleteList('', 'slp.delete', 'JTOOLBAR_DELETE');
		endif;
		if($canDo->get('core.admin')):
			JToolBarHelper::divider();
			JToolBarHelper::preferences('com_slp');
		endif;
	}

	/**
	 * Method to set up the document properties
	 *
	 *
	 * @return void
	 */
	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('SL_MAN').' Administrator');
	}
}
?>