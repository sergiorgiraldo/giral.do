<?php

$servername = "mysql server";

$username = "mysql username";

$password = "mysql password";

$dbname = "mysql dbname";

$conn = mysqli_connect($servername, $username, $password, $dbname);



if (!$conn) {



    die("Connection failed: " . mysqli_connect_error());



}







$sql = "SELECT DISTINCT url, short, myName FROM googl order by id desc";







$result = $conn->query($sql);







if ($result->num_rows > 0) {



	echo "<table border='1' cellpadding='2' cellspacing='2'><tr><th align='left' width='70%'>Url</th><th align='left' width='9%'>My name</th><th align='left' width='18%'>Short url</th><th width='3%'>&nbsp;</My name>";



    while($row = $result->fetch_assoc()) {



		echo "<tr>";

		if ($row["myName"] <> ""){
			if (strpos($row["short"], "x.giral.do") === false){
		        echo "<td><a href='" . $row["url"] . "'>" . $row["url"] . "</a></td><td>" . $row["myName"] . "</td><td><a href='http://s.giral.do/" . $row["myName"] . "'>http://s.giral.do/" . $row["myName"] . "</a></td><td><a href='" . str_replace("s.giral.do", "goo.gl", $row["short"]) . ".info" . "'>" . "stats" . "</a></td>";				
			}
			else{
		        echo "<td><a href='" . $row["url"] . "'>" . $row["url"] . "</a></td><td>" . $row["myName"] . "</td><td><a href='http://x.giral.do/" . $row["myName"] . "'>http://x.giral.do/" . $row["myName"] . "</a></td><td><a href='" . str_replace("http://x.giral.do", "https://bit.ly", $row["short"]) . "+" . "'>" . "stats" . "</a></td>";
			}
		}
		else{
			if (strpos($row["short"], "x.giral.do") === false){
	        	echo "<td><a href='" . $row["url"] . "'>" . $row["url"] . "</a></td><td>" . $row["myName"] . "</td><td><a href='" . $row["short"] . "'>" . $row["short"] . "</a></td><td><a href='" . str_replace("s.giral.do", "goo.gl", $row["short"]) . ".info" . "'>" . "stats" . "</a></td>";
	    	}
	    	else{
	        	echo "<td><a href='" . $row["url"] . "'>" . $row["url"] . "</a></td><td>" . $row["myName"] . "</td><td><a href='" . $row["short"] . "'>" . $row["short"] . "</a></td><td><a href='" . str_replace("http://x.giral.do", "https://bit.ly", $row["short"]) . "+" . "'>" . "stats" . "</a></td>";
	    	}
		}



		echo "</tr>";



    }



	echo "</table>";



} 







mysqli_close($conn);



?>



