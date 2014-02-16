
//var mapCanvas = document.getElementById("map-canvas");
var mapObject;
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
//    var overlayUrl = 'http://eastercamp.dev/img/ec-map-overlay.svg';

//    var styles = [{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#8800ff"},{"saturation":-52},{"lightness":-35}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"lightness":23},{"hue":"#6600ff"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"hue":"#9000ff"},{"lightness":38}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"geometry","stylers":[{"lightness":38},{"hue":"#9000ff"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#cf546b"},{"lightness":48}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"weight":1.5},{"color":"#f476a1"},{"lightness":16}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#000000"}]},{"featureType":"road.highway","elementType":"labels.text.stroke","stylers":[{"lightness":100},{"weight":2.5}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"#c518a7"},{"lightness":95}]}];

// var styledMap = new google.maps.StyledMapType(styles);

// var imageBounds = new google.maps.LatLngBounds(
//  new google.maps.LatLng(-43.43426,172.702761),
//  new google.maps.LatLng(-43.430738,172.707653));

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
};

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
};

$(document).ready(function()
{
  initMaps();
});