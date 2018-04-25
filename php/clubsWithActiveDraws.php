<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookingsdb";

//Data which we will need to GET
$startdate = $_GET['startdate'];
$enddate = $_GET['enddate'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//Will select those clubs which do not have conflicting draws
$clubsWithoutConflictingDrawsQuery = "SELECT draws.ClubID
                                      FROM draws JOIN clubs ON clubs.ID = draws.ClubID
                                      WHERE '$enddate' < draws.StartDate OR draws.EndDate < '$startdate'";
//If a club is not in the first query they will have a conflicting draw, those clubs will be in this query
$clubsWithConflictingDrawsQuery = "SELECT ClubName, Latitude, Longitude
                                   FROM clubs
                                   WHERE ID NOT IN ($clubsWithoutConflictingDrawsQuery)";

//These clubs will be added to an array
$clubsWithConflictingDraws = array();
if ($result = mysqli_query($conn, $clubsWithConflictingDrawsQuery)) {
    $tempArray = array();

    while($row = $result->fetch_object()) {
        $tempArray = $row;
        array_push($clubsWithConflictingDraws, $tempArray);
    }
    //Will change the SQL list from the query to JSON code
    header('Content-Type: application/json');
    echo json_encode($clubsWithConflictingDraws);
}

//Close connection
mysqli_close($conn);

?>
