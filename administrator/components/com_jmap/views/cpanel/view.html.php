<?php
// namespace administrator\components\com_jmap\views\cpanel;
/**
 * @package JMAP::CPANEL::administrator::components::com_jmap
 * @subpackage views
 * @subpackage cpanel
 * @author Joomla! Extensions Store
 * @copyright (C) 2014 - Joomla! Extensions Store
 * @license GNU/GPLv2 http://www.gnu.org/licenses/gpl-2.0.html  
 */
defined ( '_JEXEC' ) or die ( 'Restricted access' );

/**
 * CPanel view
 *
 * @package JMAP::CPANEL::administrator::components::com_jmap
 * @subpackage views
 * @subpackage cpanel
 * @since 1.0
 */
class JMapViewCpanel extends JMapView {

	/**
	 * Render iconset for cpanel
	 *
	 * @param $link string
	 * @param $image string
	 * @access private
	 * @return string
	 */
	private function getIcon($link, $image, $text, $target = '', $title = null, $class = null) {
		$mainframe = JFactory::getApplication ();
		$lang = JFactory::getLanguage ();
		?>
		<div style="float:<?php echo ($lang->isRTL()) ? 'right' : 'left'; ?>;">
			<div class="icon">
				<a <?php echo $title . $class;?> <?php echo $target;?> href="<?php echo $link; ?>">
					<img src="components/com_jmap/images/<?php echo $image;?>" />
					<span><?php echo $text; ?></span>
				</a>
			</div>
		</div>
		<?php
	}
	
	/**
	 * Add the page title and toolbar.
	 *
	 * @since	1.6
	 */
	protected function addDisplayToolbar() {
		$doc = JFactory::getDocument();
		$doc->addStyleDeclaration('.icon-48-jmap{background-image:url("components/com_jmap/images/jmap-48x48.png")}');
		JToolBarHelper::title( JText::_('COM_JMAP_CPANEL_TOOLBAR' ), 'jmap' );
		JToolBarHelper::custom('cpanel.display', 'home', 'home', 'COM_JMAP_CPANEL', false);
	}
	
