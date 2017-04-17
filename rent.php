<?php

require_once 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") 
{
	$bookName = $_GET["bookName"];


	$sql = "SELECT * FROM books WHERE bookName = '$bookName', available=true";
	mysqli_query($conn,$bookData);
	


    $data = "";
	
	while ($bookData = mysql_fetch_array($sql)) 
    {
        if($_SESSION["rentNum"]<2)
        {
            $_SESSION["rentNum"] +=1;
            $newRentNum = $_SESSION["rentNum"];
            
            $user = $_SESSION["username"];
            
            $id= $bookData["bookID"];
            $title= $bookData["title"];
            $startDate = date("Y/m/d");
            

            mysqli_query($conn, "UPDATE accounts SET rentNum = '$newRentNum' WHERE users='$user';");
            mysqli_query($conn, "UPDATE books SET owner = '$user', available= false, rentDate='$startDate' WHERE title='$title';");
               
           
            $data+="<script>alert('Book has been added to your rental cart')</script>"

        }
        else
        {
        	$data+="<script>alert('You have rented too many books')</script>"
        }
    }

    echo $data;



}

$conn->close();


?>