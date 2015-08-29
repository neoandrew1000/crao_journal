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
<form action="<?php echo JRoute::_('index.php?option=com_slp&view=slp'); ?>" method="post" name="adminForm" id="adminForm">
<?php if(!empty( $this->sidebar)): ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
<?php else : ?>
	<div id="j-main-container">
<?php endif;?>
		<table class="table table-striped">
			<thead><?php echo $this->loadTemplate('head');?></thead>
			<tfoot><?php echo $this->loadTemplate('foot');?></tfoot>
			<tbody><?php echo $this->loadTemplate('body');?></tbody>
		</table>
		<div>
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="boxchecked" value="0" />
			<input type="hidden" name="filter_order" value="<?php echo $this->sortColumn; ?>" />
         <input type="hidden" name="filter_order_Dir" value="<?php echo $this->sortDirection; ?>" />
			<?php echo JHtml::_('form.token'); ?>
		</div>
	</div>
</form>
<div>
   <p><strong>If you use <a href="http://extensions.joomla.org/extensions/site-management/seo-a-metadata/automatic-links/21694" target="_blank">Sitelinkx</a>, please post a rating and a review at the Joomla! Extensions Directory.</strong></p>

   <p>More useful eXtensions by <a href="http://www.extro-media.de/" target="_blank">eXtro-media.de</a>:</p>
   <div id="extro" class="klasse" >
   </div>
	<style>
	.klasse { width: auto; height: auto; display: block; margin: 15px 0; } 
   </style>
   <script type="text/javascript">
     var images = new Array();
     var shop = new Array();
     images[0]  = "<img src=\"http://www.extro-media.de/images/prod-translation/responsive-bg-slideshow.png\" />";
     images[1]  = "<img src=\"http://www.extro-media.de/images/prod-translation/domain-check_gross.png\" />";
     images[2]  = "<img src=\"http://www.extro-media.de/images/prod-translation/accordion-responsive-gross.png\" />";
     images[3]  = "<img src=\"http://www.extro-media.de/images/prod-translation/extroforms.png\" />";
     images[4]  = "<img src=\"http://www.extro-media.de/images/prod-translation/tab-slider.png\" />";
     images[5]  = "<img src=\"http://www.extro-media.de/images/prod-translation/responsive-fast-slider.png\" />";
     images[6]  = "<img src=\"http://www.extro-media.de/images/prod-translation/parallax-slider.png\" />";
     images[7]  = "<img src=\"http://www.extro-media.de/images/prod-translation/responsive-gallery.png\" />";
     images[8]  = "<img src=\"http://www.extro-media.de/images/prod-translation/light-box.png\" />";
     images[9]  = "<img src=\"http://www.extro-media.de/images/prod-translation/sitelinkx-neutral-pro.png\" />";
     images[10] = "<img src=\"http://www.extro-media.de/images/prod-translation/rvp.png\" />";
     images[11] = "<img src=\"http://www.extro-media.de/images/prod-translation/timenotice.png\" />";
     images[12] = "<img src=\"http://www.extro-media.de/images/prod-translation/portfolio.png\" />";
     images[13] = "<img src=\"http://www.extro-media.de/images/prod-translation/karusel.png\" />";
     shop[0]  = "<a class=\"btn btn-success\" href=\"http://www.extro-media.de/en/shop-en/joomla-extensions/responsive-background-slideshow-detail.html\" target=\"_blank\">eXtro Background Slideshow</a>";
     shop[1]  = "<a class=\"btn btn-success\" href=\"http://www.extro-media.de/en/shop-en/joomla-extensions/extro-domainchecker-detail.html\" target=\"_blank\">eXtro Domainchecker</a>";
     shop[2]  = "<a class=\"btn btn-success\" href=\"http://www.extro-media.de/en/shop-en/joomla-extensions/responsiveaccordion-detail.html\" target=\"_blank\">eXtro Responsive Accordion</a>";
     shop[3]  = "<a class=\"btn btn-success\" href=\"http://www.extro-media.de/en/shop-en/joomla-extensions/extroforms-detail.html\" target=\"_blank\">eXtroForms</a>";
     shop[4]  = "<a class=\"btn btn-success\" href=\"http://www.extro-media.de/en/shop-en/joomla-extensions/responsive-tab-slider-detail.html\" target=\"_blank\">eXtro Responsive TabSlider</a>";
     shop[5]  = "<a class=\"btn btn-success\" href=\"http://www.extro-media.de/en/shop-en/joomla-extensions/responsive-fastslider-detail.html\" target=\"_blank\">eXtro Responsive FastSlider</a>";
     shop[6]  = "<a class=\"btn btn-success\" href=\"http://www.extro-media.de/en/shop-en/joomla-extensions/responsive-parallaxslider-detail.html\" target=\"_blank\">eXtro Responsive Parallax Slider</a>";
     shop[7]  = "<a class=\"btn btn-success\" href=\"http://www.extro-media.de/en/shop-en/joomla-extensions/responsivegallery-detail.html\" target=\"_blank\">eXtro Responsive Gallery</a>";
     shop[8]  = "<a class=\"btn btn-success\" href=\"http://www.extro-media.de/en/shop-en/joomla-extensions/responsive-extro-lightbox-detail.html\" target=\"_blank\">eXtro Responsive Lightbox</a>";
     shop[9]  = "<a class=\"btn btn-success\" href=\"http://www.extro-media.de/en/shop-en/joomla-extensions/sitelinkx-detail.html\" target=\"_blank\">Sitelinkx Pro</a>";
     shop[10] = "<a class=\"btn btn-success\" href=\"http://www.extro-media.de/en/shop-en/joomla-extensions/responsive-virtual-preview-detail.html\" target=\"_blank\">eXtro Responsive Virtual Preview</a>";
     shop[11] = "<a class=\"btn btn-success\" href=\"http://www.extro-media.de/en/shop-en/joomla-extensions/timednotice-plugin-detail.html\" target=\"_blank\">TimedNotice Plugin</a>";
     shop[12] = "<a class=\"btn btn-success\" href=\"http://www.extro-media.de/en/shop-en/joomla-extensions/rpc-responsive-portfolio-component-detail.html\" target=\"_blank\">RPC - Responsive Portfolio</a>";
     shop[13] = "<a class=\"btn btn-success\" href=\"http://www.extro-media.de/en/shop-en/joomla-extensions/360-carousel-detail.html\" target=\"_blank\">eXtro 360 Carousel</a>";
     var string = "<div class=\"row-fluid\"><div class=\"span5\" style=\"text-align: center;\">";
     var min = 0;
     var max = images.length - 1;
     var x = Math.round(Math.random() * (max - min)) + min;
     var y = Math.round(Math.random() * (max - min)) + min;
     if(x == y) {
       while(x == y) {
         var y = Math.round(Math.random() * (max - min)) + min;
       }
     }
     var string = string + images[x] + "<div class=\"clearfix\"></div><br />" + shop[x] + "</div><div class=\"span5\" style=\"text-align: center;\">";
     var string = string + images[y] + "<div class=\"clearfix\"></div><br />" + shop[y] + "</div></div>";
     document.getElementById('extro').innerHTML = string;
   </script>

</div>