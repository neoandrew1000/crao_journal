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

// load tooltip behavior
JHtml::_('behavior.tooltip');
JHtml::_('behavior.multiselect');
if(JVERSION >= '3.0.0') {
  JHtml::_('dropdown.init');
  JHtml::_('formbehavior.chosen', 'select');
}
?>

<div class="row-fluid">
  <div class="span12">
    <h3><?php echo JText::_('SL_HELP');?></h3>
  </div>
</div>

<div class="row-fluid">
  <div class="span12">

<p><strong>Sitelinkx is the original link Manager for Joomla, now also available for Joomla 3.x</strong><br />
  This version of Sitelinkx works with Joomla 3.x and Joomla 2.5!</p>
<p>Sitelinkx was tested for compatibility with many extensions, however due to the huge number of eXtensions for Joomla, it's not possible to test all.<br />
  If you find any incompatibilities, please let us know and write a message.<br />
  <br />
  We're glad to hear from you how you liked Sitelinkx, so send us an eMail to <a href="mailto:sitelinkx@eXtro-media.de">sitelinkx@extro-media.de</a> , any feedback is welcome.<br />
  <br />
  We want to thank everybody who sent us feedback on Sitelinkx and helped us to make it even better.<br />
  <br />
  <br />  
  <strong>Copyright:</strong> © 2009 - 2013 <a href="http://www.extro-media.de" target="_blank">extro-media.de</a><br />
  <br />
  <strong>Homepage:</strong> <a href="http://www.extro-media.de" target="_blank">http://www.extro-media.de</a><br />
  <br />
  <strong>
  Sitelinkx is licensed under the <a href="http://www.gnu.org/licenses/gpl.html" target="_blank">GPLv3</a></strong><br />
  This is the free Version of Sitelinkx.
</p>
<p>If you want to translate Sitelinkx into your language or have a better translation for an existing localisation, please let us know.</p>

  </div>
</div>




<form action="<?php echo JRoute::_('index.php?option=com_slp&view=slpconfig'); ?>" method="post" name="adminForm" id="adminForm">
		<div>
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="boxchecked" value="0" />
			<?php echo JHtml::_('form.token'); ?>
		</div>
</form>