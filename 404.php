
<?php

if (strpos($_SERVER['REQUEST_URI'], "/shorten") === false) {
    header("location:/404landing.html?_");
}
else{
	$servername = "mysql server";

	$username = "mysql username";
	
	$password = "mysql password";
	
	$dbname = "mysql dbname";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {

	    die("Connection failed: " . mysqli_connect_error());

	}

	$myName = str_replace("/shorten/", "", $_SERVER['REQUEST_URI']);

	$redirect = "http://www.giral.do/404landing.html?" . strip_tags(trim($myName));

	$sql = "SELECT id FROM googl where short = 'http://s.giral.do/" . $myName . "'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		if ($result->fetch_assoc()["id"] > 126){
			$redirect = "https://bit.ly/" . $myName;

		}
		else{
			$redirect = "http://goo.gl/" . $myName;
		}
	} 

	else {

		$sql = "SELECT 1 FROM googl where short = 'http://x.giral.do/" . $myName . "'";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {

			$redirect = "https://bit.ly/" . $myName;

		} 

		else {

			$sql = "SELECT short,id FROM googl where myName = '" . $myName . "'";

			$result = $conn->query($sql);

			if ($result->num_rows > 0) {

			    while($row = $result->fetch_assoc()) {
					if ($row["id"] > 126){
						$redirect = str_replace("http://s.giral.do", "https://bit.ly", $row["short"]);
					}	
					else{
						$redirect = str_replace("s.giral.do", "goo.gl", $row["short"]);
					}		   
			    	$redirect = str_replace("http://x.giral.do", "https://bit.ly", $redirect);
			    }

			}	
		}
	}

	/*
	echo $sql;
	echo "<br>";
	echo $result->num_rows;
	echo "<br>";
	echo $result->fetch_assoc()["id"];
	echo "<br>";
	echo $redirect;
	*/

	mysqli_close($conn);


	header("location:$redirect");
}
?>



