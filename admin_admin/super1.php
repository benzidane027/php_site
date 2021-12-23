<?php
session_start();
if (!isset($_SESSION["type"])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>super 01</title>
    <link rel="stylesheet" href="../css_files/super1.css">
</head>
<?php
        require("../connect.php");
        if(strlen($image_name)){
            echo "<style>
            body{
                background-image: url('../image/pic.jpg');
                background-size: 100% 100%;
            }
                </style>   ";
        }

    ?>
<body>
    <div class="nav-bar">
        <span>&nbsp; super first</span>
        <form action="deconnect.php" method="get">
        <button> deconnect</button>
        </form>
    </div>

    <div class="main-button">
       
            <button id="message_checking_button">
                ckecking
            </button>
            <button id="message_accepted_button">
                declined
            </button>
            <button id="message_declined_button">
                accepted
            </button>
        
    </div>

    <div class="table_container" >

        <div  id="messages_checking_area" style="height: 100%;width:100%;display:block">
            <h2>
                ckecking order
            </h2>
            <table class="my_table">

                <thead>
                    <tr>
                        <th>
                            action
                        </th>
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
                        <th>
                            sender name
                        </th>
                    </tr>
                </thead>
                <tbody id="ckecking_table">

                </tbody>
            </table>
        </div>

        <div  id="messages_accepted__area" style="height: 100%;width:100%;display:none">
            <h2>
            declined order
            </h2>
            <table class="my_table">

                <thead>
                    <tr>
                        <th>
                            action
                        </th>
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
                        <th>
                            sender name
                        </th>
                    </tr>
                </thead>
                <tbody id="accept_table">

                </tbody>
            </table>
        </div>

        <div  id="messages_decline__area" style="height: 100%;width:100%;display:none">
            <h2>
            accepted order
            </h2>
            <table class="my_table">
                <thead>
                    <tr>
                        <th>
                            action
                        </th>
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
                        <th>
                            sender name
                        </th>
                    </tr>
                </thead>
                <tbody id="decline_table">

                </tbody>
            </table>
        </div>

    </div>



    <script src="../js_files/super1.js" >

    </script>
</body>

</html>