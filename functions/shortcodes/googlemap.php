<?php

function googlemap_shortcode( $atts, $content = null ) {
	global $smof_data;
	$defaults = array(
			'width' => '100%',
			'height' => '400px',
			'maptype' => 'ROADMAP',
			'zoom' => '14',
			'latitude' => '51.523728',
			'longitude' => '-0.079336',
			'marker_html' => ''
	);
	extract(shortcode_atts($defaults, $atts));
	
	ob_start();
	?>
<script>
var gmap_options = { "hide_businesses":<?php echo !empty($smof_data['gmap-hide-businesses']) ? '"'.$smof_data['gmap-hide-businesses'].'"' : '""'; ?>};
if (typeof map_num == 'undefined') {
	var map_num = 0;
}
map_num ++;
document.write('<div class="google-map" id="google-map-'+map_num+'" style="width: <?php echo $width; ?>; height: <?php echo $height; ?>;"></div>');
var latlng = new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>);
var gmap_styles = [];
if (gmap_options.hide_businesses == 1) {
	gmap_styles = [{ featureType: 'poi.business', stylers: [{ visibility: 'off' }] }];
}
var mapArgs = {
	zoom: <?php echo $zoom; ?>,
	center: latlng,
	scrollwheel: true,
	scaleControl: false,
	disableDefaultUI: false,
	mapTypeId: google.maps.MapTypeId.<?php echo $maptype; ?>,
	styles: gmap_styles
};
var mapContent = new google.maps.Map(document.getElementById('google-map-'+map_num), mapArgs);
mapContent.Center = latlng;
if(jQuery("#google-map-"+map_num).parent()){
	jQuery("#google-map-"+map_num).parent().data("map",mapContent);
	
}
var infoWindowContent = new google.maps.InfoWindow({
	content: '<?php echo $marker_html ;?>'
});

var markerContent = new google.maps.Marker({
	position: latlng,
	map: mapContent
});
<?php if (!empty($marker_html)) { ?>
google.maps.event.addListener(markerContent, 'click', function() {
	infoWindowContent.open(mapContent, markerContent);
});
<?php } ?>

</script>
	<?php
	return ob_get_clean();
}

add_shortcode( 'googlemap', 'googlemap_shortcode' );

?>