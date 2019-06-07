<?php

if ($_REQUEST["url"] == "" Or $_REQUEST["short"] == ""){

    echo "********line5";

    die();

}

$validUrl 	= filter_var($_REQUEST["url"], FILTER_VALIDATE_URL);
$validShort = filter_var($_REQUEST["short"], FILTER_VALIDATE_URL);

if (!($validUrl And $validShort)){

    echo "********line14";

    die();

}

$servername = "mysql server";

$username = "mysql username";

$password = "mysql password";

$dbname = "mysql dbname";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());

}



$sql = "INSERT INTO googl (url, short, myName) VALUES ('" . strip_tags(trim($_REQUEST["url"])) . "', '" . strip_tags(trim($_REQUEST["short"]))  . "','" . strip_tags(trim($_REQUEST["myname"]))  . "')";



echo $sql;



if ($conn->query($sql) === TRUE) {

    echo "New record created successfully";

} else {

    echo "Error: " . $sql . "<br>" . $conn->error;

}



mysqli_close($conn);

?>

