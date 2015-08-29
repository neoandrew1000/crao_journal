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

?>
<tr>
	<th width="5">
		<?php echo JText::_('ID'); ?>
	</th>
	<th width="20">
		<input type="checkbox" name="toggle" value="" onclick="Joomla.checkAll(this);" />
	</th>
	<th>
		<?php echo JHTML::_( 'grid.sort', JText::_('SL_LABEL'), 'wort', $this->sortDirection, $this->sortColumn);  //echo JText::_('SL_LABEL'); ?>
	</th>
	<th>
		<?php echo JHTML::_( 'grid.sort', JText::_('SL_REPLACE_WITH_URL'), 'ersatz', $this->sortDirection, $this->sortColumn); //echo JText::_('SL_REPLACE_WITH_URL'); ?>
	</th>
	<th width="20">
	  <?php echo JText::_('SL_URLAVAIL'); ?>
	</th>
	<th>
		<?php echo JHTML::_( 'grid.sort', JText::_('SL_TAG'), 'schlagwort', $this->sortDirection, $this->sortColumn); //echo JText::_('SL_TAG'); ?>
	</th>
	<th>
		<?php echo JHTML::_( 'grid.sort', JText::_('SL_OPENIN'), 'fenster', $this->sortDirection, $this->sortColumn); //echo JText::_('SL_OPENIN'); ?>
	</th>
	<th>
		<?php echo JHTML::_( 'grid.sort', JText::_('SL_BEGPUB'), 'begpub', $this->sortDirection, $this->sortColumn); //echo JText::_('SL_BEGPUB'); ?>
	</th>
	<th>
		<?php echo JHTML::_( 'grid.sort', JText::_('SL_ENDPUB'), 'endpub', $this->sortDirection, $this->sortColumn); //echo JText::_('SL_ENDPUB'); ?>
	</th>
	<th width="20">
		<?php echo JText::_('SL_ZEITRAUM'); ?>
	</th>
</tr>