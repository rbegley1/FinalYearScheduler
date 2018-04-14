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

//Check if start date is valid
$currentdate = strtotime(date('d-m-Y'));
$startingdate = strtotime($startdate);

if($startingdate < $currentdate) {
  echo "The date supplied cannot be in the past.";
} else {
  echo "The start date is valid.";
}

//Check if end date is valid
$finishdate = strtotime($enddate);

if ($finishdate < $startingdate) {
  echo "The finish date must be after the start date.";
} else {
  echo "The finish date is valid.";
}

//Checking if club already exists in the table
$result = mysqli_query($conn, "SELECT * FROM clubs WHERE ClubName='$clubname'");
$rowcount = mysqli_num_rows($result);

$coordinates = getcoordinates($address);

$latitude =  $coordinates[0];
$longitude = $coordinates[1];

$isError = hasConflictingClubs($conn, $latitude, $longitude);
if ($isError) {
  echo "There was an error.";
}



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

function hasConflictingClubs($connection, $lat, $long) {
  // use dates to query draws table
  // use club info associated with active draws
  // get lat and long of each of these clubs
  // use $latitude and $longitude as origin
  // use draw clubs lat and longs as destination
  // make request to matrix api
  // filter results where distance < 20 miles
  // if results.length > 0, then conflicting draw is present
  // state name of club(s) that are already hosting draws

  $distanceMatrixApiUrl = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&key=AIzaSyA5kdoVwkdSvWyl30bYYROScoIVXQfy5d0&origins=$lat,$long&destinations=";
  $clubsWithActiveDrawsQuery = "SELECT Latitude, Longitude FROM clubs JOIN draws ON clubs.ID = draws.ClubID";
  $clubsWithActiveDrawsResult = mysqli_query($connection, $clubsWithActiveDrawsQuery);

   if (mysqli_num_rows($clubsWithActiveDrawsResult) > 0) {
    while ($row = mysqli_fetch_assoc($clubsWithActiveDrawsResult)) {
       $distanceMatrixApiUrl = $distanceMatrixApiUrl . $row['Latitude'] . "%2C" . $row['Longitude'] . "%7C";
     }
     print $distanceMatrixApiUrl;

     $distanceMatrixApiUrl = substr($distanceMatrixApiUrl, 0, strlen($distanceMatrixApiUrl) - 3);

     $arrContextOptions=array(
         "ssl"=>array(
             "verify_peer"=>false,
             "verify_peer_name"=>false,
         ),
     );

     $response = file_get_contents($distanceMatrixApiUrl, false, stream_context_create($arrContextOptions));

     $json = json_decode($response, TRUE);

     $allDestinations = $json['rows'][0]['elements'];

     $indexesOfBadClubs = array();

     for ($i = 0; $i < count($allDestinations); $i++) {
            $currentDestination = $allDestinations[$i];

            if ($currentDestination['distance']['value'] < 20000) {
                array_push($indexesOfBadClubs, $i);
            }
     }

     if (count($indexesOfBadClubs) > 0) {
       return true;
     } else {
       return false;
     }
   }

   return false;
 }

//Part 1
function buildUrl($lat, $long, $clubsWithActiveDraws) {
	$apiUrl = `https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&key=AIzaSyA5kdoVwkdSvWyl30bYYROScoIVXQfy5d0&origins=${lat},${long}&destinations=`;

	for ($i = 0; $i < count($clubsWithActiveDraws); $i++) {
    	$currentClub = $clubsWithActiveDraws[$i];

		$apiUrl += $currentClub.Latitude + '%2C' + $currentClub.Longitude + '%7C';
	}

	return $apiUrl.substring(0, count($apiUrl) - 3);
}

//PART 2
// function getClubsWithRange($allDestinations, $allowedRange) {
// 	$indexesOfBadClubs = [];
//

//
// 	return $indexesOfBadClubs;
// }
//
// $latitude = 500;
// $longitude = 250;
//
// $clubsWithActiveDraws = $clubsWithActiveDrawsResult; // query db using join statement in php code
//
// if ($clubsWithActiveDraws.length > 0) {
// 	$apiUrl = buildUrl($latitude, $longitude, $clubsWithActiveDraws);
//   $response = file_get_contents($apiUrl);; // this will be json
//   $json = json_decode($response, TRUE);
//
// 	$allDestinations = $response.rows[0].elements;
//
//     $clubsWithinRange = getClubsWithRange($allDestinations, 20000);
//
//     if ($clubsWithinRange.length > 0) {
//         echo "Other clubs within the surrounding area are already hosting a draw during these dates. Please select different dates.";
//     }
// }

?>
