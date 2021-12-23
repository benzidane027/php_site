<?php


if($_SERVER["REQUEST_METHOD"]=="POST"){
        require("connect.php");
        $conn=new mysqli($host,$user,$password,$database);
        $user_name=$_POST["name"];
     //   echo json_encode(["msg"=>$user_name]);
        
        $user_id="-1";

        $req=$conn->query("select id from users where name='$user_name'")->fetch_all();
                if($req){
                        $user_id=$req[0][0];
                       // echo json_encode(["msg"=>$user_id]);
                }
        $resualt=$conn->query("select * from messages where sender_id=$user_id")->fetch_all();
        if(count($resualt)!=0)
                echo json_encode(["msg"=>$resualt]);
        else    
                echo json_encode(["msg"=>"no data"]);
    }
    else 
       die(json_encode(["msg"=>"error 1"]));
?>