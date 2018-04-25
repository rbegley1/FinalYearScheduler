$(document).ready(function(){
  //On submit the system will do the following
  $('#submitBtn').click(function() {
    var clubForm = {
      clubName: $('#clubName').val(),
      clubAddress: $('#clubAddress').val(),
      drawType: $("input[name=drawtype]:checked").val(),
      startDate: $('#startDate').val(),
      endDate: $('#endDate').val()
    };

    var errors = validateForm(clubForm);
    //If any date errors, sweet alert will show.
    //If not the rest of the functions will be called unless an error is hit.
    if (errors.length > 0) {
      //Display errors
      swal({
        type: 'error',
        title: 'Invalid Date',
        text:  'The date you have entered is either in the past or end date is before start date.'
       })
    } else {
      //Gets inserted clubs coordinates.
      getCoordinates(clubForm.clubAddress)
        .done(function(coords) {
          clubForm.latitude = getcoordinate(coords, 'lat');
          clubForm.longitude = getcoordinate(coords, 'lng');
          //Checks for clubs with active draws on the same dates.
          getClubsWithActiveDraws(clubForm)
            .done(function(clubsWithActiveDraws) {
              //If there are no clubs with active draws, the club will be saved.
              if (clubsWithActiveDraws.length === 0) {
                saveClub(clubForm)
                  .done(function() {
                    swal({
                      type: 'success',
                      title: 'Congratulations!',
                      text: 'Your booking has been successful.' +
                            'Good luck with your fundraising.'
                    })
                  });
              }
              //If there is a club with an active draw, continue to do the following.
              else {

              var url = buildUrl(clubForm, clubsWithActiveDraws);
              //Gets distance between origin club and the other clubs with draws on those dates.
              getDistancesBetweenClubs(url)
                .done(function(distances) {
                  //If local this will be the value
                  var allowedDistance = 20000;

                  //If grand this will be the value
                  if(document.getElementById('grand').checked) {
                    allowedDistance = 50000;
                  }

                  //If there is no distance which is too close, then the club and draw can be saved.
                  if (!isAnyDistanceTooClose(distances, allowedDistance)) {
                    saveClub(clubForm)
                      .done(function() {
                        swal({
                          type: 'success',
                          title: 'Congratulations!',
                          text: 'Your booking has been successful. Good luck with your fundraising.'
                        })
                      });
                  //If there is a club which conflicts then other dates must be chosen
                  } else {
                    swal({
                      type: 'error',
                      text: 'Another club within your area has already booked a draw on this date. Pleases choose different dates.',
                      showConfirmButton: false,
                      timer: 3000
                    })
                  }
                });
              }
            });
        });
    }
  });
});
  //Validation function for form
  function validateForm(clubForm) {
    var errors = [];

    //If start date is before today, return error.
    if (moment(clubForm.startDate).isBefore(moment())) {
       errors.push('Start date must be in the future');
    }
    //If start date is after end date, return error.
    if (moment(clubForm.startDate).isAfter(clubForm.endDate)) {
      errors.push('Start date must be before end date');
    }

    return errors;
  }

//Function calls the API to get the Latitude and Longitude of the inserted club.
function getCoordinates(address) {
  return $.ajax({
    url: `https://maps.google.com/maps/api/geocode/json?sensor=false&key=AIzaSyA5kdoVwkdSvWyl30bYYROScoIVXQfy5d0&address=${address}`,
    method: 'GET'
  });
}

//Returns the Latitude and Longitude as two separate variables.
function getcoordinate(response, type) {
   return response.results[0].geometry.location[type];
}

//Gets the clubs with active draws in table.
//The result here will vary based on dates and draw type chosen.
function getClubsWithActiveDraws(clubForm) {
  return $.ajax({
    url: 'php/clubsWithActiveDraws.php',
    method: 'GET',
    data: {
      startdate: clubForm.startDate,
      enddate: clubForm.endDate
    }
  });
}

//This function builds the URL with the origin address and any club with an active draw in the table.
function buildUrl(clubForm, clubsWithActiveDraws) {
  var url = `https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&key=AIzaSyA5kdoVwkdSvWyl30bYYROScoIVXQfy5d0&origins=${clubForm.latitude},${clubForm.longitude}&destinations=`;

  for(var i=0; i<clubsWithActiveDraws.length; i++) {
    var currentClub = clubsWithActiveDraws[i];
    url += currentClub.Latitude + '%2C' + currentClub.Longitude + '%7C';
  }

  return url.substring(0,url.length - 3);
}

//This will query the distance between clubs and returns this list after calling the Distance Matrix API.
function getDistancesBetweenClubs(url) {
  return $.ajax({
    url: url,
    method: 'GET'
  });
}

//With the list of clubs returned this will create a list of the clubs which infringe on the boundaries of the draw being booked.
//If there are any draws too close and error will be shown, if not the draw will be booked.
function isAnyDistanceTooClose(response, allowedDistance) {
  var allDestinations = response.rows[0].elements;

  for (i=0; i < allDestinations.length; i++) {
    var currentDestination = allDestinations[i];

    if (currentDestination.distance.value < allowedDistance) {
          return true;
    }
  }

  return false;
}

//If the booking passes all other verification then the booking will be posted to the database here.
function saveClub(clubForm) {
  return $.ajax({
    url: 'php/placeBooking.php',
    method: 'POST',
    data: {
      clubname: clubForm.clubName,
      address: clubForm.clubAddress,
      drawtype: clubForm.drawType,
      startdate: clubForm.startDate,
      enddate: clubForm.endDate,
      latitude: clubForm.latitude,
      longitude: clubForm.longitude
    }
  });
}
