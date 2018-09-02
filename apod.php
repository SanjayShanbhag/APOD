<?php
	include_once(dirname(__FILE__) . "/colors.inc.php");
	$num_results = 20;
	$delta = 16;
	$reduce_brightness = 1;
	$reduce_gradients = 1;
	$ex=new GetMostCommonColors();
	function random_string($length) {
    	$key = '';
    	$keys = array_merge(range(0, 9), range('a', 'z'));
		for ($i = 0; $i < $length; $i++) {
        	$key .= $keys[array_rand($keys)];
    	}
		return $key;
	}
	function calculateColor($bgColor){
    	//ensure that the color code will not have # in the beginning
    	$bgColor = str_replace('#','',$bgColor);
    	//now just add it
    	$hex = '#'.$bgColor;
    	list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
    	$color = 1 - ( 0.299 * $r + 0.587 * $g + 0.114 * $b)/255;

    	if ($color < 0.5)
        	$color = '#000000'; // bright colors - black font
    	else
        	$color = '#FAFAFA'; // dark colors - white font

    	return $color;
	}
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    $url1 = trim(parse_url($url, PHP_URL_PATH), '/');
    $url1arr = explode("/", $url1);
    $id = $url1arr[2];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>NASA-APOD</title>
		<link rel="stylesheet" type="text/css" href="../CSS/style.css">
		<meta charset="utf-8">
        <link rel="manifest" href="../manifest.json">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    	<link rel="shortcut icon" type="image/x-icon" href="../favicon.png" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Chrome for Android theme color -->
        <meta name="theme-color" content="#000000">

        <!-- Add to homescreen for Chrome on Android -->
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="application-name" content="Astronomy Picture Of The Day">
        <link rel="icon" sizes="192x192" href="../favicon.png">

        <!-- Add to homescreen for Safari on iOS -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="Astronomy Picture Of The Day">
        <link rel="apple-touch-icon" href="../favicon.png">

        <!-- Tile for Win8 -->
        <meta name="msapplication-TileColor" content="#000000">
        <meta name="msapplication-TileImage" content="../favicon.png">
 		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
 		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../CSS/w3.css">
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
            da =  "<?php echo $id; ?>";
            function saveoff(da1){
                var url12 = "/NASA-APOD/apod.php/"+da;
                var CACHE_NAME = "version1";
                var db;
                var request1 = indexedDB.open("Apod",1);
                request1.onsuccess = function (evt) {
                    db = request1.result;
                    var request = db.transaction(["saveddate"], "readwrite")
                    .objectStore("saveddate")
                    .add({ saved: da1, created: new Date().getTime() });
                }
                document.getElementById('saved1').innerHTML = 'SAVED';
                document.getElementById('savebutton').setAttribute('onclick','');
                 caches.open(CACHE_NAME)
                .then(function(cache) {
                    cache.add(url12);
                });
            }
        </script>
        <script type="text/javascript">
        function oload(){
            var id20 = "<?php echo $id; ?>";
            var db;
            var request1 = indexedDB.open("Apod",1);
            request1.onsuccess = function (evt) {
                db = request1.result;
                var objectStore = db.transaction("saveddate").objectStore("saveddate");
                objectStore.openCursor().onsuccess = function(event) {
                    var cursor = event.target.result;
                    if (cursor) {
                        var urid = cursor.value.saved;
                        if(urid == id20){
                            document.getElementById('saved1').innerHTML = 'SAVED';
                            document.getElementById('savebutton').setAttribute('onclick','');
                        }
                        cursor.continue();
                    }
                }
            }
        }
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
                    window.location.href = '/NASA-APOD/apod.php/'+userdate;
                }
            }
        </script>
	</head>
	<body onload="oload()">

    <div id="loading-bg"></div>
    <img id="loading-image" src="../images/loader.gif" alt="">
<?php
		
			$url = "https://api.nasa.gov/planetary/apod?date=".$id."&api_key=sP615zYNgEyavuwmjvbKRjUH6NGbAkwlSGwdIYmO";
            $json = @file_get_contents($url,0,null,null);
            $result = json_decode($json,true);
            if($result['media_type'] != 'image'){
                echo '<script> location.replace("../mediaerror.php"); </script>';
                exit();
            }
            $img = $result['url'];
            $filename = random_string(15);
            $img1 = '/images/'.$filename;
            file_put_contents(dirname(__FILE__) . $img1, file_get_contents($img));
			$colors=$ex->Get_Color(dirname(__FILE__) . '/images/'.$filename, $num_results, $reduce_brightness, $reduce_gradients, $delta);
  			$counter = 0;
            foreach ($colors as $hex => $count) {
            	# code...
            	if($count > 0){
            	if($counter == 0){
            		$hex1 = $hex;
            		++$counter;
            		break;
            	}
            	}
            }
            unlink('images/'.$filename);
            echo "<div class='back' style='background-color: #".$hex1.";'>";
            $fcol = calculateColor($hex1);
            ?>
            <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none; background-color: #212121;" id="mySidebar">
                <button onclick="w3_close()" class="w3-bar-item w3-large" style="background-color: #212121; color: #FAFAFA;">Close &times;</button>
                <a href="../saved.php" class="w3-bar-item w3-button" style="color: #008B00;"><i class="fa fa-save"></i> Saved POD's</a>
                <a href="../about.php" class="w3-bar-item w3-button" style="color: #008B00;"><i class="fa fa-info-circle"></i> About</a>
                <div style="padding: 7px;">
                    <h4 style="color: #FAFAFA;">Select Date</h4>
                    <input type="date" class="w3-bar-item w3-input w3-white w3-mobile" id='hrll'>
                    <button class="w3-bar-item w3-button w3-mobile" style="background-color: #008B00; text-align: center; color: #FAFAFA;" onclick="hello()">Go</button>
                </div>
                <a href="https://sanjayshanbhag.github.io" style="color: #FAFAFA; bottom: 10px; font-size: 12px; position: fixed; padding: 7px; text-decoration: none;"><i class="fa fa-at"></i> Sanjay Shanbhag</a>
            </div>
            <div class="topbar" style="background-color: #<?php echo $hex1;?>">
                <button class="w3-button w3-xlarge" style="color: <?php echo $fcol; ?>" onclick="w3_open()">☰</button>
            </div>
            <?php
            	echo "<br>";
            	echo "<div class='container'>";
            		echo "<div class='row'>";
            			echo "<div class='col-sm-12 col-md-6 col-lg-6'>";
            				echo "<img src='".$img."' id='imge' style='width: 95%;' class='center-block imge'/>";
            			echo "</div>";
            			echo "<div class='col-sm-12 col-md-6 col-lg-6'>";
            				echo "<H2 style='color: ".$fcol.";'>".$result['title']."</H2>";
            				echo "<hr style='border-color: ".$fcol."'>";
            				echo "<p style='color: ".$fcol.";'>".$result['explanation']."</p>";
            				echo "<br><br>";
            				echo "<h3 style='color: ".$fcol."; text-align: center;'>".$result['date']."</h3>"; 
            				echo "<br><br>";
            				echo "<div style='text-align: center;'>";
            					echo "<button class='btn' onclick='saveoff(da)' style='background-color: #".$hex1."; border: solid; border-color: ".$fcol."; width: 100px;' id='savebutton'><span style='color: ".$fcol.";' id='saved1'>SAVE</span></button>";
            			echo "</div>";
            		echo "</div>";
            	echo "</div>";
                echo "<br><br>";
            echo "</div>";
            
		?>
        
		<div class="fab" onclick="randomAPOD()"> <i class="fa fa-calendar" ></i> </div>
	</body>
</html>