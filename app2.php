<?php
	//requier another php file
	require_once("../../config.php");
	
	$everything_was_okay = true;
	
 
	//check if there is variable in the URL
	if(isset($_GET["message"])){
		
		//only if there is message in the URL
		//echo "there is message"

		//if its empty
		if(empty($_GET["message"])){
			$everything_was_okay = false;
				//it is empty
			echo "Please enter the message! <br>";
	}else{
		//its not empty
		echo "Message:".$_GET["message"]."<br>";
	}
	}else{
		echo "theres no such thing as message";
	}
			$everything_was_okay = false; 
			
			
	//to field validation 
	if(isset($_GET["to"])){
		if(empty($_GET["to"])){
		echo "Please enter the recipient! <br>";
	}else{
		echo "To: ".$_GET["to"]."<br>";
		}
	}
	
	//from field 
	if(isset($_GET["from"])){
		if(empty($_GET["from"])){
		echo "Please enter the third one! <br>";
	}else{
		echo "From: ".$_GET["from"]."<br>";
		}
	}
		
	/********
	***SAVE TO DB***
	**********/
	
	//?was everything okay
	if($everything_was_okay == true) {
	
		echo "Saving to database...";
		
		
		//connection with username and password
		//access username from config
		//echo $db_username;
		
	//1 servername
	//2 username
	//3 password
	// 4 database
	$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_karoliinar");
		
	$stmt = $mysql->prepare("INSERT INTO message_sample (recipient, message) VALUES (?,?)");
	
	//we are replacing question marks with values
	//s-string, date or smth that is based on characters and
	//i-integer, number
	//d-decimal, float
	
	//for each question mark its type with one letter
	$stmt->bind_param("ss",$_GET["to"], $_GET["message"]);	
	
	if($stmt->execute()){
		echo "saved sucsessfully";
	}else{
		echo $stmt->error;
	}
 
 
 
?>

<h2> First application </h2>

<form method="get">
	<label for="message">Message:* <label><br>
	<input type="text" name="message"><br>
	
<?php

?>

<form method="get">
	<label for="to">To <label><br>
	<input type="text" name="to"><br>
	
<form method="get">
	<lable for="from">From <label><br>
	<input type="text" name="from"><br>
	<input type="submit" value="Save to DB">	