<?php

require_once 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") 
{
	$bookName = $_GET["bookName"];

	$sql = "SELECT * FROM books WHERE title = $bookName";
	 //mysqli_query($conn,"SELECT bookName, rentNum, bookID FROM books WHERE genre = 'sport', available='true'");
	mysqli_query($conn,$sql);

	$data = "";
	

	while ($bookData = mysql_fetch_array($sql)) 
    {
        $data += "<p>".($bookData['bookName'])."</p>";
        $data += "<p>".($bookData['rentNum'])."</p>";
        $data += "<p>".($bookData['bookId'])."</p>";
    }

    echo $data;



}

$conn->close();


?>