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


$result = mysqli_query($conn, "SELECT * FROM clubs WHERE ClubName='$clubname'");
$rowcount = mysqli_num_rows($result);

if($rowcount > 0) {
  mysqli_query($conn, "UPDATE clubs SET Address= '$address' WHERE ClubName='$clubname'");
}
else {
  mysqli_query($conn, "INSERT INTO clubs(ClubName, Address) VALUES ('$clubname', '$address')");
}

//If row exists select for form, if not insert to clubs table

 if ($rowcount === 0) {
    echo "New record created successfully";
  } else {
      echo "The record has been updated";
    }

$sql = "INSERT INTO draws (ClubID, DrawType, StartDate, EndDate)
VALUES ('$conn->insert_id', '$drawtype', '$startdate', '$enddate')";

$conn->query($sql);


$conn->close();
?>
