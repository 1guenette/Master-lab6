<?php

require_once 'config.php';
session_start()

if ($_SERVER["REQUEST_METHOD"] == "GET") 
{
	$name = $GET["username"];
	$sql = "SELECT * FROM loanHistory WHERE username ='name'"
	$sql =mysqli_query($conn,$sql);
	$val = "<ul>";

	for($log = mysql_fetch_array($sql))
	{
		$id = $log["bookID"];
		$date = $log["startDate"];

		val+="<li>ID: $id....Date: $date</li>";


	}     
	$val+="</ul>"

	echo $val;
}



$conn->close();

?>