<html>
		
	<head>
		<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
		<link rel="manifest" href="site.webmanifest">
		<title>Train Game</title>
		<style>
			body { font-family: monospace }
			.tracklayout { position: relative }
			.trainlabel { background-color: white }
			.location1 { position: absolute; top: 56px; left: 40px }
			.location2 { position: absolute; top: 76px; left: 40px }
			.location3 { position: absolute; top: 96px; left: 40px }
			.location4 { position: absolute; top: 56px; left: 700px }
			.location5 { position: absolute; top: 96px; left: 700px }

			.location6 { position: absolute; top: 56px; left: 120px }
			.location7 { position: absolute; top: 76px; left: 120px }
			.location8 { position: absolute; top: 96px; left: 120px }
			.location9 { position: absolute; top: 56px; left: 780px }
			.location10 { position: absolute; top: 96px; left: 780px }
			
		</style>
		
		
	</head>
<body>
<form action="index.php" method="get">
<button type="submit" name="tps" value="1">1 train per siding</button>
<button type="submit" name="tps" value="2">2 trains per siding</button>
</form>

<?php

// print_r($_GET);

if (isset($_GET['debug'])) {
	$debug = true;
}

if (isset($_GET['tps'])) {
	$trains_per_siding = $_GET['tps'];
} else {
	$trains_per_siding = 1;
}

if (isset($_GET['wit'])) {
	$wagons_in_train = $_GET['wit'];
} else {
	$wagons_in_train = 5;
}

echo "<br>" . $trains_per_siding . " trains per siding";

$n = 1;
$trains = array('31110','58039','60070','37055','37419');
$wagons = array('1','2','3','4','5','6','7','8');
$locations = $trains_per_siding * 5;
$empties = $locations - count($trains);

echo "<br>" . $empties . " empty siding locations";

for ($c = 0; $c < $empties; $c ++) {
	array_push($trains, '-----');
}

echo "<br>";

if ($debug) {
	print_r($trains);
	echo "<br>";
}

shuffle($trains);
shuffle($wagons);

if ($debug) {
	print_r($trains);
	echo "<br>";
}



?>
<h2>Required Train Locations:</h2>
<div class="tracklayout">
<img src="loft6.jpg" />
<?php 

foreach($trains as $train) {
	//echo $loc;
	echo '<div class="trainlabel location' . $n . '">' . $train . '</div>'; 
	//echo " >> ";
	//echo $trains[$n];
	$n ++;

	//if($trains_per_siding == 2) {
		//echo " >> ";
		//echo $trains[$n];
//		$n ++;
//	}

	//echo "<br>";
	
}

?>



	
<?php
/*
		<div class="location1">1</div>
		<div class="location2">2</div>
		<div class="location3">3</div>
		<div class="location4">4</div>
		<div class="location5">5</div>
*/

?>

<h2>Train Formation:</h2>

<?php
	echo "Loco"; 
	for($w = 0; $w < $wagons_in_train; $w ++) {
			echo " + " . $wagons[$w];
	}

?>

</div>
</bopdy>
</html>



