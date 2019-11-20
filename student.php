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
    <link rel="stylesheet" href="./CSS/student.css">
    <title>Student</title>
    <script src="./JS/app.js"></script>
    <style>
        td {
            text-align: center;
        }

        tr,
        td {
            padding: 5px;
        }

        table,
        tr,
        td,
        th {
            border: none;
        }
    </style>
</head>

<body>
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
                        $query = "SELECT event_id,event_name,college_name,event_date from event_details ";
                        $query_run = mysqli_query($con,$query);
                        while($row = mysqli_fetch_array($query_run, MYSQLI_ASSOC)){
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
            </form>
        </div>

    </div>
    <!-- popup form end -->

    <center>
        <button id="register" onclick="div_show()" name="register">Register</button>
    </center>

    <?php
               if(isset($_POST['submit'])){
                   $event_id = $_POST['event_id'];
                   $username = $_SESSION["usernm"];
                   $query = "INSERT into registered values('$username','$event_id')";
                   $query_run = mysqli_query($con,$query);
               } 
            ?>

</body>

</html>