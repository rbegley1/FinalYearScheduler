$(document).ready(function(){

  initMap();

});

function initMap(){
  //Map options
  var options = {
    zoom: 9,
    center: {lat: 54.5943, lng: -6.9290}
  }
  //New map created
  var map = new google.maps.Map(document.getElementById('map'), options);

  //Create an array to hold markers
  var markers = [
    { coords : {lat: 54.5943, lng: -6.9290},
      content : '<h4>Pomeroy Plunketts</h4>'
    },

    { coords : {lat: 54.5949, lng: -7.0462},
      content : '<h4>Carrickmore</h4>'
    },

    { coords : {lat: 54.46275, lng: -7.02819},
      content : '<h4>Errigal Ciaran</h4>'
    },

    { coords : {lat: 54.5403, lng: -6.7022},
      content : '<h4>Coalisland</h4>'
    },

    { coords : {lat: 54.5137, lng: -7.4590},
      content : '<h4>Dromore</h4>'
    },

    { coords : {lat: 54.6207, lng: -6.5114},
      content : '<h4>Ardboe</h4>'
    },

    { coords : {lat: 54.5977, lng: -7.3100},
      content : '<h4>Omagh</h4>'
    },

    { coords : {lat: 54.5401, lng: -6.6500},
      content : '<h4>Clonoe</h4>'
    },

    { coords : {lat: 54.6094, lng: -7.2704},
      content : '<h4>Killyclogher</h4>'
    },

    { coords : {lat: 54.4517, lng: -7.4872},
      content : '<h4>Trillick</h4>'
    },

    { coords : {lat: 54.5311, lng: -6.8130},
      content : '<h4>Donaghmore</h4>'
    },

    { coords : {lat: 54.5300, lng: -6.7393},
      content : '<h4>Edendork</h4>'
    },

    { coords : {lat: 54.5378, lng: -6.8855},
      content : '<h4>Galbally</h4>'
    },

    { coords : {lat: 54.8274, lng: -7.4633},
      content : '<h4>Strabane</h4>'
    },

    { coords : {lat: 54.536175, lng: -6.609947},
      content : '<h4>Derrylaughan</h4>'
    },

    { coords : {lat: 54.6887, lng: -7.0755},
      content : '<h4>Greencastle</h4>'
    },

    { coords : {lat: 54.6800, lng: -7.7075},
      content : '<h4>Aghyaran</h4>'
    },

    { coords : {lat: 54.5083, lng: -6.7669},
      content : '<h4>Dungannon</h4>'
    },

    { coords : {lat: 54.4515, lng: -6.7944},
      content : '<h4>Eglish</h4>'
    },

    { coords : {lat: 54.4279, lng: -7.1323},
      content : '<h4>Augher</h4>'
    },

    { coords : {lat: 54.4466, lng: -6.6910},
      content : '<h4>Moy</h4>'
    },

    { coords : {lat: 54.6261, lng: -7.1101},
      content : '<h4>Loughmacrory</h4>'
    },

    { coords : {lat: 54.7183, lng: -7.2374},
      content : '<h4>Gortin</h4>'
    },

    { coords : {lat: 54.6461, lng: -6.8143},
      content : '<h4>Kildress</h4>'
    },

    { coords : {lat: 54.6418, lng: -6.7444},
      content : '<h4>Cookstown</h4>'
    },

    { coords : {lat: 54.7098, lng: -7.5937},
      content : '<h4>Castlederg</h4>'
    },

    { coords : {lat: 54.4755, lng: -7.2178},
      content : '<h4>Eskra</h4>'
    },

    { coords : {lat: 54.7162, lng: -7.3805},
      content : '<h4>Newtownstewart</h4>'
    },

    { coords : {lat: 54.5134, lng: -6.6329},
      content : '<h4>Derrytresk</h4>'
    },

    { coords : {lat: 54.4968, lng: -7.3146},
      content : '<h4>Fintona</h4>'
    },

    { coords : {lat: 54.4143, lng: -7.1645},
      content : '<h4>Clogher</h4>'
    },

    { coords : {lat: 54.5504, lng: -7.1606},
      content : '<h4>Beragh</h4>'
    },

    { coords : {lat: 54.4873, lng: -6.8944},
      content : '<h4>Kileeshil</h4>'
    },

    { coords : {lat: 54.6153, lng: -7.4889},
      content : '<h4>Drumquin</h4>'
    }
  ];

  //Loop through markers
  for(var i = 0; i< markers.length; i++){
    addMarker(markers[i]);
  }

  //Add marker function
  function addMarker(props){
    var marker = new google.maps.Marker({
      position: props.coords,
      map: map
    });

  if(props.content){
    var infoWindow = new google.maps.InfoWindow({
      content: props.content
    });

    marker.addListener('click', function(){
      infoWindow.open(map, marker);
    });
  }

  }
}
