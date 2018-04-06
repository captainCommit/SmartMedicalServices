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
								
				//$latitude=$_POST["LLAT"]; 
				//$longitude=$_POST["LLONG"];
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
					//$q2="SELECT * FROM HOSP WHERE ((LOCX-". $latitude.")*(LOCX-".$latitude ."))+((LOCY-". $longitude.")*(LOCY-". $longitude ."))<0.03";
					foreach($conn->query($q) as $row)
						echo $row["NAME"]."," . $row["DOC_COUNT"]."<input type='button' id='mapview' ".
							" name='mapview' value='SEE LOCATION IN MAP'><br><br>";
				}
	?>
</body>
</html>