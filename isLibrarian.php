<?php
	require_once 'config.php';
	// Check connection
	if ($conn->connect_error) 
	{
    	die("Connection failed: " . $conn->connect_error);
	} 
	echo "Connected successfully";
	
	
	if ($_SESSION["librarian"] == True) 
	{
    	echo "
				<h3>Add Book</h3>
				<p style='margin:0px'>Book Name</p>
				<input type="text" id="title">
				<br>
				<br>
				<p style='margin:0px'>Author:</p>
				<input type="text" id="author">
				<br>
				<br>
				<select id = "genre">
  					<option value="art">Art</option>
  					<option value="science">Science</option>
  					<option value="sport">Sport</option>
  					<option value="lit">Literature</option>
				</select>
				<br>
				<button type="button" onclick="addBook()">Add Book</button>    			
  			";
	}
$conn->close();

?>