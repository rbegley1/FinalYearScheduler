<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookingsdb";

$clubname = $_POST['clubname'];
$county = $_POST['county'];
$address = $_POST['address'];
$email = $_POST['email'];
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO bookings (ClubName, County, Address, Email, StartDate, EndDate)
VALUES ('$clubname', '$county', '$address', '$email', '$sdate', '$enddate')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>