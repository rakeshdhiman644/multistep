//     window.onload = function () {
    //     var postal = document.getElementById('address-3');
    //     var options = { types: ['(regions)'] }
    //     var autocomplete = new google.maps.places.Autocomplete(postal, options);
    // }
    var searchInput = 'address-3';

    $(document).ready(function () {
      var postal = document.getElementById('address-3');
      const options = {
        fields: ["address_components", "geometry", "icon", "name"],
        strictBounds: false,
        types: ["establishment"],
      };

      //var options = { types: ['(regions)'] }
      var autocomplete = new google.maps.places.Autocomplete(postal, options);
            // var autocomplete;
            // autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
            //     types: ['geocode'],
            // });

            google.maps.event.addListener(autocomplete, 'place_changed', function () {
              var near_place = autocomplete.getPlace();
              var lat = near_place.geometry.location.lat();
              var lng = near_place.geometry.location.lng();
              initMap(lat,lng)
              //console.log(near_place.geometry.location.lat());
              // console.log(near_place.address_components);
              // console.log(near_place.address_components[0].long_name);
              // console.log(near_place.address_components[2].long_name);
              // console.log(near_place.address_components[3].long_name);

                // document.getElementById('loc_lat').value = near_place.geometry.location.lat();
                // document.getElementById('loc_long').value = near_place.geometry.location.lng();

                // document.getElementById('latitude_view').innerHTML = near_place.geometry.location.lat();
                // document.getElementById('longitude_view').innerHTML = near_place.geometry.location.lng();
              });
          });


    function initMap(lat,lng) {
      const uluru = { lat: lat, lng: lng };
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 17,
        center: uluru,
        mapTypeId: 'satellite'
      });
      const marker = new google.maps.Marker({
        position: uluru,
        map: map,
      });
    }

    //window.initMap = initMap;