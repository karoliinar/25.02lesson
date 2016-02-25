<?php

	$everything_was_okay = true;
	
 //getting the message from address
 // if there is ?name=.. then $_GET["name"]
 //$my_message = $_GET["message"];
 //$to = $_GET["to"];
 //$from = $_GET["from"];
 
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
		
		}
 
?>

<h2> First application </h2>

<form method="get">
	<label for="message">Message:* <label><br>
	<input type="text" name="message"><br>
	

<form>

<?php

?>

<form method="get">
	<label for="to">To <label><br>
	<input type="text" name="to"><br>
	

<form> 
<label for="from">From <label><br>
	<input type="text" name="from"><br>
	<input type="submit" value="Save to DB">
	