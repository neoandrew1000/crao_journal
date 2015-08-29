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

// import Joomla controllerform library
jimport('joomla.application.component.controllerform');

class SlpControllerslpedit extends JControllerForm
{

public function cancel(){
  $msg = JText::_( 'SL_CANCEL' );
  $this->setRedirect( 'index.php?option=com_slp&controller=slpedit', $msg );
}

public function save(){
  if (parent::save()) {
  	 $msg = JText::_( 'SL_SAVED' );
  } else {
  	 $msg = JText::_( 'SL_ERROR_SAVE' );
  }
  $this->setRedirect( 'index.php?option=com_slp&controller=slpedit', $msg );
}


}
?>