	/**
	 * Control panel display
	 *        	
	 * @access public
	 * @param string $tpl
	 * @return void
	 */
	public function display($tpl = null) {
		$doc = $this->document;
		$componentParams = $this->getModel()->getState('cparams');
		$this->loadJQuery($doc);
		$this->loadBootstrap($doc);
		$doc->addStylesheet ( JURI::root ( true ) . '/administrator/components/com_jmap/css/cpanel.css' );
		$doc->addStylesheet ( JURI::root ( true ) . '/administrator/components/com_jmap/css/jquery.fancybox.css' );
		$doc->addScript ( JURI::root ( true ) . '/administrator/components/com_jmap/js/chart.js' );
		$doc->addScript ( JURI::root ( true ) . '/administrator/components/com_jmap/js/cpanel.js' );
		$doc->addScript ( JURI::root ( true ) . '/administrator/components/com_jmap/js/analyzer.js' );
		if($componentParams->get('enable_precaching', 0)) {
			$doc->addScript ( JURI::root ( true ) . '/administrator/components/com_jmap/js/xmlprecaching.js' );
		}
		$doc->addCustomTag ('<script type="text/javascript" src="' . JURI::root ( true ) . '/administrator/components/com_jmap/js/jquery.fancybox.pack.js' . '"></script>');
		
		// Inject js translations
		$translations = array (	'COM_JMAP_ROBOTSPROGRESSTITLE',
							  	'COM_JMAP_ROBOTSPROGRESSSUBTITLE',
							  	'COM_JMAP_ROBOTSPROGRESSSUBTITLESUCCESS',
								'COM_JMAP_ROBOTSPROGRESSSUBTITLEERROR',
								'COM_JMAP_PRECACHING_TITLE',
								'COM_JMAP_START_PRECACHING_PROCESS',
								'COM_JMAP_PRECACHING_NO_DATASOURCES_FOUND',
								'COM_JMAP_PRECACHING_PROCESS_RUNNING',
								'COM_JMAP_PRECACHING_PROCESS_COMPLETED',
								'COM_JMAP_PRECACHING_REPORT_DATASOURCE',
								'COM_JMAP_PRECACHING_REPORT_DATASOURCE_TYPE',
								'COM_JMAP_PRECACHING_REPORT_LINKS',
								'COM_JMAP_PRECACHING_DATA_SOURCE_COMPLETED',
								'COM_JMAP_PRECACHING_DATASOURCES_RETRIEVED',
								'COM_JMAP_PRECACHING_PROCESS_FINALIZING',
								'COM_JMAP_PRECACHING_INTERRUPT',
								'COM_JMAP_PRECACHING_CACHED',
								'COM_JMAP_PRECACHING_NOT_CACHED',
								'COM_JMAP_PRECACHING_CLEARING',
								'COM_JMAP_PRECACHING_CLEAR_CACHE',
								'COM_JMAP_PUBLISHED_DATA_SOURCE_CHART',
								'COM_JMAP_TOTAL_DATA_SOURCE_CHART',
								'COM_JMAP_MENU_DATA_SOURCE_CHART',
								'COM_JMAP_USER_DATA_SOURCE_CHART',
								'COM_JMAP_ANALYZER_TITLE',
								'COM_JMAP_ANALYZER_PROCESS_RUNNING',
								'COM_JMAP_ANALYZER_STARTED_SITEMAP_GENERATION',
								'COM_JMAP_ANALYZER_ERROR_STORING_FILE',
								'COM_JMAP_ANALYZER_GENERATION_COMPLETE'
		);
		$this->injectJsTranslations($translations, $doc);
		
		$livesite =  substr_replace(JURI::root(), "", -1, 1);
		
		$user = JFactory::getUser();
		
		$lists = $this->get('Lists');
		$infoData = $this->get('Data');
		$doc->addScriptDeclaration('var jmapChartData = ' . json_encode($infoData));
		
		// Buffer delle icons
		ob_start ();
		$this->getIcon ( 'index.php?option=com_jmap&task=sources.display', 'icon-48-data.png', JText::_('COM_JMAP_SITEMAP_SOURCES' ), '', 'title="' . JText::_('COM_JMAP_SITEMAP_SOURCES' ) . '"');
		$this->getIcon ( 'index.php?option=com_jmap&task=wizard.display', 'icon-48-wizard.png', JText::_('COM_JMAP_NEW_WIZARD_DATASOURCE' ), '', 'title="' . JText::_('COM_JMAP_NEW_WIZARD_DATASOURCE' ) . '"');
		$this->getIcon ( $livesite . '/index.php?option=com_jmap&view=sitemap', 'icon-48-html_sitemap.png', JText::_('COM_JMAP_SHOW_HTML_MAP' ), 'target="_blank"', 'title="' . JText::_('COM_JMAP_SHOW_HTML_MAP' ) . '"', 'data-role="torefresh"' );
		$this->getIcon ( '#xmlsitemap', 'icon-48-xml_sitemap.png', JText::_('COM_JMAP_SHOW_XML_MAP' ), '', 'title="' . JText::_('COM_JMAP_SHOW_XML_MAP' ) . '"', 'class="fancybox"' );
		$this->getIcon ( '#xmlsitemap_xslt', 'icon-48-xsl_sitemap.png', JText::_('COM_JMAP_SHOW_XML_MAP_XSLT' ), '', 'title="' . JText::_('COM_JMAP_SHOW_XML_MAP_XSLT' ) . '"', 'class="fancybox"' );
		$this->getIcon ( '#xmlsitemap_export', 'icon-48-xml_export.png', JText::_('COM_JMAP_EXPORT_XML_SITEMAP' ), '', 'title="' . JText::_('COM_JMAP_EXPORT_XML_SITEMAP' ) . '"', 'class="fancybox"' );
		$this->getIcon ( $livesite . '/index.php?option=com_jmap&task=sitemap.exportxml&format=xml', 'icon-48-analyze.png', JText::_('COM_JMAP_ANALYZE_MAP' ), '', 'title="' . JText::_('COM_JMAP_ANALYZE_MAP' ) . '"', 'class="jmap_analyzer"' );
		
		if($user->authorise('core.edit', 'com_jmap')) {
			$this->getIcon ( 'index.php?option=com_jmap&task=cpanel.editEntity', 'icon-48-robots.png', JText::_('COM_JMAP_ROBOTS_EDITOR' ), '', 'title="' . JText::_('COM_JMAP_ROBOTS_EDITOR' ) . '"', 'class="fancybox_iframe"' );
		}
		$this->getIcon ( 'index.php?option=com_jmap&task=pingomatic.display', 'icon-48-pingomatic.png', JText::_('COM_JMAP_PINGOMATIC_LINKS' ), '', 'title="' . JText::_('COM_JMAP_PINGOMATIC_LINKS' ) . '"');
		
		// Access check.
		if ($user->authorise('core.admin', 'com_jmap')) {
			$this->getIcon ( 'index.php?option=com_jmap&task=config.display', 'icon-48-config.png', JText::_('COM_JMAP_CONFIG' ), '', 'title="' . JText::_('COM_JMAP_CONFIG' ) . '"' );
		}
		
		$this->getIcon ( 'http://storejextensions.org/jsitemap_professional_documentation.html', 'icon-48-help.png', JText::_('COM_JMAP_HELPTITLE' ), '', 'title="' . JText::_('COM_JMAP_HELPTITLE' ) . '"' );
		
		echo '<div style="display:none" id="xmlsitemap">';
		$this->getIcon ( $livesite . '/index.php?option=com_jmap&view=sitemap&format=xml', 'icon-48-xml_sitemap_standard.png', JText::_('COM_JMAP_SHOW_XML_STANDARD_MAP' ), 'target="_blank"' );
		$this->getIcon ( $livesite . '/index.php?option=com_jmap&view=sitemap&format=images', 'icon-48-xml_sitemap_images.png', JText::_('COM_JMAP_SHOW_XML_IMAGES_MAP' ), 'target="_blank"' );
		$this->getIcon ( $livesite . '/index.php?option=com_jmap&view=sitemap&format=gnews', 'icon-48-xml_sitemap_gnews.png', JText::_('COM_JMAP_SHOW_XML_GNEWS_MAP' ), 'target="_blank"' );
		$this->getIcon ( $livesite . '/index.php?option=com_jmap&view=sitemap&format=mobile', 'icon-48-xml_sitemap_mobile.png', JText::_('COM_JMAP_SHOW_XML_MOBILE_MAP' ), 'target="_blank"' );
		echo '</div>';
		
		echo '<div style="display:none" id="xmlsitemap_xslt">';
		$this->getIcon ( $livesite . '/index.php?option=com_jmap&view=sitemap&format=xml&xslt=1', 'icon-48-xml_sitemap_standard.png', JText::_('COM_JMAP_SHOW_XML_STANDARD_MAP' ), 'target="_blank"' );
		$this->getIcon ( $livesite . '/index.php?option=com_jmap&view=sitemap&format=images&xslt=1', 'icon-48-xml_sitemap_images.png', JText::_('COM_JMAP_SHOW_XML_IMAGES_MAP' ), 'target="_blank"' );
		$this->getIcon ( $livesite . '/index.php?option=com_jmap&view=sitemap&format=gnews&xslt=1', 'icon-48-xml_sitemap_gnews.png', JText::_('COM_JMAP_SHOW_XML_GNEWS_MAP' ), 'target="_blank"' );
		$this->getIcon ( $livesite . '/index.php?option=com_jmap&view=sitemap&format=mobile&xslt=1', 'icon-48-xml_sitemap_mobile.png', JText::_('COM_JMAP_SHOW_XML_MOBILE_MAP' ), 'target="_blank"' );
		echo '</div>';
		
		echo '<div style="display:none" id="xmlsitemap_export">';
		$this->getIcon ( $livesite . '/index.php?option=com_jmap&task=sitemap.exportxml&format=xml', 'icon-48-xml_sitemap_standard.png', JText::_('COM_JMAP_EXPORT_XML_STANDARD_MAP' ));
		$this->getIcon ( $livesite . '/index.php?option=com_jmap&task=sitemap.exportxml&format=images', 'icon-48-xml_sitemap_images.png', JText::_('COM_JMAP_EXPORT_XML_IMAGES_MAP' ));
		$this->getIcon ( $livesite . '/index.php?option=com_jmap&task=sitemap.exportxml&format=gnews', 'icon-48-xml_sitemap_gnews.png', JText::_('COM_JMAP_EXPORT_XML_GNEWS_MAP' ));
		$this->getIcon ( $livesite . '/index.php?option=com_jmap&task=sitemap.exportxml&format=mobile', 'icon-48-xml_sitemap_mobile.png', JText::_('COM_JMAP_EXPORT_XML_MOBILE_MAP' ));
		echo '</div>';
		
		$contents = ob_get_clean ();
		 
		// Assign reference variables
		$this->icons = $contents;
		$this->livesite = $livesite;
		$this->componentParams = $componentParams;
		$this->infodata = $infoData;
		$this->lists = $lists;
		$this->updatesData = $this->getModel()->getUpdates($this->get('httpclient'));
		$this->siteRouter = JRouterSite::getInstance('site', array('mode'=>JROUTER_MODE_SEF));
		$this->showSefLinks = $this->componentParams->get('sitemap_links_sef', false);
		$this->joomlaSefLinks = JFactory::getConfig()->get('sef', true);
		$this->currentVersion = strval(simplexml_load_file(JPATH_COMPONENT_ADMINISTRATOR . '/jmap.xml')->version);
		
		// Aggiunta toolbar
		$this->addDisplayToolbar();
		
		// Output del template
		parent::display ();
	}
	
