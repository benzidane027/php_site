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
    <title>super 02</title>
    <link rel="stylesheet" href="../css_files/super2.css">
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

        <span>&nbsp; super second</span>

        <form action="deconnect.php" method="get">
            <button> deconnect</button>
        </form>


    </div>
    <div class="myselect">
        <select name="" id="myselect">
            <option value="today">today</option>
            <option value="yestesay">yestesay</option>
            <option value="last_7_day"> last 7 day</option>
            <option value="last_30_day">last 30 days</option>
            <option value="all_message"> all message</option>
        </select>
    </div>
    <div class="table_container">
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
                    <th>
                        sender name
                    </th>
                </tr>
            </thead>
            <tbody id="accepted_table">
            </tbody>
        </table>

    </div>

    <script src="../js_files/super2.js">

    </script>
</body>

</html>