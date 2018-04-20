<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookingsdb";

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

$result = mysqli_query($conn, "SELECT * FROM clubs WHERE ClubName='$clubname'");
$rowcount = mysqli_num_rows($result);

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



// $isError = hasConflictingClubs($conn, $latitude, $longitude);
// if ($isError) {
//   echo "There was an error.";
// }

//Close connection
$conn->close();

// function hasConflictingClubs($connection, $lat, $long) {
  // use dates to query draws table
  // use club info associated with active draws
  // get lat and long of each of these clubs
  // use $latitude and $longitude as origin
  // use draw clubs lat and longs as destination
  // make request to matrix api
  // filter results where distance < 20 miles
  // if results.length > 0, then conflicting draw is present
  // state name of club(s) that are already hosting draws

  // $distanceMatrixApiUrl = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&key=AIzaSyA5kdoVwkdSvWyl30bYYROScoIVXQfy5d0&origins=$lat,$long&destinations=";
  // $clubsWithActiveDrawsQuery = "SELECT Latitude, Longitude FROM clubs JOIN draws ON clubs.ID = draws.ClubID";
  // $clubsWithActiveDrawsResult = mysqli_query($connection, $clubsWithActiveDrawsQuery);

  //Build URL
   // if (mysqli_num_rows($clubsWithActiveDrawsResult) > 0) {
   //  while ($row = mysqli_fetch_assoc($clubsWithActiveDrawsResult)) {
   //     $distanceMatrixApiUrl = $distanceMatrixApiUrl . $row['Latitude'] . "%2C" . $row['Longitude'] . "%7C";
   //   }
   //   print $distanceMatrixApiUrl;
   //
   //   $distanceMatrixApiUrl = substr($distanceMatrixApiUrl, 0, strlen($distanceMatrixApiUrl) - 3);


 //     //Distance between origin and destination
 //     $response = file_get_contents($distanceMatrixApiUrl));
 //
 //
 //     $allDestinations = response.rows[0].elements;
 //
 //     $indexesOfBadClubs = [];
 //
 //     for ($i = 0; $i < $allDestinations.length; $i++) {
 //            var currentDestination = $allDestinations[$i];
 //
 //            if ($currentDestination.distance.value < 20000) {
 //                $indexesOfBadClubs.push[$i]);
 //                break;
 //            }
 //     }
 //
 //     if ($indexesOfBadClubs.length > 0) {
 //       return true;
 //     } else {
 //       return false;
 //     }
 //   }
 //
 //   return false;
 // }

// //Part 1
// function buildUrl($lat, $long, $clubsWithActiveDraws) {
// 	$apiUrl = `https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&key=AIzaSyA5kdoVwkdSvWyl30bYYROScoIVXQfy5d0&origins=${lat},${long}&destinations=`;
//
// 	for ($i = 0; $i < count($clubsWithActiveDraws); $i++) {
//     	$currentClub = $clubsWithActiveDraws[$i];
//
// 		$apiUrl += $currentClub.Latitude + '%2C' + $currentClub.Longitude + '%7C';
// 	}
//
// 	return $apiUrl.substring(0, count($apiUrl) - 3);
// }

//If draw dates already in table check distance
//If distance inside boundary, error
//If distance outside boundary, no problems.
?>
