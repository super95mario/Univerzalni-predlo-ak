<?php 
	print '
	<ul>
		<li><a href="index.php?menu=1">Home</a></li>
		<li><a href="index.php?menu=2">News</a></li>
		<li><a href="index.php?menu=3">Contact</a></li>
		<li><a href="index.php?menu=4">About</a></li>';
		if (!isset($_SESSION['user']['valid']) || $_SESSION['user']['valid'] == 'false') {
			print '
			<li><a href="index.php?menu=5">Register</a></li>
			<li><a href="index.php?menu=6">Sign In</a></li>';
		}
		else if ($_SESSION['user']['valid'] == 'true') {
			print '
			<li><a href="index.php?menu=7">Admin</a></li>
			<li><a href="signout.php">Sign Out</a></li>';
		}
		print '
	</ul>';
	$json = file_get_contents('https://api.openweathermap.org/data/2.5/weather?q=London,uk&appid=b0e567263442eaf3549f40c802191bb9&units=metric');


$json_data = json_decode($json,true);
	print '
	<div class="cities">
		<div class="city">
			<div class="left-side">
			    <h2 class="city-name" data-id="'.$json_data["id"].'" data-name="'.$json_data["name"].','.$json_data["sys"]["country"].'">
			        <span>'.$json_data["name"].'</span>
			        <sup>'.$json_data["sys"]["country"].'</sup>
			    </h2>
			    <div class="city-temp">'.$json_data["main"]["temp"].'<sup>°C</sup></div>
			</div>
		    <div class="right-side">			    
		        <img class="city-icon" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/'.$json_data["weather"]["0"]["icon"].'.svg" alt="'.$json_data["weather"]["0"]["main"].'">
		        <figcaption>'.$json_data["weather"]["0"]["description"].'</figcaption>	    
			</div>
		</div>
	</div>';
?>