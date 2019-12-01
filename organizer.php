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
    <script src="./JS/app.js"></script>
    <title>Orgainzer</title>
    <style>
        <?php include './CSS/organizer.css' ?>
    </style>
    <link rel="stylesheet" href="./CSS/background.css">
</head>

<body>
    <nav>
        <ul>
            <li> <a href="./PHP/logout.php">LOGOUT</a></li>
        </ul>
    </nav>
    <!-- ADD event popup form start -->

    <div id="abc" class="box">
        <div id="popupContact">

            <form action="#" id="form" method="post" name="form">
                <img id="close" src="./img/close.png" onclick="div_hide()">
                <h2>Add Event Details</h2>
                <hr>
                <input id="event_id" name="event_id" placeholder="Event ID" type="text" required>
                <input id="event_name" name="event_name" placeholder="Event Name" type="text" required>
                <input type="text" name="college_name" id="college_name" placeholder="College Name" required>

                <input type="date" name="event_date" id="event_date" required>
                <button name="submit" id="submit">Submit</button>
                <!-- <a href="javascript:%20check_empty()" id="submit">Send</a> -->
            </form>
        </div>

    </div>
    <!-- popup form end -->

    <!-- delete popup -->
    <div id="deletepopup" class="box">
        <div id="popupContact">

            <form action="#" id="form" method="post" name="form">
                <img id="close" src="./img/close.png" onclick="div_hide_delete()">
                <h2>Delete Event</h2>
                <hr>
                <input id="event_id" name="event_id_delete" placeholder="Event ID" type="text" required>
                <button name="delete_event" id="submit">Submit</button>
                <!-- <a href="javascript:%20check_empty()" id="submit">Send</a> -->
            </form>
        </div>

    </div>

  


    <!-- delete popup end -->

    <?php
    if (isset($_POST['submit'])) {
        $event_id = $_POST['event_id'];
        $event_name = $_POST['event_name'];
        $college_name = $_POST['college_name'];
        $event_date = $_POST['event_date'];
        $username = $_SESSION["usernm"];

        $query = "SELECT * from event_details WHERE event_id='$event_id";
        $query_run = mysqli_query($con, $query);

        if (mysqli_num_rows($query_run) == 0) {
            $query = "INSERT into event_details values('$event_id','$event_name','$college_name','$event_date',0)";
            $query_run = mysqli_query($con, $query);
            $query = "INSERT into organizer_events values('$username','$event_id')";
            $query_run = mysqli_query($con, $query);
        } else {
            echo '<script type="text/javascript"> alert("Event already exists..")</script>';
        }
    }
    ?>   
    <!-- php popup end -->
    <center>
        <h1>Hello,
            <?php
            echo $_SESSION["usernm"];
            ?>
        </h1>
        <h2>Here You can Add or View Events</h2>
    </center>

   

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
            // $query = "SELECT event_id,event_name,college_name,event_date from event_details ";
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
                echo "</td></tr>";
            }
            ?>
        </table>
    </div>
    <center>
        <button id="popup" onclick="div_show()">Add Event</button>

        <br><br>
        <h2>Count of Student in your event</h2>
    </center>
    <div class="table">
        <table width="100%" border="2px solid black">
            <tr>
                <th>Event ID</th>
                <th>Count of Students</th>
            </tr>
            <!-- displaying data in webpage -->
            <?php
            require 'DB/connect.php';
            $username = $_SESSION["usernm"];
            $query = "SELECT event_id,number_of_students from event_details where event_id in (select event_id from organizer_events where username='$username')";
            $query_run = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($query_run, MYSQLI_ASSOC)) {
                echo "<tr><td>";
                echo $row['event_id'];
                echo "</td><td>";
                echo $row['number_of_students'];
                echo "</td></tr>";
            }
            ?>
        </table>
    </div>
    <center>
        <button id="delete" onclick="show_delete()" name="delete_event">DELETE</button>
    </center>

    <?php
    if (isset($_POST['delete_event'])) {
        $event_id_delete = $_POST['event_id_delete'];
        $quer = "DELETE from event_details WHERE event_id='$event_id_delete' and event_id in (select event_id from organizer_events where username='$username')";
        $query_run = mysqli_query($con, $quer);
    }
    ?>
</body>

</html>