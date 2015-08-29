<?php
/**
 * @copyright   (C) 2011 iJoomla, Inc. - All rights reserved.
 * @license  GNU General Public License, version 2 (http://www.gnu.org/licenses/gpl-2.0.html)
 * @author  iJoomla.com webmaster@ijoomla.com
 * @url   http://www.ijoomla.com/licensing/
 * the PHP code portions are distributed under the GPL license. If not otherwise stated, all images, manuals, cascading style sheets, and included JavaScript  *are NOT GPL, and are released under the IJOOMLA Proprietary Use License v1.0
 * More info at http://www.ijoomla.com/licensing/
*/
defined('_JEXEC') or die('Restricted access');
$document = &JFactory::getDocument();
$document->addStyleSheet(JURI::root() . 'modules/mod_ijoomla_speed_check/mod_ijoomla_speed_check.css');
$bc = '#' . strtoupper($params->get('border_color'));
$bg = '#' . strtoupper($params->get('bgcolor'));
$co = '#' . strtoupper($params->get('color'));
$pc = '#' . strtoupper($params->get('provided_color'));
# border_color bgcolor
# color provided_color
?>
<div id="ijoomla_pageload"
    style="background-color: <?php echo $bg; ?>; border-left: 2px solid <?php echo $bc ?>; border-right: 2px solid <?php echo $bc; ?>;">
    <span class="ij_pspeed" style="background-color: <?php echo $bc; ?>; color: <?php echo $co; ?>;">Page Speed</span>
    <span class="ij_units" style="color: <?php echo $co; ?>">%%time%%</span>
    <span class="ij_time" style="color: <?php echo $co; ?>">Seconds</span>
    <p class="provided_content" style="background-color: <?php echo $bc; ?>;">
    <span class="ij_provided" style="background-color: <?php echo $bc; ?>;">Provided by&nbsp;i</span><a style="color: <?php echo $pc; ?>;" href="http://seo.ijoomla.com/" target="_blank">Joomla SEO</a>
    </p>
</div>
