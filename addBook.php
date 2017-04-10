<?php
	function getRand($min, $max) 
	{
    	echo Math.floor(Math.random() * ($max - $min) + $min);
	}

	require_once 'config.php';
	// Check connection
	if ($conn->connect_error) 
	{
    	die("Connection failed: " . $conn->connect_error);
	} 
	echo "Connected successfully";
	
	$title = $_REQUEST["title"];
	$author = $_REQUEST["author"];
	$id = $_REQUEST["id"];
	$genre = $_REQUEST["genre"];
	$shelfID = $_REQUEST["shelfID"];
	
	$available = True;

	$existID = mysqli_query($conn,"SELECT id  from books WHERE id=$id");
	$sql = "INSERT INTO library(title, author, bookID, available) VALUES($title, $author, $id, $available); 
			INSERT INTO shelves(shelfID, shelfName) VALUES($shelfID, $genre); 
			INSERT INTO bookLocation(bookID, shelfID) VALUES($id, $shelfID); ";

	while(mysqli_num_rows($existID) > 0) //validates id
    {
        if($id/4000 >=1)
        {
        	$id = getRand(4000, 4999);
        	$existID = mysqli_query($conn,"SELECT id  from books WHERE id=$id");
        }
        else if($id/3000 >=1)
        {
        	$id = getRand(3000, 3999);
        	$existID = mysqli_query($conn,"SELECT id  from books WHERE id=$id");
        }
        else if($id/2000 >=1)
        {
        	$id = getRand(2000, 2999);
        	$existID = mysqli_query($conn,"SELECT id  from books WHERE id=$id");
        }
        else
        {
        	$id = getRand(1000, 1999);
        	$existID = mysqli_query($conn,"SELECT id  from books WHERE id=$id");
        }
    }
	
	if ($conn->query($sql) === TRUE) 
	{
    	echo "New record created successfully";
	} 
	else 
	{
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
$conn->close();

?>