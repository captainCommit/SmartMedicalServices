<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style1.css" />
	<title>Your List of hospitals</title>
	
</head>
<body>
	
	
	<?php
				$servername = "localhost";
				$username = "root";
				$password = "rik_3209";
				
				
				$latitude=$_GET["LLAT"]; 
				$longitude=$_GET["LLONG"];
				
				echo "
					<style>
					  #map {
						position:center;
						height: 500px;
						width: 50%;
					   }
					</style>
					<div id='map'></div>
					
				" . "
				<script>
					  function initMap() {
						var uluru = {lat: ". 22.5 . " , lng: " . 88.5  . " };
						var map = new google.maps.Map(document.getElementById('map'), {
						  zoom: 11,
						  center: uluru
						}); ";
				try {
					$conn = new PDO("mysql:host=$servername;dbname=mydb", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				}
				catch(PDOException $e)
				{
					echo "Connection failed: " . $e->getMessage();
				}
				finally{
					$q='SELECT * FROM HOSP';
					$q2="SELECT * FROM HOSP WHERE ((LOCX-". $latitude.")*(LOCX-".$latitude ."))+((LOCY-". $longitude.")*(LOCY-". $longitude ."))<0.03";
					foreach($conn->query($q2) as $row)
						//echo $row["LOCX"]."&nbsp". $row["LOCY"]."<br>" ;
						//echo "<input type='hidden' id='lat'"">"
						
						echo "
							var marker = new google.maps.Marker({
								position: {lat: ". $row["LOCX"] . " , lng: " . $row["LOCY"]  . " },
								map: map
							}); " ;
				}
				echo "
					  }
					</script>
					<script async defer
					src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCevjjzQ5BNKk8HEE9iA3c3B4_YzSRJSm4&callback=initMap'>
					</script>
				"
	?>
	
</body>
</html>