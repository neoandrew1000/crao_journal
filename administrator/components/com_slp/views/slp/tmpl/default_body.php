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

$derzz = JHtml::date('now', 'Y-m-d H:i:s', true);
$edit = "index.php?option=com_slp&view=slp&task=slpedit.edit";
?>
<?php foreach($this->items as $i => $item): ?>
	<tr class="row<?php echo $i % 2; ?>">
		<td align="center">
			<?php echo $item->id; ?>
		</td>
		<td align="center">
			<?php echo JHtml::_('grid.id', $i, $item->id); ?>
		</td>
		<td>
			<a href="<?php echo $edit; ?>&id=<?php echo $item->id; ?>"><?php echo $item->wort; ?></a>
		</td>
		<td>
			<a href="<?php echo $edit; ?>&id=<?php echo $item->id; ?>"><?php echo $item->ersatz; ?></a>
		</td>
		<td align="center">
		  <?php
        switch ($item->publ){
          case ('1');
            echo '<img src="components/com_slp/assets/images/b_ye.gif">';
            break;
          case ('0');
				    $datei = @fopen($item->ersatz,'r');
            if ($datei) echo '<img src="components/com_slp/assets/images/b_gr.gif">';
              else echo '<img src="components/com_slp/assets/images/bulb.gif">';
            break;
        }
        ?>
		</td>
		<td>
			<a href="<?php echo $edit; ?>&id=<?php echo $item->id; ?>"><?php echo $item->schlagwort; ?></a>
		</td>
		<td align="center">
			<a href="<?php echo $edit; ?>&id=<?php echo $item->id; ?>"><?php if($item->fenster == 'self') echo JText::_('SL_OLDWIN'); elseif($item->fenster == 'blank') echo JText::_('SL_NEWWIN');  //echo $item->fenster; ?></a>
		</td>
		<td align="center">
			<a href="<?php echo $edit; ?>&id=<?php echo $item->id; ?>"><?php echo $item->begpub; ?></a>
		</td>
		<td align="center">
			<a href="<?php echo $edit; ?>&id=<?php echo $item->id; ?>"><?php if($item->endpub == '0000-00-00 00:00:00') echo JText::_( 'SL_NEVER' ); else echo $item->endpub; ?></a>
		</td>
		<td align="center">
		  <?php
          $ep = $item->endpub;
          $bp = $item->begpub;
           if ($ep < $bp) $ep = '9999-12-31 23:59:59';
             switch($derzz) {
               case ($derzz < $bp);
                 echo '<img src="components/com_slp/assets/images/ampel-gelb.png">';
                 break;
               case ($derzz > $ep);
                 echo '<img src="components/com_slp/assets/images/ampel-rot.png">';
                 break;
               default:
                 echo '<img src="components/com_slp/assets/images/ampel-gruen.png">';
                 break;      
             }
          $ep = '';
          $bp = '';
        ?>			
		</td>
	</tr>
<?php endforeach; ?>