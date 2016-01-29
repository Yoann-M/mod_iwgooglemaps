<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document =& JFactory::getDocument();
$document->addStyleSheet( JURI::root(true).'/modules/'.$module->module. '/css/iwgooglemaps.css');
$document->addScript("http://maps.googleapis.com/maps/api/js?v=3&sensor=false&extension=.js");
echo $iwgooglemaps; 
$script .= 'window.onload = function() {';
// Une variable pour contenir notre future marker
$script .= 'var myMarker = null;';
// Des coordonnées de départ
$script .= 'var myLatlng = new google.maps.LatLng(-34.397, 150.644);';
// Les options de notre carte
$script .= 'var myOptions = {';
$script .= 'zoom: '.$zoomsize.',';
$script .= 'scrollwheel: false,';
$script .= 'mapTypeControl: false,';
$script .= 'streetViewControl: false,';
$script .= 'center: myLatlng,';
$script .= 'mapTypeId: google.maps.MapTypeId.ROADMAP,';
if ($mapcolor == 1) {
$script .= 'styles: [{"stylers": [{ "saturation": -100 }]}],';
};
$script .= '};';
// On créé la carte
$script .= 'var myMap = new google.maps.Map(';
$script .= 'document.getElementById(\'map-canvas\'),';
$script .= 'myOptions';
$script .= ');';
// L'adresse que nous allons rechercher
$script .= 'var GeocoderOptions = {';
$script .= '\'address\' : \''.$adresse.'\',';
$script .= '\'region\' : \'FR\'';
$script .= '}'."\n";
// Notre fonction qui traitera le resultat
$script .= 'function GeocodingResult( results , status )';
$script .= '{';
// Si la recher à fonctionné
$script .= 'if( status == google.maps.GeocoderStatus.OK ) {';
// S'il existait déjà un marker sur la map,
// on l'enlève
$script .= 'if(myMarker != null) {';  
$script .= 'myMarker.setMap(null);';
$script .= '}';
// Création de l'icône
if ($iconmap) {
$script .= 'var myMarkerImage = {';
$script .= 'url : "'.$iconmap.'",';
$script .= '};';
};
// On créé donc un nouveau marker sur l'adresse géocodée
$script .= 'var myMarker = new google.maps.Marker({';
$script .= 'position: results[0].geometry.location,';
$script .= 'map: myMap,';
if ($iconmap) {$script .= 'icon: myMarkerImage,';}
$script .= 'animation: google.maps.Animation.DROP,';
$script .= 'title: "'.$windowtitle.'"';
$script .= '});';
// Et on centre la vue sur ce marker
$script .= 'myMap.setCenter(results[0].geometry.location);';
//$script .= ' myMap.setCenter(new google.maps.LatLng(43.634023, 1.439271));';
// Options de la fenêtre
if ($windowtitle) { //si le titre de la fenetre on afiche le popover
$script .= 'var myWindowOptions = {';
$script .= 'content:';
$script .= '\'<h6>'.$windowtitle.'</h6>\'+';
$script .= '\'<p>'.$windowtel.'</p>\'';
$script .= '};';
// Création de la fenêtre
$script .= 'var myInfoWindow = new google.maps.InfoWindow(myWindowOptions);';
// Affichage de la fenêtre au click sur le marker
$script .= 'google.maps.event.addListener(myMarker, \'click\', function() {';
$script .= 'myInfoWindow.open(myMap,myMarker);';
$script .= '});';
} // fin de if
// Fin si status OK
$script .= '}';
// Fin de la fonction
$script .= '}';
// Nous pouvons maintenant lancer la recherche de l'adresse
$script .= 'var myGeocoder = new google.maps.Geocoder();';
$script .= 'myGeocoder.geocode( GeocoderOptions, GeocodingResult );';
$script .= '};';
$document->addScriptDeclaration( $script );
?>