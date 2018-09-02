
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
 		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
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
 		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 		<script type="text/javascript">

		var dd = new Date();
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
 		</script>
	</head>
	<body>
	</body>
	<script>
            
            if('serviceWorker' in navigator){
                navigator.serviceWorker.register('service-worker.js')
                .then(function(registration) {
                    console.log('Registration Completed: ', registration);
                })
                .catch(function(error) {
                    console.log('Registration Failed: '. error);
                });
            }
            if(navigator.onLine){
            	window.location.href = "apod.php/"+dddisp;
            }else{
            	window.location.href = "saved.php";
            }
        </script>
</html>