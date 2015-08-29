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

// import the Joomla modellist library
jimport('joomla.application.component.modellist');
/**
 * Slp Model
 */
class SlpModelslp extends JModelList
{

    protected function populateState($ordering = null, $direction = null) {
        parent::populateState('id', 'ASC');
    }

    public function __construct($config = array()){
        $config['filter_fields'] = array(
        'wort',
        'ersatz',
        'schlagwort',
        'fenster',
        'published',
        'begpub',
        'endpub'

    );

    parent::__construct($config);
    }


	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return	string	An SQL query
	 */
	protected function getListQuery()
	{
		// Create a new query object.
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);

		// Select some fields
		$query->select('*');

		// From the slp_slpedit table
		$query->from('#__sitelinkx');

      $query->order($db->escape($this->getState('list.ordering', 'id')).' '.
      $db->escape($this->getState('list.direction', 'ASC')));

		return $query;
	}
}
?>