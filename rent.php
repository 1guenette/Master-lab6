<?php

require_once 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") 
{
	$bookName = $_GET["bookName"];

	$sql = "SELECT * FROM books WHERE bookName = '$bookName', available=true";
	 //mysqli_query($conn,"SELECT bookName, rentNum, bookID FROM books WHERE genre = 'sport', available='true'");
	mysqli_query($conn,$sql);

	$data = "";
	
	while ($bookData = mysql_fetch_array($sql)) 
    {
        if($_SESSION["rentNum"]<2)
        {
        	echo"<script>alert('Book has been added to your rental cart')</script>"

        }
        else
        {
        	echo"<script>alert('You have rented too many books')</script>"
        }
    }

    echo $data;



}

$conn->close();


?>