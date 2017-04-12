<?php
require_once 'config.php';
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $booker = "";
    
    $userList = "<div class='dropdown'>
                <button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>User List
                <span class='caret'></span></button>
                <ul class='dropdown-menu'>";

    $sql = "SELECT username FROM accounts";

    
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

            while ($name = mysql_fetch_array($sql)) 
            {
                $userList += "<li onclick='getDesc(this.innerHTML)'>"+$name+"</li>";


            }
            $userList +="</ul></div>"
        }
        $desc = "<script>", "document.getElementById('addForm').value = $booker;","document.getElementById('userlist').value = $userList;","</script>";
        echo $desc;
     
}



$conn->close();


?>