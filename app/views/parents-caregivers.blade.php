@extends('layouts.master')

@section('title','information')
@section('desc','')
@section('content')

<div class="row">
	<div class="small-12 columns">
		<h1>Parents &amp; Caregivers</h1>

		<p>As a parent or caregiver, you've probably got lots of questions about Eastercamp. Please review the above information and take a look at the Questions page before contacting us directly.</p>
		<p>A printable info sheet that you can slap on the fridge is available from the Downloads page.</p>
		<p><strong>Who runs Eastercamp?</strong></p>
		<p>Eastercamp is run by Canterbury Youth Services (CYS), a registered Charitable Trust. We have been running Eastercamp and other events like this for around 18 years. We are a Christian based trust providing a positive healthy weekend over Easter for your teenager.</p>
		<p><strong>Who looks after my teenager?</strong></p>
		<p>Your teenager will attend the event as part of a Youth Group (ask them which group). Outside the infrastructure and activities CYS provides, the Key Leader of your teenager's group is responsible for their general wellbeing while at camp. Eastercamp requires each group coming to have at least 1 leader to 10 young people. Each group also has 2 or more Camp Parents&rsquo; that stay at the group&rsquo;s camp to look after the site and young people.</p>
		<p><strong>What about security and medical emergencies?</strong></p>
		<p>24-7 Safety teams patrol the campsites with Police shifts operating also.</p>
		<p>While we do take every precaution to keep the event safe, sometimes people get sick or injured. Rest assured we have a full team of experienced Doctors and Nurses on-site 24/7 to deal with any emergency.</p>
		<p>An EC Earthquake Info Sheet &amp; Emergency Evacuation Plans can be found on the Downloads page.</p>

		<style>
      #panel {
        position: absolute;
        top: 5px;
        left: 50%;
        margin-left: -180px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
      }
    </style>
    <style>
      #directions-panel {
        height: 100%;
        float: right;
        width: 390px;
        overflow: auto;
      }

      #map-canvas {
        margin-right: 400px;
      }

      #control {
        background: #fff;
        padding: 5px;
        font-size: 14px;
        font-family: Arial;
        border: 1px solid #ccc;
        box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
        display: none;
      }

      @media print {
        #map-canvas {
          height: 500px;
          margin: 0;
        }

        #directions-panel {
          float: none;
          width: auto;
        }
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
		var directionsDisplay;
		var directionsService = new google.maps.DirectionsService();

		function initialize() {
		  directionsDisplay = new google.maps.DirectionsRenderer();
		  var mapOptions = {
		    zoom: 7,
		    center: new google.maps.LatLng(41.850033, -87.6500523)
		  };
		  var map = new google.maps.Map(document.getElementById('map-canvas'),
		      mapOptions);
		  directionsDisplay.setMap(map);
		  directionsDisplay.setPanel(document.getElementById('directions-panel'));

		  var control = document.getElementById('control');
		  control.style.display = 'block';
		  map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);
		}

		function calcRoute() {
		  var start = document.getElementById('start').value;
		  var end = document.getElementById('end').value;
		  var request = {
		    origin: start,
		    destination: end,
		    travelMode: google.maps.TravelMode.DRIVING
		  };
		  directionsService.route(request, function(response, status) {
		    if (status == google.maps.DirectionsStatus.OK) {
		      directionsDisplay.setDirections(response);
		    }
		  });
		}

		google.maps.event.addDomListener(window, 'load', initialize);

    </script>

	    <div id="control">
	      <strong>Start:</strong>
	      <select id="start" onchange="calcRoute();">
	        <option value="chicago, il">Chicago</option>
	        <option value="st louis, mo">St Louis</option>
	        <option value="joplin, mo">Joplin, MO</option>
	        <option value="oklahoma city, ok">Oklahoma City</option>
	        <option value="amarillo, tx">Amarillo</option>
	        <option value="gallup, nm">Gallup, NM</option>
	        <option value="flagstaff, az">Flagstaff, AZ</option>
	        <option value="winona, az">Winona</option>
	        <option value="kingman, az">Kingman</option>
	        <option value="barstow, ca">Barstow</option>
	        <option value="san bernardino, ca">San Bernardino</option>
	        <option value="los angeles, ca">Los Angeles</option>
	      </select>
	      <strong>End:</strong>
	      <select id="end" onchange="calcRoute();">
	        <option value="chicago, il">Chicago</option>
	        <option value="st louis, mo">St Louis</option>
	        <option value="joplin, mo">Joplin, MO</option>
	        <option value="oklahoma city, ok">Oklahoma City</option>
	        <option value="amarillo, tx">Amarillo</option>
	        <option value="gallup, nm">Gallup, NM</option>
	        <option value="flagstaff, az">Flagstaff, AZ</option>
	        <option value="winona, az">Winona</option>
	        <option value="kingman, az">Kingman</option>
	        <option value="barstow, ca">Barstow</option>
	        <option value="san bernardino, ca">San Bernardino</option>
	        <option value="los angeles, ca">Los Angeles</option>
	      </select>
	    </div>
	    <div id="directions-panel"></div>
	    <div id="map-canvas"></div>
	</div>
</div>

@stop