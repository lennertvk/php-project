function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition); //this is not a reliable feature
  } else {
    console.log("Geolocation is not supported by this browser.");
  }
}

function showPosition(position) {
let lat = position.coords.latitude;
let long = position.coords.longitude; 
console.log("lat = " + lat + "   long = " + long);



//start code from opencage data

  var apikey = '33db1f2b28134a28a996889968353b90';
  var latitude = lat;
  var longitude = long;

  var api_url = 'https://api.opencagedata.com/geocode/v1/json'

  var request_url = api_url
    + '?'
    + 'key=' +encodeURIComponent(apikey)
    + '&q=' + encodeURIComponent(latitude) + ',' + encodeURIComponent(longitude)
    + '&pretty=1'
    + '&no_annotations=1';

  // see full list of required and optional parameters:
  // https://opencagedata.com/api#forward

  var request = new XMLHttpRequest();
  request.open('GET', request_url, true);

  request.onload = function() {
  // see full list of possible response codes:
  // https://opencagedata.com/api#codes

    if (request.status == 200){ 
      // Success!
      var data = JSON.parse(request.responseText);
      console.log(data.results[0].components.city);
      let city = data.results[0].components.city;
      doAjaxcall(city);

    } else if (request.status <= 500){ 
    // We reached our target server, but it returned an error
                           
      console.log("unable to geocode! Response code: " + request.status);
      var data = JSON.parse(request.responseText);
      console.log(data.status.message);
    } else {
      console.log("server error");
    }
  };

  request.onerror = function() {
    // There was a connection error of some sort
    console.log("unable to connect to server");        
  };

  request.send();  // make the request

  //END opencagedata
function doAjaxcall(city){
  $.ajax({
    url: 'ajax/location.php',
    type: 'post',
    async: 'false',
    data: {
        'location': 1,
        'latitude': lat,
        'longitude': long,
        'city': city
    },
    succes: function(){}
});
}
}

getLocation();