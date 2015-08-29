<?php
/**
 * @copyright   (C) 2011 iJoomla, Inc. - All rights reserved.
 * @license  GNU General Public License, version 2 (http://www.gnu.org/licenses/gpl-2.0.html)
 * @author  iJoomla.com <webmaster@ijoomla.com>
 * @url   http://www.ijoomla.com/licensing/
 * the PHP code portions are distributed under the GPL license. If not otherwise stated, all images, manuals, cascading style sheets, and included JavaScript  *are NOT GPL, and are released under the IJOOMLA Proprietary Use License v1.0
 * More info at http://www.ijoomla.com/licensing/
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );
class  plgSystemIjoomlaspeedcheck extends JPlugin
{
    var $_start;

    function plgSystemIjoomlaspeedcheck(& $subject, $config)
    {
        parent::__construct($subject, $config);
    }

    function onAfterInitialise()
    {
        $this->_start = (float) array_sum(explode(' ',microtime()));
    }

    function onAfterRender()
    {
        $end = (float) array_sum(explode(' ', microtime()));
        $page_load = $end-$this->_start;
        $page_load = sprintf("%.2f", $page_load);
        // echo "Processing time: " . $page_load . " seconds<br />";

        $body = JResponse::getBody();
        $body = str_replace('%%time%%', $page_load , $body);
        JResponse::setBody($body);

    }
}
