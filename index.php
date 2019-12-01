<?php
    require 'DB/connect.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <style>
        <?php include './CSS/index.css';
            // include './CSS/admin.css';
        ?>
        </style>
        <link rel="stylesheet" href="./CSS/background.css">s
</head>

<body>
    <nav>
        <ul>
            <li> <a href="./index.html"><span class="green">HOME</span></a></li>
            <li> <a href="./events.php">EVENTS</a></li>
            <li><a href="./login.php">LOGIN/SIGNUP</a></li>
        </ul>
    </nav>
        <h1 id="welcome"><span class="green">Welcome</span><br> 
        to
    </h1> 
        <div class="intro">

            <h2> <span class="green">Event </span>Management<span class="green"> System</span></h2>
            <br>
            <center>
                <a href="./login.php"> <button id="btn">Go To login/Signup Page</button></a>
            </center>

            <!-- <table id="table_r" width="100%">
                <tr>
                    <th>Username</th>
                    <th>Event ID</th>
                </tr>

                <?php
                $quer = "SELECT * FROM registered";
                $query_r = mysqli_query($con, $quer);
                while ($rows = mysqli_fetch_array($query_r, MYSQLI_ASSOC)) {
                    echo "<tr><td>";
                    echo $rows['username'];
                    echo "</td><td>";
                    echo $rows['event_id'];
                    echo "</td></tr>";
                }
                ?>
            </table> -->
        </div>
</body>

</html>