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
// $lat = $_POST['lat'];
// $long = $_POST['long'];



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


//Checking if club already exists in the table
$result = mysqli_query($conn, "SELECT * FROM clubs WHERE ClubName='$clubname'");
$rowcount = mysqli_num_rows($result);

if($rowcount > 0) {
  mysqli_query($conn, "UPDATE clubs SET Address= '$address' WHERE ClubName='$clubname'");
}
else {
  mysqli_query($conn, "INSERT INTO clubs(ClubName, Address) VALUES ('$clubname', '$address')");
}


//If row exists update, if not insert to clubs table
if ($rowcount === 0) {
  echo "New record created successfully";
} else {
  echo "The record has been updated";
}

//Attempt at lat and long

function getCoordinates($currentAdd){
$currentAdd = str_replace(" ", "+", $address); // replace all the white space with "+" sign to match with google search pattern

$url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$currentAdd";

$response = file_get_contents($url);

$json = json_decode($response,TRUE); //generate array object from the response from the web

return ($json['results'][0]['geometry']['location']['lat'].",".$json['results'][0]['geometry']['location']['lng']);

print getCoordinates($currentAdd);
}
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
?>
