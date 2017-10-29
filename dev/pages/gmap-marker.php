<!DOCTYPE html>
<html>
   <title>GeoMap Video Marker </title>
   <head>


<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBxBsDeD3NvcCOe2Nf-iWBkOI_xKtp5pkQ"></script>


      <link type="text/css" rel="stylesheet" href="../resources/page.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

      <script  src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
      $(function(){
        $('#left-nav').load('left-nav-pane.html');
      });


     function displayMap() {
                    document.getElementById('map_canvas').style.display="block";
                    MapCanvas();
                }
         function MapCanvas() {

                  //getting the value from the user
                  var Vtitle = document.getElementById('vtitle').value;
                  var Vlatitude = document.getElementById('vlat').value;
                  var Vlongitude = document.getElementById('vlong').value;
                  var V_ID=document.getElementById('vID').value;

                  alert(Vlatitude+Vlongitude+Vtitle+V_ID);

                latlng = new google.maps.LatLng(Vlatitude,Vlongitude);
                myOptions = {
                  zoom: 10,
              center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
             };
                    map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
                    var point = new google.maps.LatLng(Vlatitude,Vlongitude);
              var marker = new google.maps.Marker({
            position: point,
           map: map
            })

              var infowindow = new google.maps.InfoWindow({
                    content: '<iframe title="YouTube video player" type="text/html" width="100%" height="100%" src="https://www.youtube.com/embed/'+V_ID+'?autoplay=1" frameborder="0"></iframe>'


                });
              infowindow.open(map, marker);

                 }
    </script>
   </head>
   <body">
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

        <p><font color="#400000"><b><a href="./index.php" class="a-no-deco">Home </a> > GeoMap Marker</b></font>
          <span id="titles">A Video-Map</span>
        </p>

        <table id="data-table" class="table table-bordered">

               <form>
                 <table>
                 <tr>
                       <td><b><label><span class="madatory">*</span>VideoID</label> :</b></td>
                       <td><input type="text" name="title" id="vID" required> &nbsp;&nbsp;<span class="madatory">*are mandatory fields</span></td>
                   </tr>
                   <tr>
                       <td><b><label><span class="madatory">*</span>Title</label> :</b></td>
                       <td><input type="text" name="title" id="vtitle" required></td>
                   </tr>
                   <tr>
                       <td><b><label><span class="madatory">*</span>Longitude</label> :</b></td>
                       <td><input type="text" name="long" id="vlong" required></td>
                   </tr>
                   <tr>
                       <td><b><label><span class="madatory">*</span>Latitude</label> :</b></td>
                       <td><input type="text" name="lat" id="vlat" required></td>
                   </tr>
                    <tr>
                       <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="submit" value="Search" onclick="displayMap();"></td>
                       <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset"></td>
                    </tr>


                 </table>
               </form>

            </table>

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
