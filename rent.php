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
            $startDate = date("Y/m/d");
            

            if($_SESSION["rentNum"] ==1)
            {
                mysqli_query($conn, "INSERT INTO accounts (rentNum, rent1) VALUES '$newRentNum','$bookName");
                mysqli_query($conn, "INSERT INTO loanHistory (username, startDate, bookID) VALUES '$user',  '$startDate', '$id'");
            }
            else
            {
                mysqli_query($conn, "INSERT INTO accounts (rentNum, rent2) VALUES '$newRentNum','$bookName");
                mysqli_query($conn, "INSERT INTO loanHistory (username, startDate) VALUES '$user',  '$startDate'");
            }
           
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