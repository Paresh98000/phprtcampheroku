<?php
    $mail = $_GET["mail"];
    include('config.php');

    if(isset($mail))
    {
        unsubscribe($mail);
        include('unsubscribe.html');
    }
    else echo "<h1>Something Went Wrong...</h1><h2>Please Try Again to Unsubscribe</h2>";

?>