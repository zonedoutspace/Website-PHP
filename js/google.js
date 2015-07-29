
      //function initialize() {
        //var mapCanvas = document.getElementById('map-canvas');
        //var mapOptions = {
          //center: new google.maps.LatLng(-17.7714, 178.7018),
          //zoom: 8,
         // mapTypeId: google.maps.MapTypeId.ROADMAP
       // }
       // var map = new google.maps.Map(mapCanvas, mapOptions)
      //}
     // google.maps.event.addDomListener(window, 'load', initialize);
     
     function initialize() {
  var myLatlng = new google.maps.LatLng(-17.7000, 181.4324);
  var mapOptions = {
    zoom: 8,
    scrollwheel: false,
    
    center: myLatlng
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  
  

  /*var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">Nadi</h1>'+
      '<div id="bodyContent">'+    
      
      '<p>Most travellers go to <b>Nadi</b> (nan-di) twice, whether they like it or not: once on the way in and once on the way out. ' +
     ' Its indecently warm air slaps you in the face when you first step from the plane and its airport is the last place to buy ' +
      'sunburn remedies before heading home. For some, two times is twice too often and many people aim to minimise their Nadi ' +
      'exposure to the briefest time possible. Others pause long enough to make the most of the infrastructure before heading out ' +
      'to more picturesque locales. Not that this bothers Nadi. The shops, restaurants, cafes and tour operators strung along Main St ' +
      'can make a decent living from the plane loads of arriving and departing tourists. ' +
	  'Nadi is something of a perennial adolescent in constant pursuit of an identity, not quite sure whether it’s a city, tourist ' +
	  'junction or business hub. There are no must-sees in the city itself, but there are interesting possibilities in the surrounding areas. ' +
	  'Sugar-city Lautoka is just to the north and the lush Sabeto Mountains hug Nadi’s perimeter, while gorgeous Natadola Beach, ' +
	  'the many Mamanuca islands and ancient cultural sites around Sigatoka are all within striking distance.</p> ' +

	  '<p><a href="http://www.lonelyplanet.com/fiji/viti-levu/nadi#ixzz3ZhZfrX3a">Read More:</a></p> ' +        
      
      '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Fiji'
  });
  
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
  */
}

google.maps.event.addDomListener(window, 'load', initialize);

