<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $query; = mysqli_query($conn,"SELECT rentNum FROM accounts WHERE userName = '$username' AND password = '$password' ");

    $username = mysqli_query($conn,"SELECT username FROM accounts WHERE userName = '$username' AND password = '$password' "); 
    $firstname = mysqli_query($conn,"SELECT firstname FROM accounts WHERE userName = '$username' AND password = '$password' "); 
    $lastname = mysqli_query($conn,"SELECT lastname FROM accounts WHERE userName = '$username' AND password = '$password' "); 
    $rentNum = mysqli_query($conn,"SELECT rentNum FROM accounts WHERE userName = '$username' AND password = '$password' "); 
    $librarian = mysqli_query($conn,"SELECT librarian FROM accounts WHERE userName = '$username' AND password = '$password' "); 
    
    $desc = "<script>", "alert('$message');", "window.location.href='$redir;", "document.getElementById.value('addForm').value = $desc;","</script>";
    
    $message = "Incorrect username or password!";
    $redir = "login.html";


    if (mysqli_num_rows($query) > 0) 
    {
        $message = "Success!";
        $redir = "library.html";
        
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["firstName"] = $firstname;
        $_SESSION["lastName"] = $lastname;
        $_SESSION["rentNum"] = $rentNum;
        $_SESSION["librarian"] = $librarian;
    } 
}

echo $desc;

$conn->close();


?>