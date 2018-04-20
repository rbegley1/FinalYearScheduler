$(document).ready(function(){
  $('#submitBtn').click(function() {
    var clubForm = {
      clubName: $('#clubName').val(),
      clubAddress: $('#clubAddress').val(),
      drawType: $("input[name=drawtype]:checked").val(),
      startDate: $('#startDate').val(),
      endDate: $('#endDate').val()
    };

      //var isValid = validateForm();
      // if (!isValid) { return; }

      getCoordinates(clubForm.clubAddress)
        .done(function(coords) {
          clubForm.latitude = getcoordinate(coords, 'lat');
          clubForm.longitude = getcoordinate(coords, 'lng');

          getClubsWithActiveDraws(clubForm)
            .done(function(clubsWithActiveDraws) {
              var url = buildUrl(clubForm, clubsWithActiveDraws);

              getDistancesBetweenClubs(url)
                .done(function(distances) {
                  var allowedDistance = 20000;

                  if (clubForm.drawType === 'Grand') {
                    allowedDistance = 50000;
                  }

                  if (!isAnyDistanceTooClose(distances, allowedDistance)) {
                    saveClub(clubForm)
                      .done(function() {
                        alert('club saved');
                      });
                  }
                });
            });
        });
  });
});

// function validateForm() {
//
// }

function getCoordinates(address) {
  return $.ajax({
    url: `https://maps.google.com/maps/api/geocode/json?sensor=false&key=AIzaSyA5kdoVwkdSvWyl30bYYROScoIVXQfy5d0&address=${address}`,
    method: 'GET'
  });
}

function getcoordinate(response, type) {
   return response.results[0].geometry.location[type];
}

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

function buildUrl(clubForm, clubsWithActiveDraws) {
  var url = `https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&key=AIzaSyA5kdoVwkdSvWyl30bYYROScoIVXQfy5d0&origins=${clubForm.latitude},${clubForm.longitude}&destinations=`;

  for(var i=0; i<clubsWithActiveDraws.length; i++) {
    var currentClub = clubsWithActiveDraws[i];
    url += currentClub.Latitude + '%2C' + currentClub.Longitude + '%7C';
  }

  return url.substring(0,url.length - 3);
}

function getDistancesBetweenClubs(url) {
  return $.ajax({
    url: url,
    method: 'GET'
  });
}

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
