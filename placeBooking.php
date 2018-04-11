<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookingsdb";

$clubname = $_POST['clubname'];
$address = $_POST['address'];
// $email = $_POST['email'];
$drawtype = $_POST['drawtype'];
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


//Checking if club already exists in the table
$result = mysqli_query($conn, "SELECT * FROM clubs WHERE ClubName='$clubname'");
$rowcount = mysqli_num_rows($result);

$coordinates = getcoordinates($address);

$latitude =  $coordinates[0];
$longitude = $coordinates[1];

if($rowcount > 0) {
  mysqli_query($conn, "UPDATE clubs SET Address= '$address', Latitude= '$latitude', Longitude= '$longitude' WHERE ClubName='$clubname'");
}
else {
  mysqli_query($conn, "INSERT INTO clubs(ClubName, Address, Latitude, Longitude) VALUES ('$clubname', '$address', $latitude, $longitude)");
}

//If row exists update, if not insert to clubs table
if ($rowcount === 0) {
  echo "New record created successfully";
} else {
  echo "The record has been updated";
}

//Attempt at lat and long

// $currentAdd = '$address';
// $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$currentAdd.'&sensor=false');
// $output = json_decode($geocode);
// $lat = $output->results[0]->geometry->location->lat;
// $lng = $output->results[0]->geometry->location->lng;

//Information for the draws table
$sql = "INSERT INTO draws (ClubID, DrawType, StartDate, EndDate)
VALUES ('$conn->insert_id', '$drawtype', '$startdate', '$enddate')";

$conn->query($sql);



//Close connection
$conn->close();

function getcoordinates($currentAdd){
  $encodedAdd = str_replace(" ", "+", $currentAdd); // replace all the white space with "+" sign to match with google search pattern

  $url = "https://maps.google.com/maps/api/geocode/json?sensor=false&key=AIzaSyA5kdoVwkdSvWyl30bYYROScoIVXQfy5d0&address=$encodedAdd";

  $response = file_get_contents($url);

  $json = json_decode($response, TRUE); //generate array object from the response from the web

  return array(
    getcoordinate($json, 'lat'),
    getcoordinate($json, 'lng')
  );
}

function getcoordinate($json, $type) {
  return $json['results'][0]['geometry']['location'][$type];
}
?>
