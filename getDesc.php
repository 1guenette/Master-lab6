<?php

require_once 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") 
{
	$name = $_GET["name"];

	if($_SESSION["librarian"] == True)
	{
		$sql = "SELECT * FROM loanHistory WHERE  username= $name";
	}
	else
	{
		$sql = "SELECT * FROM books WHERE title = $name";
	}
	mysqli_query($conn,$sql);
	



	$data = "";	
	if($_SESSION["librarian"] == True)
	{
		$data += "<table>";	
		while ($userData = mysql_fetch_array($sql)) 
    	{
        	$data += "<th>".($userData['bookID'])."</th>";
        	$data += "<th>".($userData['date'])."</th>";
        	$data += "<th>".($userData['returnDate'])."</th>";
    	}
    	$data += "</table>";	

	}
	else
	{

		while ($bookData = mysql_fetch_array($sql)) 
    	{
        	$data += "<p>".($bookData['bookName'])."</p>";
        	$data += "<p>".($bookData['rentNum'])."</p>";
        	$data += "<p>".($bookData['bookId'])."</p>";
    	}
	}

    echo $data;



}

$conn->close();


?>