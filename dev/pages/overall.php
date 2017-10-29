<!DOCTYPE html>
<html>
   <title>Overall Video Map </title>
   <head>
      <link type="text/css" rel="stylesheet" href="../resources/page.css">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBxBsDeD3NvcCOe2Nf-iWBkOI_xKtp5pkQ">

      <script  src="https://code.jquery.com/jquery-2.2.4.min.js"
              integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous">
        </script>

        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="js/app.js"></script>
        <script src="https://apis.google.com/js/client.js?onload=init"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js" type="text/javascript"></script>

        <script>
            $(function(){
                $('#left-nav').load('left-nav-pane.html');
            });

        </script>

    <script>


     function callYoutubeAPI(myLocation, radius){

        var loc =  myLocation;
        gapi.client.setApiKey("AIzaSyBuaj7JJIpuH9d2QJerAO_Vvq4z9iJrgWQ");
        gapi.client.load("youtube", "v3", function() {
            // yt api is ready
            getUserChannel(loc,radius);
        });

     }

     function getUserChannel(loc,rad){
       var loca = loc;
       var radius= rad.value;
       var address=document.getElementById("search");

        var request = gapi.client.youtube.search.list({
                part: "snippet",
                type: "video",
                q: address.value,
                location: loca,
                locationRadius: radius,
                maxResults: 10,
                order: "viewCount"
           });

        var videoIds;
        var videoDetailArray=[];
         request.execute(function(response) {
            var results = response.result;
            $("#results").html("");

            if(results.items.length != 0)
            {
                //try getiing lat-longs for videos
                videoIds = $.map(response.items, function(item) {
                   return item.id.videoId;
                 });

                 var request1 = gapi.client.youtube.videos.list({
                     // The 'id' property's value is a comma-separated string of video IDs.
                     id: videoIds.join(','),
                     part: 'id,snippet,recordingDetails'
                  });


                request1.execute(function(response2) {
                  if ('error' in response2) {
                    displayMessage(response2.error.message);
                  } else {
                    // Get the jQuery wrapper for the #video-list element before starting
                    // the loop.
                    var count=0;
                    $.each(response2.items, function(index,item) {
                      console.log(item);
                      var itemDetail= [item.id,item.snippet.title, item.recordingDetails.location.latitude, item.recordingDetails.location.longitude];
                      videoDetailArray[count]=itemDetail;
                      count++;
                    });

                    console.log(videoDetailArray);
                    VideoMapPlot(videoDetailArray);

                 }
               });
               //try-latlong-end
            }
            else{
              document.getElementById('results').innerHTML= "<h3>No Results Found !!</h3>";
            }
     });
   }
     function getGeometry(){

       var address=document.getElementById("geoLoc");

       geocode(address.value);

     }

    function geocode(addr)
    {
      var location=addr;
      axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
        params: {
          address: location,
          key: 'AIzaSyBwQMkFSYsWZ3Uled8_yW3DrXxOwh7R0kU'
        }
      }).then(function(response)
      {

        var formattedAddress=response.data.results[0].formatted_address;
        var formattedAddressOutput =`
        <ul class="list-group">
          <li class ="list-group-item"> <strong>formatted-address</strong>: ${formattedAddress} </li>
        </ul>
        `;

        var latitude=response.data.results[0].geometry.location.lat;
        var longitute=response.data.results[0].geometry.location.lng;

        var location1 = latitude + "," + longitute;

        var radius= document.getElementById("radius");

        callYoutubeAPI(location1,radius);


      }).
      catch(function(error)
      {
        console.log(error);
      })
    }


    function VideoMapPlot(videoDetailArray)
    {
          var map = new google.maps.Map(document.getElementById('map_canvas'), {
          zoom: 10,
          center: new google.maps.LatLng(videoDetailArray[0][2], videoDetailArray[0][3]),
          mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < videoDetailArray.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(videoDetailArray[i][2], videoDetailArray[i][3]),
        map: map
      });

      var infowindow = new google.maps.InfoWindow({
                    content: '<iframe title="YouTube video player" type="text/html" width=100%" height="100%" src="https://www.youtube.com/embed/'+videoDetailArray[i][0]+'" frameborder="0"></iframe>'
                });
              infowindow.open(map, marker);
      }

    }

    function clearResults()
    {
      document.getElementById('results').innerHTML= "";
      document.getElementById('map_canvas').innerHTML= "";
    }

</script>
   </head>


  <body>
  <div id="container">

        <div>
            <iframe id="header" src="./header.html" name="header" allowTransparency="true" scrolling="no" frameborder="0">
            </iframe>
        </div>

         <div class="gap">
         </div>
         <div class="gap">
         </div>

             <div id="left-nav"></div>

         <div style="height:400px;width:.4%;float:left;">
         </div>
  <div id="content">

    <div id="div-form">
                <p><font color="#400000"><b><a href="./index.php" class="a-no-deco">Home </a> > Overall Search</b></font>
                    <span id="titles">Search for Video Map</span>
                </p>

        <table id="data-table" class="table table-bordered">

               <form >
                 <table>

                   <tr>
                     <td><b><label><span class="madatory">*</span>Search Term</label> :</b></td>
                       <td><input type="text" name="search" id="search" placeholder="Search for ...." > &nbsp;&nbsp;<span class="madatory">*are mandatory fields</span></td>
                   </tr>

                   <tr>
                       <td><b><label><span class="madatory">*</span>Location</label> :</b></td>
                       <td><input type="text" id="geoLoc" name="geoLoc" placeholder="Street Name" required> &nbsp;&nbsp;<span class="madatory">*are mandatory fields</span></td>
                   </tr>

                   <tr>
                       <td><b><label><span class="madatory">*</span>Radius</label> :</b></td>
                       <td><input id="radius" type="text" name="radius" placeholder="Radius in km" ></td>
                    </tr>

                    <tr>
                       <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="submit" value="Search" onclick="getGeometry();"></td>
                       <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset" onclick="clearResults();"></td>
                    </tr>
                 </table>
               </form>


        </table>
        <div class="card-block" id="formatted-address"></div>
        <div class="card-block" id="geometry"></div>
        <div id="results"></div>

          <!-- #map_canvas {display:none;}-->
         <div id="map_canvas" style="width:650px; height:450px; margin-left:80px;" ></div>

    </div>
   </div>


    <div>
              <iframe id="footer" src="./footer.html" name="footer" allowTransparency="true" scrolling="no" frameborder="0">
              </iframe>
      </div>

  </div>

 </body>

</html>
