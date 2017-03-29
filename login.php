<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $rentNum; = mysqli_query($conn,"SELECT rentNum FROM accounts WHERE userName = '$username' AND password = '$password' "); 
    $firstName =mysqli_query($conn,"SELECT firstName FROM accounts WHERE userName = '$username' AND password = '$password' ");
    $lastName = mysqli_query($conn,"SELECT lastName FROM accounts WHERE userName = '$username' AND password = '$password' ");
    $librarian = mysqli_query($conn,"SELECT librarian FROM accounts WHERE userName = '$username' AND password = '$password' ");
    $sql = "SELECT * FROM accounts WHERE userName = '$username' AND password = '$password' "; 
    $desc = False;

    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) 
    {
        $message = "Success!";
        $redir = "library.html";
        
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["firstName"] = $password;
        $_SESSION["lastName"] = $username;
        $_SESSION["rentNum"] = $password;
        $_SESSION["librarian"] = $librarian;

       if($librarian == True)
       {
        $desc ="
                <h3>Add Book</h3>
                <p style='margin:0px'>Book Name</p>
                <input type='text' id='title'>
                <br>
                <br>
                <p style='margin:0px'>Author:</p>
                <input type='text' id='author'>
                <br>
                <br>
                <select id = 'genre'>
                    <option value='art'>Art</option>
                    <option value='science'>Science</option>
                    <option value='sport'>Sport</option>
                    <option value='lit'>Literature</option>
                </select>
                <br>
                <button type='button' onclick='addBook()'>Add Book</button>             
            ";

        }




    } 
    else 
    {
        $message = "Incorrect username or password!";
        $redir = "login.html";
    }
    echo "<script>", "alert('$message');", "window.location.href='$redir';", "document.getElementById.value('addForm').value = $desc","</script>";
}

?>