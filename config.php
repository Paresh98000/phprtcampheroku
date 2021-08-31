<?php

    $host = "localhost";
    $database = "comicsub";
    $username = "Paresh";
    $password = "paresh@123";

    $con = mysqli_connect($host, $username, $password, $database);

    if(!$con)
        echo "Something Went Wrong... Error Code DB001";

    function execute($query){
        global $con;
        return mysqli_query($con,$query);
    }

    function close()
    {
        global $con;
        mysqli_close($con);
    }

    function exists($mailId){
        $sql = "Select field01 from subscribers where field02 = '$mailId'";
        $result = execute($sql);
        return mysqli_num_rows($result)>0;
    }

    function allMail(){
        $sql = "Select field02 from subscribers";
        $result = execute($sql);
        $data = array();
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result)){
                array_push($data,$row["field02"]);
            }
        }
        return $data;
    }

    function getMailIds(){
        $sql = "Select field02 from subscribers";
        $result = execute($sql);
        $data = "";
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result)){
                $data .= $row["field02"].",";
            }
        }
        return trim($data,', ');
    }

    function unsubscribe($mail){
        $sql = "Delete from subscribers where field02 = '$mail'";
        return execute($sql);
    }
?>