	/**
	 * Edit entity view
	 *
	 * @access public
	 * @param Object& $row the item to edit
	 * @return void
	 */
	public function editEntity(&$row) {
		// Load JS Client App dependencies
		$doc = JFactory::getDocument();
		$this->loadJQuery($doc);
		$this->loadBootstrap($doc);
	
		// Load specific JS App
		$doc->addStylesheet ( JURI::root ( true ) . '/administrator/components/com_jmap/css/cpanel.css' );
		$doc->addScript ( JURI::root ( true ) . '/administrator/components/com_jmap/js/cpanel.js' );

		$this->option = $this->option;
		$this->robotsVersion = $this->getModel ()->getState ( 'robots_version' );
		$this->record = $row;
	
		parent::display ( 'edit' );
	}
		
	/**
	 * Rendering for installer APP that runs on JSitemap installation iframe
	 * @access public
	 * @return void
	 */
	public function showInstallerApp() {
		$doc = JFactory::getDocument();
		$this->loadJQuery($doc);
		$this->loadBootstrap($doc);
		$doc->addStylesheet ( JURI::root ( true ) . '/administrator/components/com_jmap/css/cpanel.css' );
		$doc->addScript ( JURI::root ( true ) . '/administrator/components/com_jmap/js/installer.js' );
	
		// Set layout
		$this->setLayout('default');
	
		// Format data
		parent::display ('installer');
	}
}