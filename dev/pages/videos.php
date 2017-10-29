<!DOCTYPE html>
<html>
   <title>Youtube WS search engine </title>
   <head>
      <link type="text/css" rel="stylesheet" href="../resources/page.css">
	  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

      <script  src="https://code.jquery.com/jquery-2.2.4.min.js"
			  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous">
		</script>

	  	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="js/app.js"></script>
        <script src="https://apis.google.com/js/client.js?onload=init"></script>

		<script>
			$(function(){
				$('#left-nav').load('left-nav-pane.html');
			});
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

				<p><font color="#400000"><b><a href="./index.php" class="a-no-deco">Home </a> > Youtube</b></font>
					<span id="titles">YouTube Web Service</span>
				</p>

        <table id="data-table" class="table table-bordered">

               <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                 <table>
                   <tr>
                       <td><b><label><span class="madatory">*</span>Keyword</label> :</b></td>
                       <td><input type="text" name="search" id="search" placeholder="Search for ...." required> &nbsp;&nbsp;<span class="madatory">*are mandatory fields</span></td>
                   </tr>
                   <tr>
                       <td><b><label>Latitude</label> :</b></td>
                       <td><input type="text" name="lat" id="lat" placeholder="ex. " ></td>
                   </tr>
                   <tr>
                       <td><b><label>Longitude</label> :</b></td>
                       <td><input type="text" name="long" id="long" placeholder="ex. "></td>
                   </tr>
                    <tr>
                       <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Search"></td>
                       <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset"></td>
                    </tr>
                 </table>
               </form>

        </table>
	<div id="results" class="video-container"></div>
    </div>
   </div>

    <div>
  			<iframe id="footer" src="./footer.html" name="footer" allowTransparency="true" scrolling="no" frameborder="0">
  			</iframe>
  	</div>

  </div>

 </body>
</html>
