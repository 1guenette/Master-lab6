<?php
require_once 'config.php';
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $booker = "";
    
    
    


    if (mysqli_num_rows($query) > 0) 
    {
        if( $_SESSION["librarian"]  == True)
        {
            $booker +="
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
        $desc = "<script>", "document.getElementById.value('addForm').value = $booker;","</script>";
        echo $desc;
    } 
}



$conn->close();


?>