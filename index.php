<?php

	$submited = false;
	$error = false;
	// Form Submission
	if(isset($_POST["submit"])){
		if(isset($_POST["mailId"]))
		{
			$email = $_POST["mailId"];
			include "config.php";
	
			if(!exists($email))
				execute("Insert into subscribers (Field02) values ('$email')");
			else {
				echo "Already Subscribed"; 
				$error = true;
			}
			
			close();
	
			$submited = true;
		}
	}

	if(!$error)
		if($submited)
			echo "<p>Successfull</p>";
		else
			echo "<p>Please Submit a form</p>";

	// UI
	require 'home.html';

	require 'randomComic.php';

	echo '<h2> You will receive random comics as below :</h2>';
	echo getComic();
?>