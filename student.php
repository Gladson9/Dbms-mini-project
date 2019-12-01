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
    <title>Student</title>
    <script src="./JS/app.js"></script>
    <style>
        <?php include './CSS/student.css' ?>
    </style>
    <link rel="stylesheet" href="./CSS/background.css">
</head>

<body>
    <h2><span>Hello</span>,
        <?php
        echo $_SESSION["usernm"];
        ?>
    </h2>
    <nav>
        <ul>
            <li> <a href="./PHP/logout.php">LOGOUT</a></li>
        </ul>
    </nav>
    <div class="table">
        <table width="100%" border="2px solid black">
            <tr>
                <th>Event ID</th>
                <th>Event Name</th>
                <th>College Name</th>
                <th>Event Date</th>
                <th>Count of Students</th>
            </tr>
            <!-- displaying data in webpage -->
            <?php
            // $query = "SELECT event_id,event_name,college_name,event_date,number_of_students from event_details ";
            $query = "CALL `display_events`()";
            $query_run = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($query_run, MYSQLI_ASSOC)) {
                echo "<tr><td>";
                echo $row['event_id'];
                echo "</td><td>";
                echo $row['event_name'];
                echo "</td><td>";
                echo $row['college_name'];
                echo "</td><td>";
                echo $row['event_date'];
                echo "</td><td>";
                echo $row['number_of_students'];
                echo "</td></tr>";
            }
            ?>
        </table>
    </div>


    <!-- ADD event popup form start -->
    <div id="abc">
        <div id="popupContact">

            <form action="#" id="form" method="post" name="form">
                <img id="close" src="./img/close.png" onclick="div_hide()">
                <h2>Register for a event</h2>
                <hr>
                <input id="event_id" name="event_id" placeholder="Event ID" type="text" required>
                <center>

                    <button name="submit" id="submit">Submit</button>
                </center>
                <!-- <a href="javascript:%20check_empty()" id="submit">Send</a> -->
                <?php
                require 'DB/connect.php';
                if (isset($_POST['submit'])) {
                    $event_id = $_POST['event_id'];
                    $username = $_SESSION["usernm"];
                    $query = "INSERT into registered values('$username','$event_id')";
                    $query_run = mysqli_query($con, $query);
                }
                ?>
            </form>
        </div>

    </div>
    <!-- popup form end -->

    <center>
        <button id="register" onclick="div_show()" name="register">Register</button>
    </center>


    <!-- <div class="registered_events"> -->
    <br><br>
    <h2>Registerd Events</h2>
    <div class="table">
        <table width="100%" border="2px solid black">
            <tr>
                <th>Event ID</th>
                <th>Event Name</th>
                <th>College Name</th>
                <th>Event Date</th>
            </tr>
            <!-- displaying data in webpage -->
            <?php
            require 'DB/connect.php';
            $username = $_SESSION["usernm"];
            $query = "SELECT event_id,event_name,college_name,event_date from event_details where event_id in (select event_id from registered where username='$username')";
            $query_run = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($query_run, MYSQLI_ASSOC)) {
                echo "<tr><td>";
                echo $row['event_id'];
                echo "</td><td>";
                echo $row['event_name'];
                echo "</td><td>";
                echo $row['college_name'];
                echo "</td><td>";
                echo $row['event_date'];
                echo "</td></tr>";
            }
            ?>
        </table>
    </div>
    <!-- </div> -->
</body>

</html>