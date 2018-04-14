<form id='bookings' method="post" action="placeBooking.php">
  <label style="color:#FFFFFF" for="fname">Club Name:</label>
  <br>
  <input type="text" name="clubname" required>
  <br>
  <label style="color:#FFFFFF" for="fname">Club Address:</label>
  <br>
  <input type="text" name="address" placeholder="Enter address here.." required>
  <br>
  <!-- Email: <br> <input type="text" name="email" required>
  <br> -->
  <label style="color:#FFFFFF" for="fname">Draw Type:</label>
  <br>
  <input type="radio" name="drawtype" value="local" required>
  <label style="color:#FFFFFF" for="fname">Local</label>

  <input type="radio" name="drawtype" value="grand" required>
  <label style="color:#FFFFFF" for="fname">Grand</label>
  <br>
  <label style="color:#FFFFFF" for="fname">Start Date:</label>  <br>
  <input type="date" name="startdate" required>
  <br>
  <label style="color:#FFFFFF" for="fname">End Date:</label>
  <br>
  <input type="date" name="enddate" required>
  <br>
  <input type="submit" name="submitbutton" value="Place Booking">

</form>
