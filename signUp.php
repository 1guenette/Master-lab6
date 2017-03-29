<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $phone = $_POST['phone'];
    $librarian = $_POST['librarian'];

    
    $redir;
    $message;

    $query_insert;

    $query = mysqli_query($conn, "SELECT * FROM $db_table WHERE username = '$name'");

    if (mysqli_num_rows($query) > 0) 
    {
        $redir = "signUp.php";
        $message = "This account name already exists!";
    }
    else if($confirmPassword != $password)
    {
      $redir = "signUp.php";
      $message = "This your passwords do not match";
    } 
    else 
    {
        if($username != "admin") 
        {
            $query_insert = "INSERT INTO $db_table(firstName, lastName, email, userName, password, phone, librarian)
                             VALUES ('$firstName', '$lastName', '$email', '$userName', '$password', '$phone', TRUE)"; //NOTE: check for valid column names
        }
        else
        {
            $query_insert = "INSERT INTO $db_table(firstName, lastName, email, userName, password, phone, librarian)
                             VALUES ('$firstName', '$lastName', '$email', '$userName', '$password', '$phone', FALSE)"; //NOTE: check for valid column names
        }
        //Querying the information
        mysqli_query($conn, $query_insert);

        $redir = "login.html";
        $message = "Account has been created!";
    }

    //Redirects with success or failure message
    echo "<script>", "alert('$message');", "window.location.href='$redir';", "</script>";

}

$conn->close();
?>

<!--BEGIN HTML-->
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<table id="signUp"  action="signUp.php" method="post">
  <h3>Sign Up</h3>
  
  <p style="margin:0px">First Name:</p>
  <input type="text" id="firstName" name="firstName" >
  <br>
  
  <p style="margin:0px">Last Name:</p>
  <input type="text" id="lastName"  name="lastName">
  <br>

  <p style="margin:0px">Email:</p>
  <input type="text" id="email" name= "email" >
  <br>
  
  <p style="margin:0px" id = "userID" name="userID">User Name:</p>
  <input type="text" id="userName" >
  <br>
  
  <p style="margin:0px">Password:</p>
  <input type="password" id="password" name="password">
  <br>

  <p style="margin:0px">Confirm Password:</p>
  <input type="password" id="confirmPassword" name="confirmPassword">
  <br>

  <p style="margin:0px">Phone Number:</p>
  <input type="number" id="phone" name="phone">
  <br>

  <input type="submit" id="submit">
</table>
</body>
</html>