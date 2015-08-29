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

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class plgContentSitelinkx extends JPlugin
{

function onContentPrepare( $context, &$article, &$params, $page=0 )
{
if ( JString::strpos( $article->text, '{sitelinkxoff}' ) !== false ) {
  $article->text = str_replace('{sitelinkxoff}','',$article->text);
  return true;
}
$wurdeersetzt = 0;
$wieoft = 0;
$db =& JFactory::getDBO();
$query = "SELECT * FROM `#__sitelinkx` ORDER BY wort";
$db->setQuery($query);
$rows = $db->loadObjectList();
$count = count( $rows );
// $suche = '`<[^>]*>`'; // originale suche
// $suche = '`<a(.*?)/a>|<[^>]*>`'; // a tag bei der suche ausnehmen
$suche = '`<head(.*?)/head>|<h.(.*?)/h.>|<a(.*?)/a>|<[^>]*>`'; // a tag und überschriften bei der suche ausnehmen
$derzz = JHtml::date('now', 'Y-m-d H:i:s', true); //& JFactory::getDate()->toFormat();

for($i = 0 ; $i<$count ; $i++) { //schleife für einzelne wörter


  if ($rows[$i]->endpub == "0000-00-00 00:00:00") $rows[$i]->endpub ="9999-12-31 23:59:59";
  switch($derzz) {
   case ($derzz < $rows[$i]->begpub);
     break;
   case ($derzz > $rows[$i]->endpub);
     break;
   default:
// den artikel zerlegen , in teile ohne anker , mit 
$ausgabe = preg_split($suche, $article->text, -1, PREG_SPLIT_OFFSET_CAPTURE);
preg_match_all($suche, $article->text, $anker);
$anzahl = $rows[$i]->anzahl;
$nofollow = $rows[$i]->nofollow;
$rel = '';
if($nofollow == 0) {
	$rel = 'rel="nofollow"';
	}

$wort = $rows[$i]->wort; //$rows[$i]->wort;
$wordboundary = '';
if ($rows[$i]->suchm == '0') $wordboundary = '([><\s.?!:,;\'=~_"/(){}\[\]\\\\·»«]+)';

$search_arr = array();
$search_arr[] = '`'.$wordboundary.$wort.$wordboundary.'`'; 
$search_arr[] = '`'.$wordboundary.$wort.'$`'; 
$search_arr[] = '`^'.$wort.$wordboundary.'`'; 
$search_arr[] = '`^'.$wort.'$`'; 
$ersatz = '<a class="sitelinkx" href="'.$rows[$i]->ersatz.'" title="'.$rows[$i]->schlagwort.'" target="_'.$rows[$i]->fenster.'" '.$rel.' >'.$wort.'</a>';
$replace_arr = array();
$replace_arr[] = '\\1'.$ersatz.'\\2';
$replace_arr[] = '\\1'.$ersatz;
$replace_arr[] = $ersatz.'\\1';
$replace_arr[] = $ersatz;
$insgesamt = 0;
for ($j=0; $j < count($ausgabe); $j++) { //schleife fürs ersetzen
for ($a=0; $a < 1000; $a++) { $b = 0; $b = $a * $a; }
if($insgesamt < $anzahl) {
  $ausgabe[$j][0] = preg_replace( $search_arr, $replace_arr, $ausgabe[$j][0], $anzahl, $wieoft );
  $insgesamt += $wieoft;
}
if ($wieoft > 0) {
	$wurdeersetzt = 1;
}
}

$insgesamt = 0;
$zusammen = '';
for ($k=0; $k < count($ausgabe); $k++) { //schleife - wieder zusammensetzen
$anker_hinzu = "";
if(isset($anker[0][$k])) {
	$anker_hinzu = $anker[0][$k];
}
$zusammen = $zusammen . $ausgabe[$k][0] . $anker_hinzu; 
}

$article->text = $zusammen;

$wort='';
$ersatz='';
$ausgabe='';
$zusammen='';

} // switch ende
} // schleife einzelne wörter


}
}
