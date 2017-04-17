<?php

require_once 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") 
{
	$name = $_GET["name"];

	$sql="";
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
		$data += "<table><tr><th>BookID</th><th>Date</th><th>Return Date:</th></tr>";	
		while ($userData = mysql_fetch_array($sql)) 
    	{
        	$data += "<tr><td>".($userData['bookID'])."</td><td>".($userData['date'])."</td><td>".($userData['returnDate'])."</td><tr>";
    	}
    	$data += "</tr></table>";	

	}
	else
	{
		$data += "<table><tr><th>Book Name:</th><th>Author:</th><th>Rent Number:</th><th>Book ID:</th></tr>";

		while ($bookData = mysql_fetch_array($sql)) 
    	{
        	$data += "<tr><td>".($bookData['bookName'])."</td><td>".($bookData['author'])."</td><td>".($bookData['rentNum'])."</td><td>".($bookData['bookID'])."</td><tr>";
    	}
	}

    echo $data;



}

$conn->close();


?>