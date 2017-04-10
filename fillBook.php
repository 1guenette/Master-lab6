<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $sportArray = mysqli_query($conn,"SELECT bookName, rentNum, bookID FROM books WHERE genre = 'sport', available='true'");
    $artArray = mysqli_query($conn,"SELECT bookName, rentNum, bookID FROM books WHERE genre = 'genre', available='true' ");
    $litArray = mysqli_query($conn,"SELECT bookName, rentNum, bookID FROM books WHERE genre = 'lit', available='true' ");
    $scienceArray = mysqli_query($conn,"SELECT bookName, rentNum, bookID FROM books WHERE genre = 'science', available='true' ");

    $sportSec = "<tr id='artSec'><th>Art</th>";
    $artSec = "<tr id='sportSec'><th>Sport</th>";
    $litSec = "<tr id='litSec'><th>Literature</th>";
    $scienceSec = "<tr id='scienceSec'><th>Science</th>";


    while ($row_users = mysql_fetch_array($artArray)) 
    {
        $sportSec += "<td>".($row_users['bookName'])."</td>";
    }
    $sportSec +="</tr>";

    while ($row_users = mysql_fetch_array($sportArray)) 
    {
        $sportSec += "<td>".($row_users['bookName'])."</td>";
    }
    $sportSec +="</tr>";

    while ($row_users = mysql_fetch_array($litArray)) 
    {
        $sportSec += "<td>".($row_users['bookName'])."</td>";
    }
    $sportSec +="</tr>";

    while ($row_users = mysql_fetch_array($scienceArray)) 
    {
        $sportSec += "<td>".($row_users['bookName'])."</td>";
    }
    $sportSec +="</tr>";

    $lib = $sportSec + $artSec + $litSec + $scienceSec;
    echo $lib;
}

$conn->close();

?>