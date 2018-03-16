<form id='bookings' method="post" action="placeBooking.php">
  Club Name: <br> <input type="text" name="clubname" required>
  <br>
  County: <br> <input type="text" name="county" required>
  <br>
  Club Address: <br> <input type="text" name="address" placeholder="Enter address here.." required>
  <br>
  Email: <br> <input type="text" name="email" required>
  <br>
  Draw Type: <br> <input type="radio" name="drawtype" value="local" required> Local
             <input type="radio" name="drawtype" value="grand" required> Grand
  <br>
  Start Date: <br> <input type="date" name="startdate" required>
  <br>
  End Date: <br> <input type="date" name="enddate" required>
  <br>
  <input type="submit" name="submitbutton" value="Place Booking">

</form>

  <!-- Queries -->
