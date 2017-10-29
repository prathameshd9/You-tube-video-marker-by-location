<!DOCTYPE html>
<html>
   <title>Geo Map Encoder</title>
   <head>
      <link type="text/css" rel="stylesheet" href="../resources/page.css">
	  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


      <script  src="https://code.jquery.com/jquery-2.2.4.min.js"
			  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous">
		</script>

    <script src="https://unpkg.com/axios/dist/axios.min.js" type="text/javascript"></script>

		<script>
			$(function(){
				$('#left-nav').load('left-nav-pane.html');
			});

		</script>

       <script>


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

        var geometryOutput=`
        <ul class="list-group">
          <li class="list-group-item">
            <strong>Latitude</strong>:${latitude}
          </li>
          <li class="list-group-item">
            <strong>Longitude</strong>:${longitute}
          </li>
        </ul>

        `;

        document.getElementById('formatted-address').innerHTML=formattedAddressOutput;
        document.getElementById('geometry').innerHTML=geometryOutput;

        //document.getElementsById('geometry').innerHTML=response.data.results[0].geometry.location.lat;


      }).
      catch(function(error)
      {
        console.log(error);
      })
    }
  function getGeometry()
  {

    var address=document.getElementById("geoLoc");

    geocode(address.value);

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
				<p><font color="#400000"><b><a href="./index.php" class="a-no-deco">Home </a> > GeoMap Encode</b></font>
					<span id="titles">Get Location Info</span>
				</p>

        <table id="data-table" class="table table-bordered">

               <form >
                 <table>
                   <tr>
                       <td><b><label><span class="madatory">*</span>Location</label> :</b></td>
                       <td><input type="text" id="geoLoc" name="geoLoc" placeholder="Street Name" required> &nbsp;&nbsp;<span class="madatory">*are mandatory fields</span></td>
                   </tr>
                    <tr>
                       <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="submit" value="Search" onclick="getGeometry();"></td>
                       <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset"></td>
                    </tr>
                 </table>
               </form>


        </table>
        <div class="card-block" id="formatted-address"></div>
        <div class="card-block" id="geometry"></div>


    </div>
   </div>


    <div>
  			<iframe id="footer" src="./footer.html" name="footer" allowTransparency="true" scrolling="no" frameborder="0">
  			</iframe>
  	</div>

  </div>

 </body>

</html>
