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

$sql = "INSERT INTO clubs (ClubName, Address)/*, Email, DrawType, StartDate, EndDate*/
VALUES ('$clubname', '$address')";/*, '$email', '$drawtype', '$startdate', '$enddate'*/


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO draws (ClubID, DrawType, StartDate, EndDate)
VALUES (1, '$drawtype', '$startdate', '$enddate')";

$conn->query($sql);


$conn->close();
?>
