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
    <title>Events</title>
    <link rel="stylesheet" href="./CSS/events.css">
</head>

<body>
    <nav>
        <ul>
            <li> <a href="./index.html">HOME</a></li>
            <li> <a href="./events.php"><span class="green">EVENTS</span></a></li>
            <li><a href="./login.php">LOGIN/SIGNUP</a></li>
        </ul>
    </nav>
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
        <br>
        <br>
        <br>
        <br>
        <h4>To Register for a event ,Login or Signup first</h4>
    </div>
</body>

</html>