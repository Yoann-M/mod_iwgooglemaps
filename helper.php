<?php
/**
 * Helper class for Iw_GoogleMaps module
 * @link http://www.independanceweb.fr/
 * @licenseGNU/GPL, see LICENSE.php
 * mod_iw_googlemaps is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
class modIwGoogleMapsHelper
{
	public static function getIwGoogleMaps( $params )
		{
		$contenu .= '<div id="map-canvas"></div>';
		echo $contenu;
		}
}
?>