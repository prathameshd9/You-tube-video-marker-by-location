<!DOCTYPE html>
<html>
   <title>AIS Project 1</title>
   <head>
      <link type="text/css" rel="stylesheet" href="../resources/page.css">
	  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

		  <script  src="https://code.jquery.com/jquery-2.2.4.min.js"
			  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous">
		</script>

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

      <div class="gap" > </div>
      <div class="gap"> </div>

  		 <div id="left-nav"></div>

       <div style="height:400px;width:.4%;float:left;"></div>


       <div id="content">
          <div id="div-form">
             <h2 align="center">AIS Project 2 </h2>
             <div class="gap"></div>
             <h2> Project Description</h2>
          </div>
       </div>

  		 <div>
  			<iframe id="footer" src="./footer.html" name="footer" allowTransparency="true" scrolling="no" frameborder="0">
  			</iframe>
  		</div>

    </div>
   </body>
</html>
