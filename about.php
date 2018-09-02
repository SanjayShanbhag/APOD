
<!DOCTYPE html>
<html>
	<head>
		<title>NASA-APOD</title>
		<link rel="stylesheet" type="text/css" href="CSS/style.css">
		<meta charset="utf-8">
        <link rel="manifest" href="manifest.json">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    	<link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!-- Chrome for Android theme color -->
        <meta name="theme-color" content="#000000">

        <!-- Add to homescreen for Chrome on Android -->
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="application-name" content="Astronomy Picture Of The Day">
        <link rel="icon" sizes="192x192" href="favicon.png">

        <!-- Add to homescreen for Safari on iOS -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="Astronomy Picture Of The Day">
        <link rel="apple-touch-icon" href="favicon.png">

        <!-- Tile for Win8 -->
        <meta name="msapplication-TileColor" content="#000000">
        <meta name="msapplication-TileImage" content="favicon.png">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
 		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="CSS/w3.css">
 		<style type="text/css">
 			@media screen and (max-width: 900px){
            img.imge{
                height: 250px;
            }

        }
 		</style>
        <script type="text/javascript">
            $(function() {
                $('#loading-bg').hide();
                $('#loading-image').hide();

                $(window).on('beforeunload', function() {
                    $('#loading-bg').show();
                    $('#loading-image').show();
                });
            });
        </script>
        <script>
            function w3_open() {
                document.getElementById("mySidebar").style.display = "block";
            }
            function w3_close() {
                document.getElementById("mySidebar").style.display = "none";
            }
        </script>
        <script type="text/javascript">
            function randomDate(start, end) {
                return new Date(start.getTime() + Math.random() * (end.getTime() - start.getTime()));
            }
            function randomAPOD(){
                var dd = randomDate(new Date(1996, 0, 1), new Date());
                dd = dd.toString().split(" ");
                var month = dd[1];
                if(month == 'Jan')
                    month = '01';
                if(month == 'Feb')
                    month = '02';
                if(month == 'Mar')
                    month = '03';
                if(month == 'Apr')
                    month = '04';
                if(month == 'May')
                    month = '05';
                if(month == 'Jun')
                    month = '06';
                if(month == 'Jul')
                    month = '07';
                if(month == 'Aug')
                    month = '08';
                if(month == 'Sep')
                    month = '09';
                if(month == 'Oct')
                    month = '10';
                if(month == 'Nov')
                    month = '11';
                if(month == 'Dec')
                    month = '12';
                var day = dd[2];
                var year = dd[3];
                var dddisp = year + '-' + month + '-' + day;
                window.location.href= '/NASA-APOD/apod.php/'+dddisp;
            }
        </script>
        <script type="text/javascript">
            function hello(){
                var userdate = document.getElementById('hrll').value;
                if(userdate != ''){
                    window.location.href = 'apod.php/'+userdate;
                }
            }
        </script>
	</head>
	<body>

    <div id="loading-bg"></div>
    <img id="loading-image" src="images/loader.gif" alt="">
            <div class='back' style='background-color: #000000;'>
            <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none; background-color: #212121;" id="mySidebar">
                <button onclick="w3_close()" class="w3-bar-item w3-large" style="background-color: #212121; color: #FAFAFA;">Close &times;</button>
                <a href="saved.php" class="w3-bar-item w3-button" style="color: #008B00;"><i class="fa fa-save"></i> Saved POD's</a>
                <a href="about.php" class="w3-bar-item w3-button" style="color: #008B00;"><i class="fa fa-info-circle"></i> About</a>
                <div style="padding: 7px;">
                    <h4 style="color: #FAFAFA;">Select Date</h4>
                    <input type="date" class="w3-bar-item w3-input w3-white w3-mobile" id='hrll'>
                    <button class="w3-bar-item w3-button w3-mobile" style="background-color: #008B00; text-align: center; color: #FAFAFA;" onclick="hello()">Go</button>
                </div>
                <a href="https://sanjayshanbhag.github.io" style="color: #FAFAFA; bottom: 10px; font-size: 12px; position: fixed; padding: 7px; text-decoration: none;"><i class="fa fa-at"></i> Sanjay Shanbhag</a>
            </div>
            <div class="topbar" style="background-color: #000000;">
                <button class="w3-button w3-xlarge" style="color: #FAFAFA;" onclick="w3_open()"><i class="fa fa-bars"></i></button>
            </div>
            	<br>
            	<div class='container'>
            		<br>
                    <h3 style="color: #90A4AE;">Astronomy Picture Of The Day</h3>
                    <p style="color: #9E9E9E;">"(APOD) is originated, written, coordinated, and edited since 1995 by Robert Nemiroff and Jerry Bonnell. The APOD archive contains the largest collection of annotated astronomical images on the internet."</p>
                    <p style="color: #9E9E9E;">"All the images on the APOD page are credited to the owner or institution where they originated. Some of the images are copyrighted and to use these pictures publicly or commercially one must write to the owners for permission. For the copyrighted images, the copyright owner is identified in the APOD credit line (please see the caption under the image), along with a hyperlink to the owner's location."</p>
                    <p style="color: #90A4AE; float: right;">-Official NASA APOD Website</p>
                    <br><br>
                    <h3 style="color: #90A4AE;">About Application</h3>
                    <p style="color: #9E9E9E;">This is a Progressive Web Application. This application shows you the latest(today's) Astronomy Picture Of The Day from the official NASA-APOD site. You can also click on the floating button on the bottom-right to see a random APOD.</p>
                    <p style="color: #9E9E9E;">You can select a particular date from the sidebar to view the APOD from a specific date.</p>
                    <p style="color: #9E9E9E;">Something catches your eye? Click on the "Save" button to save it for offline access. When Using on a mobile device click on the "Add to Homescreen" button when prompted to install this application onto your device and use it just like a native application.</p>
                    <br><br>
                    <p style="color: #90A4AE;">The Official Site can be visited here: <a style="text-decoration: none;" href="https://apod.nasa.gov">APOD</a></p>
                    <br>
                    <p style="color: #90A4AE;">Note: This application does not own any images or written content. All of these are fetched from the official APOD system. To use any of these, please refer to the above written statement or visit the official page for better clarity.</p>
            	</div>
                <br><br>
            </div>
            <div class="fab" onclick="randomAPOD()"> <i class="fa fa-calendar" ></i> </div>
	</body>
</html>