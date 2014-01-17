@extends('layouts.master')

@section('title','information')
@section('desc','')
@section('content')

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
	      function calculateRoute(from, to) {
	        // Center initialized to Naples, Italy
	        var myOptions = {
	          zoom: 10,
	          center: new google.maps.LatLng(-43.429944, 172.705426),
	          mapTypeId: google.maps.MapTypeId.ROADMAP
	        };
	        // Draw the map
	        var mapObject = new google.maps.Map(document.getElementById("map"), myOptions);
	 
	        var directionsService = new google.maps.DirectionsService();
	        var directionsRequest = {
	          origin: from,
	          destination: to,
	          travelMode: google.maps.DirectionsTravelMode.DRIVING,
	          unitSystem: google.maps.UnitSystem.METRIC
	        };
	        directionsService.route(
	          directionsRequest,
	          function(response, status)
	          {
	            if (status == google.maps.DirectionsStatus.OK)
	            {
	              new google.maps.DirectionsRenderer({
	                map: mapObject,
	                directions: response
	              });
	            }
	            else
	              $("#error").append("Unable to retrieve your route<br />");
	          }
	        );
	      }
	 
	      $(document).ready(function() {
	        // If the browser supports the Geolocation API
	        if (typeof navigator.geolocation == "undefined") {
	          $("#error").text("Your browser doesn't support the Geolocation API");
	          return;
	        }
	 
	        $("#from-link, #to-link").click(function(event) {
	          event.preventDefault();
	          var addressId = this.id.substring(0, this.id.indexOf("-"));
	 
	          navigator.geolocation.getCurrentPosition(function(position) {
	            var geocoder = new google.maps.Geocoder();
	            geocoder.geocode({
	              "location": new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
	            },
	            function(results, status) {
	              if (status == google.maps.GeocoderStatus.OK)
	                $("#" + addressId).val(results[0].formatted_address);
	              else
	                $("#error").append("Unable to retrieve your address<br />");
	            });
	          },
	          function(positionError){
	            $("#error").append("Error: " + positionError.message + "<br />");
	          },
	          {
	            enableHighAccuracy: true,
	            timeout: 10 * 1000 // 10 seconds
	          });
	        });
	 
	        $("#calculate-route").submit(function(event) {
	          event.preventDefault();
	          calculateRoute($("#from").val(), '110 Heyders Road, Bottle Lake, Christchurch 8083, New Zealand');
	        });
	      });
	    </script>
	    <style type="text/css">
	      #map {
	        width: 500px;
	        height: 400px;
	        margin-top: 10px;
	      }
	    </style>

	    <h1>Calculate your route</h1>
	    <form id="calculate-route" name="calculate-route" action="#" method="get">
	      <label for="from">From:</label>
	      <input type="text" id="from" name="from" required="required" placeholder="An address" size="30" />
	      <a id="from-link" href="#">Get my position</a>
	      <br />
	 
	      <input type="submit" />
	      <input type="reset" />
	    </form>
	    <div id="map"></div>
	    <p id="error"></p>

	</div>
</div>

@stop