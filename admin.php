<?php
    require "config.php";

    require 'admin.html';

    $array = array();

    $data = "";

    if(isset($_POST["submit"]))
    {
        if(isset($_POST["username"]) && isset($_POST["password"]))
        {
            $username = $_POST["username"];
            $password= $_POST["password"];

            if($username==='admin' && $password==='1234')
            {
                echo "<span id='isadmin' hidden>Yes</span>";
                $array = allMail();
                $data = "<h2>Subscribers</h2>";
                $count = 0;
                foreach ($array as $value) { 
                    $count++;
                    $data .= "<p> $count. ".$value."</p>";
                } 
            }
            else echo "incorrect username or password";
        }
    }

    close();

    echo $data;
?>