@extends('layouts.master')

@section('title','information')
@section('desc','')
@section('content')

<div class="parallax-orbit-container">
	<div class="parallax-orbit-inner">
		<ul class="parallax-orbit information-orbit" data-orbit>
			<li style="background-image: url(/img/parallax/ec-fmx-bikes.jpg);height:500px;"></li>
			<li style="background-image: url(/img/sliders/ec-info-1.jpg);height:500px;"></li>
			<li style="background-image: url(/img/sliders/ec-info-3.jpg);height:500px;"></li>
		</ul>
	</div>

	<div class="row parallax-orbit-info">
		<div class="small-12 columns">
			<h1>What is Eastercamp?</h1>
		</div>
	</div>
	
</div>



<!-- <section class="parallax-section" style="background-image: url(/img/sliders/ec-info-1.jpg)">
    <div class="row">
        <div class="small-12 columns">
        <h1 style="margin-top:300px;">Information</h1>
        </div>
    </div>
</section> -->

<div class="row">
	<div class="small-12 columns">
		

		<h1>Information</h1>

		<p>It&rsquo;s a camp, over Easter weekend&hellip; oh and 4500 others from around the country all ready to have the best 5 days of their life. Bold statement to make, we know &ndash; but people have been known to say it. It&rsquo;s just that good!&nbsp;</p>
		<p>Still don&rsquo;t believe us? Then check out our promo video here or wade through the wide selection of photos here.</p>
		<p><strong>Okay, you&rsquo;re beginning to convince me but what do you actually do there?</strong></p>
		<p>There are loads of awesome people to hang out with, heaps of slightly crazy activities to get stuck into, lots of chilled out relaxing things to do, delicious food, bands, sports, movies, jet boating, helicopter rides, thought provoking workshops, coffee, toasties, pies, comps, mean-as live video, the grooveroom and the list goes on.</p>
		<p>You&rsquo;ll also hear some pretty onto it speakers who'll give you some insight into who God is; not some judgmental old dictator shooting us from heaven when we stuff up, but actually alive and active in bringing colour, life, hope, forgiveness, love, restoration and justice to the whole world, to everyone and everything in it.</p>
		<p>If you're after a full-on high-energy weekend raving/dancing/shuffling in the groove room or a chilled out vibe, crafts, movies, street art, cafes, water slides we got it all!</p>


		<p>Eastercamp starts on <strong>Thursday the 17th April and runs until Monday the 21st of April 2013</strong>, Gates open 2pm on the Thursday with the programme beginning around 8pm. Camp finishes 1pm on Monday.</p>
		<p>Eastercamp is situated at the coastal Spencer Beach Holiday Park, just 20min north of Christchurch. This site is awesome for so many reasons (shelter from southerly storms, superior drainage, lots of green space, hot showers and flushing toilets are up there!)</p>
		<p>If you have questions about getting there, see the transport questions page or get directions from Google Maps here.</p>
		<p>Eastercamp is for <strong>youth group aged young people and their leaders</strong>. General Campers must be <strong>aged between 13-18 years old</strong> at the start of camp or be in Year 9-13 at school in 2014.</p>
	</div>

	

	<div class="small-12 columns">

	    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	    <script>

	    	//var mapCanvas = document.getElementById("map-canvas");
	    	var mapObject;
	    	var directionsDisplay;
	    	var directionsService = new google.maps.DirectionsService();
	  //   	var overlayUrl = 'http://eastercamp.dev/img/ec-map-overlay.svg';

	  //   	var styles = [{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#8800ff"},{"saturation":-52},{"lightness":-35}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"lightness":23},{"hue":"#6600ff"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"hue":"#9000ff"},{"lightness":38}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"geometry","stylers":[{"lightness":38},{"hue":"#9000ff"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#cf546b"},{"lightness":48}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"weight":1.5},{"color":"#f476a1"},{"lightness":16}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#000000"}]},{"featureType":"road.highway","elementType":"labels.text.stroke","stylers":[{"lightness":100},{"weight":2.5}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"#c518a7"},{"lightness":95}]}];

			// var styledMap = new google.maps.StyledMapType(styles);

			// var imageBounds = new google.maps.LatLngBounds(
			// 	new google.maps.LatLng(-43.43426,172.702761),
			// 	new google.maps.LatLng(-43.430738,172.707653));

			// var ecOverlay = new google.maps.GroundOverlay(overlayUrl, imageBounds);
			var initMaps = function()
			{
				var loadingIcon = '<i class="fa fa-cog fa-spin fa-lg"></i>';
				var locationIcon = '<i class="fa fa-location-arrow fa-lg"></i>';
				var startAddressField = $('#startAddress');

				// If the browser supports the Geolocation API
				if (typeof navigator.geolocation == "undefined") {
					$("#error").text("Your browser doesn't support the Geolocation API");
					return;
				}

				directionsDisplay = new google.maps.DirectionsRenderer();

		    	var mapOptions = {
					zoom: 10,
					center: new google.maps.LatLng(-43.429944, 172.705426),
					mapTypeId: google.maps.MapTypeId.ROADMAP,
					panControl: true,
				    zoomControl: true,
				    zoomControlOptions: {
						style: google.maps.ZoomControlStyle.DEFAULT,
					},
				    scaleControl: false,
				    mapTypeControl: false
				};

				// Draw the map
				mapObject = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
				directionsDisplay.setMap(mapObject);
		  		directionsDisplay.setPanel(document.getElementById('directions-panel'));

				//mapObject.mapTypes.set('map_style', styledMap);
				//mapObject.setMapTypeId('map_style');
				
				//ecOverlay.setMap(mapObject);

				//Find GeoLocation
				$("#geo-detect-link").click(function(event) 
				{
					// Stop link running
					event.preventDefault();

					var ele = $(this);

					// Execute loading Icon
					ele.html(loadingIcon);

					navigator.geolocation.getCurrentPosition(function(position)
					{
						var geocoder = new google.maps.Geocoder();

						geocoder.geocode({
							"location": new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
						},
						function(results, status)
						{
							var geoResult = results[0].formatted_address;

							if (status == google.maps.GeocoderStatus.OK)
							{
								// Set GeoAddress to startAddress text-field
								startAddressField.val(geoResult);
								// Execute calculateRoute function with result
								calculateRoute();
								// Restore Location icon
								ele.html(locationIcon);
							}
							else
							{
								$("#error").append("Unable to retrieve your address<br />");
							}
						});
					},
					function(positionError){
						$("#error").append("Error: " + positionError.message + "<br />");
					}, { enableHighAccuracy: true, timeout: 10 * 1000 });
				});




				$("#calculate-route").submit(function(event)
				{
					event.preventDefault();

					calculateRoute(startAddressField.val());
				});
			}

			var calculateRoute = function()
			{
				//var styledMap = new google.maps.StyledMapType(styles);
				var destinationAddress = '110 Heyders Road, Bottle Lake, Christchurch 8083, New Zealand';
				var startAddress = $('#startAddress').val();
				
				var directionsRequest = {
					origin: startAddress,
					destination: destinationAddress,
					travelMode: google.maps.DirectionsTravelMode.DRIVING,
					unitSystem: google.maps.UnitSystem.METRIC
				};

				directionsService.route(directionsRequest, function(response, status)
				{
					if (status == google.maps.DirectionsStatus.OK)
					{
						directionsDisplay.setDirections(response);
					}
					else
					{
						$("#error").text("This address is invalid.");
					}
				});
			}
	 
			$(document).ready(function() 
			{
				initMaps();
			});
	    </script>

	    <h1><i class="fa fa-map-marker"></i> Get Directions</h1>

	    <form id="calculate-route" name="calculate-route" action="#" method="get">
			<div class="row collapse">
				<div class="small-12 columns">
					<label for="from">Enter your address below and hit enter or click the <i class="fa fa-location-arrow"></i> to detect your location:</label>
				</div>
				<div class="small-10 medium-11 columns">
					<input class="error" type="text" id="startAddress" name="startAddress" required="required" placeholder="45a Example Street, Suburb, Christchurch">
					<!-- <small class="error address-error"></small> -->
				</div>
				<div class="small-2 medium-1 columns">
					<a href="#" id="geo-detect-link" class="button success postfix"><i class="fa fa-location-arrow fa-lg"></i></a>
				</div>
			</div>
	    </form>
		
		<div style="width:100%" class="th">
		    	<div id="map-canvas"></div>
		</div>
		

	    <div id="directions-panel"></div>

	</div>
</div>

@stop