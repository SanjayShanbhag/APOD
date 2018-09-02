
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
            var db;
            var request1 = indexedDB.open("Apod",1);
            request1.onsuccess = function (evt) {
                db = request1.result;
                var counter = 0;
                var objectStore = db.transaction("saveddate").objectStore("saveddate");
                var count = objectStore.count();
                count.onsuccess = function() {
                    var totresults = count.result;
                    if(totresults == 0){
                        var parentDiv = document.getElementById('content');
                        var d = document.createElement("H4");
                        var d1 = document.createTextNode("You have not saved any Picture of the day's! Do come back here when you have saved some.")
                        d.appendChild(d1);
                        parentDiv.appendChild(d);
                    }
                }
                objectStore.openCursor().onsuccess = function(event) {
                    var cursor = event.target.result;
                    if (cursor) {
                        var date1 = cursor.value.saved;
                        var url = "/NASA-APOD/apod.php/"+date1;
                        var ul = document.createElement('UL');
                        var li = document.createElement('LI');
                        var anchor = document.createElement("A");
                        anchor.setAttribute("href", url);
                        anchor.style.color = '#FAFAFA';
                        var d1 = document.createTextNode(date1);
                        anchor.appendChild(d1);
                        anchor.style.textDecoration = 'none';
                        li.appendChild(anchor);
                        ul.appendChild(li);
                        var parent = document.getElementById('content');
                        parent.appendChild(ul);
                        cursor.continue();
                    }
                    else {
                        //console.log("No more entries!");
                    }
                };
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
            <div class='back' style='background-color: #212121;'>
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
            	<div class='container' id="content">
            		<h2 style="color: #FAFAFA;"> Saved POD'S </h2>
                    <br>
            	</div>
                <br><br>
            </div>
            <div class="fab" onclick="randomAPOD()"> <i class="fa fa-calendar" ></i> </div>
	</body>
</html>