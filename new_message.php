<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
        require("connect.php");
       
       
        $conn=new mysqli($host,$user,$password,$database);

        $input1=$_POST["input_1"];
        
        $input2=$_POST["input2"];
        $user_name=$_POST["name"];
        
        
        
        $input3="";
        $user_id="";
                $req=$conn->query("select id from users where name='$user_name'")->fetch_all();
                if($req){
                        $user_id=$req[0][0];
                       // echo json_encode(["msg"=>$user_id]);

                }else{
                        $req=$conn->query("insert into users(name)values('$user_name')");
                        $req=$conn->query("select id from users where name='$user_name'")->fetch_all();
                        $user_id=$req[0][0];
                       // echo json_encode(["msg"=>$user_id]);
                }
            
       $resualt=$conn->query("insert into messages(sender_id,input1,input2,input3)values($user_id,'$input1','$input2','$input3')");
        if($resualt)
                echo json_encode(["msg"=>"succ"]);
        else 
            echo json_encode(["msg"=>"error"]);
    }
    else 
       echo json_encode(["msg"=>"error 1"]);
       
?>