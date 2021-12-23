<?php
      
 
session_start();
if(isset($_SESSION["type"]) and $_SERVER["REQUEST_METHOD"]=="POST"){
        require("connect.php");
       
        $conn=new mysqli($host,$user,$password,$database);
        $message_id=$_POST["message_id"];
 
        $resualt=$conn->query(" delete from messages where id=$message_id");
        if($resualt)
        echo json_encode(["msg"=>"succ"]);
        else 
            echo ["msg"=>"error"];
    }
    else 
       die(json_encode(["msg"=>"error 1"]));
?>