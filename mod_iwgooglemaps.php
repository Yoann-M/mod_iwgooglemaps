<?php
/**
 * @package    	IndependanceWeb
 * @subpackage 	Modules
 * @link 		http://www.independanceweb.fr
 * @license 	GNU/GPL, see LICENSE.php
 * mod_iw_googlemaps is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
 // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
// Include the syndicate functions only once
require_once( dirname(__FILE__).'/helper.php' );
$iwgooglemaps = modIwGoogleMapsHelper::getIwGoogleMaps( $params );
// on verifie que adresse contient un apostrophe et on le remplace
$adresse = $params->get('adresse'); 
$adresse = str_replace("'" ,"\'",$adresse);
$country = $params->get('country'); 
// on defini le chemin vers l'image (icone) du marker
$iconmap = $params->get('iconmap');
$iconmap = JURI::root(true).'/'.$iconmap;
$animationiconmap = $params->get('animationiconmap');
// on verifie que windowtitle contient un apostrophe et on le remplace
$windowtitle = $params->get('windowtitle');
$windowtitle = str_replace("'" ,"\'",$windowtitle); 
//on verifie que zoomsize est bien un entier
$zoomsize = $params->get('zoomsize');
if(ctype_digit($zoomsize)){
   $zoomsize = $params->get('zoomsize');
} else{
   $zoomsize = 15;
}
//on verifie que windowtel est bien numéric
$windowtel = $params->get('windowtel');
if(is_numeric($zoomsize)){
   $windowtel = $params->get('windowtel');
} else{
    $windowtel = "";
}
//Map Color
$mapcolor = $params->get('mapcolor');
//Api Key
$apikey = $params->get('apikey');
require( JModuleHelper::getLayoutPath( 'mod_iwgooglemaps' ) );
?>