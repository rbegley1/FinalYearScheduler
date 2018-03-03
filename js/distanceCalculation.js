$(document).ready(function(){

  console.log(distance(54.5943, 6.9290, 54.5949, 7.0462));
  console.log(distance(54.5943, 6.9290, 54.4517, 7.4872));
});

function distance(lat1, lon1, lat2, lon2) {
  var R = 6371; //Radius of earth in km
  var dLat = degToRad(lat2-lat1);
  var dLon = degToRad(lon2-lon1); //Degree to Radians calculation
  var a = Math.sin(dLat/2)* Math.sin(dLat/2) +
          Math.cos(degToRad(lat1))* Math.cos(degToRad(lat2)) *
          Math.sin(dLon/2)* Math.sin(dLon/2);
  var c = 2* Math.atan(Math.sqrt(a), Math.sqrt(1-a));
  var d = R * c; //Distance in km
  return d;
}

function degToRad(deg) {
  return deg*(Math.PI/180)
}
