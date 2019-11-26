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
    <style>
        td {
  text-align: center;
}

th,
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

table tr:nth-child(even) {
  background-color: #eee;
}

table tr:nth-child(odd) {
  background-color: #fff;
}

th {
  color: #000000;
  background-color: #86c323;
}

.table {
  width: 1000px;
  height: auto;
  margin: 0 auto;
  margin-top: 5%;
  /* transform: translate(-50% -50%); */
     background-color: inherit;
}

        #popup {
            margin-top: 20px;
            outline: none;
        }

        #delete {
            background-color: #ff0000;
            margin-left: 10px;
            outline: none;
        }
    </style>
</head>

<body>
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


    <?php
         if(isset($_POST['delete_event'])){
             $event_id_delete = $_POST['event_id_delete'];
             $quer = "DELETE from event_details WHERE event_id='$event_id_delete'";
             $query_run = mysqli_query($con,$quer);
         }
    ?>

    <!-- delete popup end -->

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







    <center>
        <button id="popup" onclick="div_show()">Add Event</button>
        <button id="delete" onclick="show_delete()" name="delete_event">DELETE</button>
    </center>

   
</body>

</html>