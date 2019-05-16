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


///start opencage date code
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


  var request = new XMLHttpRequest();
  request.open('GET', request_url, true);

  request.onload = function() {


    if (request.status == 200){ 
      // Success!
      var data = JSON.parse(request.responseText);
      console.log(data.results[0].components.city_district);
      let placeCity = data.results[0].components.city_district;
      //doAjaxcall(placeCity, latitude, longitude);
      // zet CIty in text field (hidden)
      document.getElementById('location').value = placeCity;
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

// END

}
/*
function doAjaxcall(city, lat, long){
  $.ajax({
    //url: 'ajax/location.php',
    url: 'upload.php',
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
*/

getLocation();