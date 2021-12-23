<?php

    if(isset($_POST["validate"])){
        require("../connect.php");

        $pass=$_POST["password"];
       
        if($pass== $super1_pass){
            session_start();
            session_destroy();
            session_start();
            $_SESSION["type"]="super1";
            $_SESSION["name"]="svs";
            
            header("location:super1.php");
        }
        elseif($pass== $super2_pass){
            session_start();
            session_destroy();
            session_start();
            $_SESSION["type"]="super2";
            header("location:super2.php");
        }
        else{
            echo "no admin registred return and log again";
        }
    }
    else 
       die(json_encode(["msg"=>"error 1"]));

?>