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

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
if(JVERSION >= '3.0.0') {
  JHtml::_('formbehavior.chosen', 'select');
}
JHtml::_('behavior.keepalive');
$params = $this->form->getFieldsets('params');

require_once( JPATH_SITE . '/components/com_content/helpers/route.php' );

?>
<script type="text/javascript" >

function auswaehlen (select) {
  var wert = select.options[select.options.selectedIndex].value;
  document.adminForm.getElementById('jform_ersatz').value = wert;
  if (wert == "leer") {
    select.form.reset();
    return;
  }
}

</script>
<?php
if(JVERSION <= '3.0.0') :
?>
<style type="text/css">
fieldset.adminform label { min-width: 200px; max-width: 200px; }
ul.nav.hidden { display: none; }
</style>
<?php
endif;
?>
<ul class="nav nav-tabs hidden" >
	<li class="active"><a data-toggle="tab" href="#home">tab</a></li>
</ul>
<form action="<?php echo JRoute::_('index.php?option=com_slp&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
	<div class="row-fluid">
		<div class="span12 form-horizontal">
			<fieldset class="adminform">
				<legend><?php echo JText::_( 'SL_DETAILS' ); ?></legend>
				<div class="adminformlist">
				  <div class="row-fluid">
				    <div class="span3"><?php echo $this->form->getLabel('wort'); ?></div>
				    <div class="span9"><?php echo $this->form->getInput('wort'); ?></div>
				  </div>

				  <div class="row-fluid">
				    <div class="span3"><?php echo $this->form->getLabel('ersatz'); ?></div>
				    <div class="span3"><?php echo $this->form->getInput('ersatz'); ?></div>
				    <div class="span6">

          <p><select size="1" name="Auswahl" onchange="auswaehlen(this)" width="100">
          <option value="leer" selected="selected">-- <?php echo JText::_( 'SL_ARTIKELWAHL' ); ?> --</option>
          
          <?php
            $db =& JFactory::getDBO();
            $query = "SELECT id,catid,alias,title FROM `#__content` ORDER BY id";
            $db->setQuery($query);
            $rows = $db->loadObjectList();
            

            for ($x=0, $n = count($rows); $x < $n; $x++) {

               $artslug = $rows[$x]->id . ':' . $rows[$x]->alias;

               $cdb =& JFactory::getDBO();
               $cquery = "SELECT * FROM `#__categories` WHERE id = " . $rows[$x]->catid;
               $cdb->setQuery($cquery);
               $crows = $cdb->loadObjectList();
            
               if ($rows[$x]->catid == '0') { $katslug = '';} else {$katslug = $crows[0]->id . ':' . $crows[0]->alias;}
               $sektionid = ''; //$rows[$x]->sectionid;
               $link = JRoute::_(ContentHelperRoute::getArticleRoute($artslug, $katslug, $sektionid));
               $link1 = strstr($link, 'index.php');
               echo '<option value="'.$link1.'" >'.$rows[$x]->title.'</option>';
            }
          ?>
          <option value="leer">-- <?php echo JText::_( 'SL_MENUEWAHL' ); ?> --</option>
          <?php
            $dbd =& JFactory::getDBO();
            $queryd = "SELECT id,title,link FROM `#__menu` ORDER BY id";
            $dbd->setQuery($queryd);
            $rowsd = $dbd->loadObjectList();
            for ($x=0, $n = count($rowsd); $x < $n; $x++ ) {
            	 $link = $rowsd[$x]->link;
            	 echo '<option value="'.$link.'" >'.$rowsd[$x]->title.'</option>'; 
            }
          ?>
          
          </select></p>

				    </div>
				  </div>

				  <div class="row-fluid">
				    <div class="span3"><?php echo $this->form->getLabel('schlagwort'); ?></div>
				    <div class="span9"><?php echo $this->form->getInput('schlagwort'); ?></div>
				  </div>

				  <div class="row-fluid">
				    <div class="span3"><?php echo $this->form->getLabel('fenster'); ?></div>
				    <div class="span9"><?php echo $this->form->getInput('fenster'); ?></div>
				  </div>

				  <div class="row-fluid">
				    <div class="span3"><?php echo $this->form->getLabel('publ'); ?></div>
				    <div class="span9"><?php echo $this->form->getInput('publ'); ?></div>
				  </div>

				  <div class="row-fluid">
				    <div class="span3"><?php echo $this->form->getLabel('begpub'); ?></div>
				    <div class="span9"><?php echo $this->form->getInput('begpub'); ?></div>
				  </div>

				  <div class="row-fluid">
				    <div class="span3"><?php echo $this->form->getLabel('endpub'); ?></div>
				    <div class="span9"><?php echo $this->form->getInput('endpub'); ?></div>
				  </div>

				  <div class="row-fluid">
				    <div class="span3"><?php echo $this->form->getLabel('anzahl'); ?></div>
				    <div class="span9"><?php echo $this->form->getInput('anzahl'); ?></div>
				  </div>

				  <div class="row-fluid">
				    <div class="span3"><?php echo $this->form->getLabel('suchm'); ?></div>
				    <div class="span9"><?php echo $this->form->getInput('suchm'); ?></div>
				  </div>

				  <div class="row-fluid">
				    <div class="span3"><?php echo $this->form->getLabel('nofollow'); ?></div>
				    <div class="span9"><?php echo $this->form->getInput('nofollow'); ?></div>
				  </div>


				  <div class="row-fluid">
				    <div class="span3"></div>
				    <div class="span9">
				    <?php echo $this->form->getInput('ausnahme'); ?></div>
				  </div>

				</div>
			</fieldset>
		</div>
	</div>
	<div>
	   <?php echo $this->form->getLabel('id'); echo $this->form->getInput('id'); ?>
		<input type="hidden" name="task" value="slpedit.edit" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
