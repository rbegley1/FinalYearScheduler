<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookingsdb";

$startdate = $_GET['startdate'];
$enddate = $_GET['enddate'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// run the above queries
// convert each result to an array of the club IDs
// if a club id exists in either list, then it has conflicting draw dates
// run below query to retrieve latitude and longitude of any club that appears in either list
// $clubsWithConflictingDraws = array();
// while($row = mysqli_fetch_array($queryOutsideDates, MYSQLI_NUM)){
//     $clubsWithConflictingDraws[] = intval($row[0]);
// }
$clubsWithoutConflictingDrawsQuery = "SELECT draws.ClubID FROM draws JOIN clubs ON clubs.ID = draws.ClubID WHERE '$enddate' < draws.StartDate OR draws.EndDate < '$startdate'";
$clubsWithConflictingDrawsQuery = "SELECT ClubName, Latitude, Longitude FROM clubs WHERE ID NOT IN ($clubsWithoutConflictingDrawsQuery)";

$clubsWithConflictingDraws = array();
if ($result = mysqli_query($conn, $clubsWithConflictingDrawsQuery)) {
    $tempArray = array();

    while($row = $result->fetch_object()) {
        $tempArray = $row;
        array_push($clubsWithConflictingDraws, $tempArray);
    }

    header('Content-Type: application/json');
    echo json_encode($clubsWithConflictingDraws);
}

mysqli_close($conn);
?>
