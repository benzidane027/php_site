<?php
session_start();

if (isset($_SESSION["type"])) {
    if ($_SESSION["type"] == "super1")
        header("location:super1.php");
    elseif ($_SESSION["type"] == "super2") {
        header("location:super2.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css_files/admin_index.css">
</head>
<?php
require("../connect.php");
if (strlen($image_name)) {
    echo "<style>
            body{
                background-image: url('../image/pic.jpg');
                background-size: 100% 100%;
            }
                </style>   ";
}

?>

<body>
    <div class="main">
        <h1>
            admin login
        </h1>
        <br>
        <form action="log_in_admin.php" method="post">
        <br>
            <br>
            pass &nbsp;
            <input type="password" name="password" id="input_2" value="">
            <br> <br> <br>
            <button name="validate" id="button_" disabled ">send</button>
        </form>
    </div>
    <script>
       // let inp1=document.getElementById(" input_1"); 
       let inp2=document.getElementById("input_2"); 
       let btn=document.getElementById("button_"); 
       inp2.addEventListener("input",()=>{

                if((String(inp2.value).length<6 || String(inp2.value).length>20)){
                    btn.disabled=true;
                    }else
                    btn.disabled=false;

                    })

                    </script>
</body>

</html>