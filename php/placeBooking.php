<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookingsdb";

//Variables to POST
$clubname = $_POST['clubname'];
$address = $_POST['address'];
$drawtype = $_POST['drawtype'];
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];

$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//Check for existing club names in clubs table
$result = mysqli_query($conn, "SELECT * FROM clubs WHERE ClubName='$clubname'");
$rowcount = mysqli_num_rows($result);

//If greater than 0, record will be updated, else it will be inserted to the clubs table
if($rowcount > 0) {
  mysqli_query($conn, "UPDATE clubs SET Address= '$address', Latitude= '$latitude', Longitude= '$longitude' WHERE ClubName='$clubname'");
  echo "The record has been updated";
}
else {
  mysqli_query($conn, "INSERT INTO clubs(ClubName, Address, Latitude, Longitude) VALUES ('$clubname', '$address', $latitude, $longitude)");
  echo "New record created successfully";
}

//Information for the draws table
 $sql = mysqli_query($conn,"INSERT INTO draws (ClubID, DrawType, StartDate, EndDate)
 VALUES ('$conn->insert_id', '$drawtype', '$startdate', '$enddate')");

//Close connection
mysqli_close($conn);

?>
