<?php
session_start();
if(isset($_SESSION["type"]) and $_SERVER["REQUEST_METHOD"]=="POST"){
        require("connect.php");
       
        $conn=new mysqli($host,$user,$password,$database);

        $resualt=$conn->query("select messages.id,messages.input1,messages.input2,messages.status,messages.date_to_send,users.name from messages,users where users.id=messages.sender_id")->fetch_all();

        if($resualt)
        echo json_encode(["msg"=>$resualt]);
        else 
            echo  json_encode(["msg"=>"no data"]);
    }
    else 
       die(json_encode(["msg"=>"error 1"]));
?>