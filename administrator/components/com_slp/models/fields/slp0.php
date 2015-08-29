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

// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * wort Form Field class for the Slp component
 */
class JFormFieldslp0 extends JFormFieldList
{
	/**
	 * The wort field type.
	 *
	 * @var		string
	 */
	protected $type = 'slp0';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array		An array of JHtml options.
	 */
	protected function getOptions()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('#__sitelinkx.id as id, #__sitelinkx.wort as wort');
		$query->from('#__sitelinkx');
		$db->setQuery((string)$query);
		$items = $db->loadObjectList();
		$options = array();
		if($items):
			foreach($items as $item):
				$options[] = JHtml::_('select.option', $item->id, ucwords($item->wort));
			endforeach;
		endif;
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
?>