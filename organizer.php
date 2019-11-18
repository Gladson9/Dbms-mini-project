<?php
    require 'DB/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./CSS/organizer.css">
    <script src="./JS/app.js"></script>
    <title>Orgainzer</title>
</head>

<body>
<!-- ADD event popup form start -->
    <div id="abc">
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
<!-- php for form -->
<?php
     if(isset($_POST['submit'])){
         $event_id = $_POST['event_id'];
         $event_name = $_POST['event_name'];
         $college_name = $_POST['college_name'];
         $event_date = $_POST['event_date'];

         $query = "SELECT * from event_details WHERE event_id='$event_id";
         $query_run = mysqli_query($con,$query);

         if(mysqli_num_rows($query_run) == 0){
            $query = "INSERT into event_details values('$event_id','$event_name','$college_name','$event_date')";
            $query_run = mysqli_query($con,$query);
         }
         else
         {
            echo'<script type="text/javascript"> alert("Event already exists..")</script>';
         }
     }
?>
<!-- php popup end -->

    <h1>ADD or View Events</h1>
    <center>
        <button id="popup" onclick="div_show()">Add Event</button>
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


</body>

</html>