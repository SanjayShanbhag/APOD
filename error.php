
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
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                <button class="w3-button w3-xlarge" style="color: #FAFAFA;" onclick="w3_open()">☰</button>
            </div>
            	<br>
            	<div class='container'>
            		<img src="images/error.png" style="width: 200px; height: 200px;" class="center-block">
                    <br><br>
                    <h1 style="text-align: center;"> Oops, there was an error! Check your internet connection and try again.</h1>
            	</div>
                <br><br>
            </div>
	</body>
</html>