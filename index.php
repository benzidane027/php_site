<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <link rel="stylesheet" href="css_files/user.css">
</head>
<?php
        require("connect.php");
        if(strlen($image_name)){
            echo "<style>
            body{
                background-image: url('image/pic.jpg');
                background-size: 100% 100%;
            }
                </style>";
        }
    ?>
<body>
    <div class="nav-bar">
        <div>
        
             <span> HELLO and WELCOME</span>
        </div>

    </div>
    <br>

    <div class="send_message">
        <form action="">
           <SPAn style="color: white;"> ORDER: </SPAn> <br>
            <input type="text" name="name" maxlength="20" id="input2" placeholder="Enter your name">
            <input type="text" name="input_1" id="input1" maxlength="100" placeholder="Enter your quantity needed" value="1">

            <select name="input2" id="">
                <option value="pc or laptop"> pc or laptop </option>
                <option value="camera"> camera </option>
                <option value="microphone"> microphone </option>
                <option value="projector"> projector </option>
                <option value="screen"> screen </option>

            </select>
        </form>

        <button id="send_message">send</button>
        
        <div id="error_message"> no thing </div>
    </div>
    <div class="resaerch">
        <span> search</span><br>
        <input type="text" placeholder="enter the name" id="research_key"> 
        <button id="serach_btn">search</button>
         <button id="hide_btn">hide resualt</button>
    </div>
    <div id="table_container" class="table_container" style="display: none;">
      
        <table class="my_table">
            <thead>
                <tr>
                    <th>
                        quantity
                    </th>
                    <th>
                        option
                    </th>
                    <th>
                        status
                    </th>
                    <th>
                        date
                    </th>
                </tr>
            </thead>
            <tbody id="main_table">

            </tbody>
        </table>
    </div>

    <script src="js_files/user.js"></script>
</body>

</html>