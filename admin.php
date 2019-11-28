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
    <title>Admin</title>
    <style>
        <?php include './CSS/admin.css' ?>
    </style>
    <link rel="stylesheet" href="./CSS/background.css">
    <script>
        // src="./JS/display.js"
        <?php include './JS/display.js' ?>
    </script>
</head>

<body>
    <h1>Admin Page</h1>
    <br>
    <nav>
        <ul>
            <li> <a href="./PHP/logout.php">LOGOUT</a></li>
        </ul>
    </nav>
    <div class="btns">
        <button onclick="show(1)">Student Details</button>
        <button onclick="show(2)">Organizer Details</button>
        <button onclick="show(3)">Event Details</button>
        <button onclick="show(4)">Registerd events</button>
        <br>
        <br>
    </div>

    <div id="table1">
        <div class="box reverse1" id="signup">
            <div class="signup-form">
                <br>
                <h1>Edit or Add info</h1>
                <form method="POST" action="#">
                    <input type="text" name="name" id="name" class="input" placeholder="Name" required>
                    <br>
                    <input type="text" name="username" id="username" class="input" placeholder="Username" required>
                    <br>
                    <input type="text" name="email" id="email" class="input" placeholder="Email" required>
                    <br>
                    <input type="password" name="password" id="password" class="input" placeholder="Password">
                    <br>
                    <input type="number" name="contact" id="contact" class="input contact" placeholder="Contact Number" required>
                    <br>
                    <input type="text" name="gender" id="gender" class="input" placeholder="Gender" required>

                    <input type="text" name="address" id="address" class="input" placeholder="Address" required>
                    <br>
                    <!-- <input type="text" name="user-type" id="user-type" class="input" placeholder="Usertype" required> -->
                    <br>
                    <br>
                    <!-- <input type="submit" name="signup-btn" value="SignUp"> -->
                    <button class="btn blue" name="add">Insert</button>
                    <button class="btn orange" name="edit">Update</button>
                    <button class="btn red" name="remove">Delete</button>
                    <!-- onclick="addHtmlTableRow();" 
                        onclick="removeSelectedRow();"
                        onclick="editHtmlTbleSelectedRow();"
                -->
                </form>
                <button class="btn yellow" onclick="clearContent();">Clear</button>
                <!-- Adding details to database -->
                <?php
                if (isset($_POST['add'])) {
                    // echo '<script type="text/javascript"> alert("button working")</script>';
                    $name = $_POST['name'];
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    // $cpassword = $_POST['cpassword'];
                    $contact = $_POST['contact'];
                    $gender = $_POST['gender'];
                    $address = $_POST['address'];
                    // $user_type_r = $_POST['user-type'];
                    $query = "select * from login_details WHERE username='$username'";
                    $query_run = mysqli_query($con, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        echo '<script type="text/javascript"> alert("User already exists..or try with a new username")</script>';
                    } else {
                        // if the user is a student adding details to student_details table
                        {
                            $query = "insert into login_details values('$username','$password','student')";
                            $query_run = mysqli_query($con, $query);

                            $query = "insert into student_details values('$username','$name','$email','$contact','$gender','$address')";
                            $query_ru = mysqli_query($con, $query);
                        }
                    }
                }

                //  removing details from database 

                if (isset($_POST['remove'])) {

                    $username = $_POST['username'];
                    $query1 = "delete from login_details WHERE username='$username'";
                    // $query2 = "delete from student_details WHERE username='$username'";
                    $query_run = mysqli_query($con, $query1);
                    // $query_run = mysqli_query($con, $query2);
                }
                if (isset($_POST['edit'])) {
                    $name = $_POST['name'];
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    // $cpassword = $_POST['cpassword'];
                    $contact = $_POST['contact'];
                    $gender = $_POST['gender'];
                    $address = $_POST['address'];


                    $query = "update student_details set username='$username',name='$name',email='$email',contact='$contact',gender='$gender',address='$address' where username='$username'";
                    $query_run = mysqli_query($con, $query);
                    $query = "update login_details set passwrd='$password' where username='$username'";
                    $query_run = mysqli_query($con, $query);
                }
                ?>
            </div>

        </div>
        <div class="left reverse2">
            <h1>Student Details</h1>
            <table id="table" width="100%">
                <tr>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Gender</th>
                    <th>Address</th>
                </tr>
                <!-- displaying data in webpage -->
                <?php
                include './PHP/display.php';
                ?>
            </table>
        </div>


    </div>
    <div id="table2">


        <div class="box reverse1" id="signup">
            <div class="signup-form">
                <br>
                <h1>Edit or Add info</h1>
                <form method="POST" action="admin.php">
                    <input type="text" name="name_o" id="name_o" class="input" placeholder="Name" required>
                    <br>
                    <input type="text" name="username_o" id="username_o" class="input" placeholder="Username" required>
                    <br>
                    <input type="text" name="email_o" id="email_o" class="input" placeholder="Email" required>
                    <br>
                    <input type="password" name="password_o" id="password_o" class="input" placeholder="Password">
                    <br>
                    <input type="number" name="contact_o" id="contact_o" class="input contact" placeholder="Contact Number" required>
                    <br>
                    <input type="text" name="gender_o" id="gender_o" class="input" placeholder="Gender" required>

                    <input type="text" name="address_o" id="address_o" class="input" placeholder="Address" required>
                    <br>
                    <!-- <input type="text" name="user-type" id="user-type" class="input" placeholder="Usertype" required> -->
                    <br>
                    <br>
                    <!-- <input type="submit" name="signup-btn" value="SignUp"> -->
                    <button class="btn blue" name="add_o">Insert</button>
                    <button class="btn orange" name="edit_o">Update</button>
                    <button class="btn red" name="remove_o">Delete</button>
                    <!-- onclick="addHtmlTableRow();" 
                        onclick="removeSelectedRow();"
                        onclick="editHtmlTbleSelectedRow();"
                -->
                </form>
                <button class="btn yellow" onclick="clearContent_o();">Clear</button>
                <!-- Adding details to database -->
                <?php
                if (isset($_POST['add_o'])) {
                    // echo '<script type="text/javascript"> alert("button working")</script>';
                    $name_o = $_POST['name_o'];
                    $username_o = $_POST['username_o'];
                    $email_o = $_POST['email_o'];
                    $password_o = $_POST['password_o'];
                    // $cpassword = $_POST['cpassword'];
                    $contact_o = $_POST['contact_o'];
                    $gender_o = $_POST['gender_o'];
                    $address_o = $_POST['address_o'];
                    // $user_type_r = $_POST['user-type'];
                    $quer = "select * from login_details WHERE username='$username_o'";
                    $query_ru = mysqli_query($con, $quer);
                    if (mysqli_num_rows($query_ru) > 0) {
                        echo '<script type="text/javascript"> alert("User already exists..or try with a new username")</script>';
                    } else {
                        $query = "insert into login_details values('$username_o','$password_o','organizer')";
                        $query_run = mysqli_query($con, $query);
                        // if the user is a student adding details to student_details table
                        $query = "insert into organizer_details values('$username_o','$name_o','$email_o','$contact_o','$gender_o','$address_o')";
                        $query_run = mysqli_query($con, $query);
                    }
                }

                //  removing details from database 

                if (isset($_POST['remove_o'])) {

                    $username_o = $_POST['username_o'];
                    $query1 = "delete from login_details WHERE username='$username_o'";
                    // $query2 = "delete from student_details WHERE username='$username'";
                    $query_run = mysqli_query($con, $query1);
                    // $query_run = mysqli_query($con, $query2);
                }
                if (isset($_POST['edit_o'])) {
                    $name_o = $_POST['name_o'];
                    $username_o = $_POST['username_o'];
                    $email_o = $_POST['email_o'];
                    $password_o = $_POST['password_o'];
                    // $cpassword = $_POST['cpassword'];
                    $contact_o = $_POST['contact_o'];
                    $gender_o = $_POST['gender_o'];
                    $address_o = $_POST['address_o'];


                    $query = "update organizer_details set username='$username_o',name='$name_o',email='$email_o',contact='$contact_o',gender='$gender_o',address='$address_o' where username='$username_o'";
                    $query_run = mysqli_query($con, $query);
                    $query = "update login_details set passwrd='$password_o' where username='$username_o'";
                    $query_run = mysqli_query($con, $query);
                }
                ?>
            </div>

        </div>
        <div class="left reverse2">
            <h1>Organizer Details</h3>
                <table id="table_o" width="100%">
                    <tr>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Gender</th>
                        <th>Address</th>
                    </tr>
                    <!-- displaying data in webpage -->
                    <?php
                    $query = "SELECT username,name,email,contact,gender,address from organizer_details ";
                    $query_run = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($query_run, MYSQLI_ASSOC)) {
                        echo "<tr><td>";
                        echo $row['username'];
                        echo "</td><td>";
                        echo $row['name'];
                        echo "</td><td>";
                        echo $row['email'];
                        echo "</td><td>";
                        echo $row['contact'];
                        echo "</td><td>";
                        echo $row['gender'];
                        echo "</td><td>";
                        echo $row['address'];
                        echo "</td></tr>";
                    }
                    ?>
                </table>
        </div>
    </div>
    <div id="table3">

        <div class="box reverse1" id="signup">
            <div class="signup-form">
                <br>
                <h1>Edit or Add info</h1>
                <form method="POST" action="admin.php">
                    <input type="text" name="event_id" id="event_id" class="input" placeholder="Event ID" required>
                    <br>
                    <input type="text" name="event_name" id="event_name" class="input" placeholder="Eventname" required>
                    <br>
                    <input type="text" name="college_name" id="college_name" class="input" placeholder="College Name" required>
                    <br>
                    <input type="date" name="event_date" id="event_date" class="input" required>
                    <br>
                    <input type="text" name="username_e" id="username_e" class="input" placeholder="Organizer Username" requierd>
                    <!-- <input type="text" name="user-type" id="user-type" class="input" placeholder="Usertype" required> -->
                    <br>
                    <br>
                    <!-- <input type="submit" name="signup-btn" value="SignUp"> -->
                    <button class="btn blue" name="add_e">Insert</button>
                    <button class="btn orange" name="edit_e">Update</button>
                    <button class="btn red" name="remove_e">Delete</button>
                    <!-- onclick="addHtmlTableRow();" 
                        onclick="removeSelectedRow();"
                        onclick="editHtmlTbleSelectedRow();"
                -->
                </form>
                <button class="btn yellow" onclick="clearContent_e();">Clear</button>
                <!-- Adding details to database -->
                <?php
                if (isset($_POST['add_e'])) {
                    // echo '<script type="text/javascript"> alert("button working")</script>';
                    $event_id = $_POST['event_id'];
                    $event_name = $_POST['event_name'];
                    $college_name = $_POST['college_name'];
                    $event_date = $_POST['event_date'];
                    $username_e = $_POST['username_e'];
                    $query = "SELECT * from event_details WHERE event_id='$event_id'";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) == 0) {
                        $query = "INSERT into event_details values('$event_id','$event_name','$college_name','$event_date',0)";
                        $query_run = mysqli_query($con, $query);
                        $query = "INSERT into organizer_events values('$username_e','$event_id')";
                        $query_run = mysqli_query($con, $query);
                    } else {
                        echo '<script type="text/javascript"> alert("Event already exists..")</script>';
                    }
                }

                //  removing details from database 

                if (isset($_POST['remove_e'])) {

                    $event_id = $_POST['event_id'];
                    $quer = "DELETE from event_details WHERE event_id='$event_id'";
                    $query_run = mysqli_query($con, $quer);
                }

                if (isset($_POST['edit_e'])) {
                    $event_id = $_POST['event_id'];
                    $event_name = $_POST['event_name'];
                    $college_name = $_POST['college_name'];
                    $event_date = $_POST['event_date'];


                    $query = "update event_details set event_name='$event_name',college_name='$college_name',event_date='$event_date' where event_id='$event_id'";
                    $query_run = mysqli_query($con, $query);
                }
                ?>
            </div>

        </div>

        <div class="left reverse2">
            <h1>Event Details</h1>
            <table id="table_e" width="100%">
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
    </div>
    <div id="table4">
        <div class="box reverse1" id="signup">
            <div class="signup-form">
                <br>
                <h1>Edit or Add info</h1>
                <form method="POST" action="admin.php">
                    <input type="text" name="username_r" id="username_r" class="input" placeholder="Student Username" required>
                    <br>
                    <input type="text" name="event_id" id="event_id_r" class="input" placeholder="Event ID" required>
                    <br>
                    <br>
                    <!-- <input type="submit" name="signup-btn" value="SignUp"> -->
                    <button class="btn blue" name="add_r">Insert</button>
                    <button class="btn orange" name="edit_r">Update</button>
                    <button class="btn red" name="remove_r">Delete</button>
                    <!-- onclick="addHtmlTableRow();" 
                        onclick="removeSelectedRow();"
                        onclick="editHtmlTbleSelectedRow();"
                -->
                </form>
                <button class="btn yellow" onclick="clearContent_r();">Clear</button>
                <!-- Adding details to database -->
                <?php
                if (isset($_POST['add_r'])) {
                    // echo '<script type="text/javascript"> alert("button working")</script>';
                    $event_id = $_POST['event_id'];
                    $username_r = $_POST['username_r'];
                    $query = "SELECT * from registered WHERE event_id='$event_id' and username='$username_r'";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) == 0) {
                        $query = "INSERT into registered values('$username_r','$event_id')";
                        $query_run = mysqli_query($con, $query);
                        $query = "INSERT into organizer_events values('$username_r','$event_id')";
                        $query_run = mysqli_query($con, $query);
                    } else {
                        echo '<script type="text/javascript"> alert("User already registered with the event..")</script>';
                    }
                }

                //  removing details from database 

                if (isset($_POST['remove_r'])) {

                    $event_id = $_POST['event_id'];
                    $quer = "DELETE from registered WHERE event_id='$event_id'";
                    $query_run = mysqli_query($con, $quer);
                }

                if (isset($_POST['edit_r'])) {
                    $event_id = $_POST['event_id'];
                    $username_r = $_POST['username_r'];


                    $query = "update registered set username='$username',event_id='$event_id' where event_id='$event_id' or username='$username'";
                    $query_run = mysqli_query($con, $query);
                }
                ?>
            </div>

        </div>

        <div class="left reverse2">
            <h1>Registered Event Details</h1>
            <table id="table_r" width="100%">
                <tr>
                    <th>Username</th>
                    <th>Event ID</th>
                </tr>
                <!-- displaying data in webpage -->
                <?php
                $query = "SELECT * from registered";
                $query_run = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($query_run, MYSQLI_ASSOC)) {
                    echo "<tr><td>";
                    echo $row['username'];
                    echo "</td><td>";
                    echo $row['event_id'];
                    echo "</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>





    <script>
        document.getElementById("table1").style.display = "none";
        document.getElementById("table2").style.display = "none";
        document.getElementById("table3").style.display = "none";
        document.getElementById("table4").style.display = "none";
    </script>


    <!-- for edit,delete option -->
    <script>
        // student
        var rIndex,
            table = document.getElementById("table");
        // organizer
        var rIndex_o,
            table_o = document.getElementById("table_o");

        var rIndex_e,
            table_e = document.getElementById("table_e");

        var rIndex_r,
            table_r = document.getElementById("table_r");

        // display selected row data into input text
        function selectedRowToInput() {

            for (var i = 1; i < table.rows.length; i++) {
                table.rows[i].onclick = function() {
                    // get the seected row index
                    rIndex = this.rowIndex;
                    document.getElementById("username").value = this.cells[0].innerHTML;
                    document.getElementById("name").value = this.cells[1].innerHTML;
                    document.getElementById("email").value = this.cells[2].innerHTML;
                    document.getElementById("contact").value = this.cells[3].innerHTML;
                    document.getElementById("gender").value = this.cells[4].innerHTML;
                    document.getElementById("address").value = this.cells[5].innerHTML;
                };
            }
        }
        selectedRowToInput();

        // for organizer
        function selectedRowToInput_o() {

            for (var i = 1; i < table_o.rows.length; i++) {
                table_o.rows[i].onclick = function() {
                    // get the seected row index
                    rIndex_o = this.rowIndex;
                    document.getElementById("username_o").value = this.cells[0].innerHTML;
                    document.getElementById("name_o").value = this.cells[1].innerHTML;
                    document.getElementById("email_o").value = this.cells[2].innerHTML;
                    document.getElementById("contact_o").value = this.cells[3].innerHTML;
                    document.getElementById("gender_o").value = this.cells[4].innerHTML;
                    document.getElementById("address_o").value = this.cells[5].innerHTML;
                };
            }
        }
        selectedRowToInput_o();

        // for event
        function selectedRowToInput_e() {

            for (var i = 1; i < table_e.rows.length; i++) {
                table_e.rows[i].onclick = function() {
                    // get the seected row index
                    rIndex_e = this.rowIndex;
                    document.getElementById("event_id").value = this.cells[0].innerHTML;
                    document.getElementById("event_name").value = this.cells[1].innerHTML;
                    document.getElementById("college_name").value = this.cells[2].innerHTML;
                    document.getElementById("event_date").value = this.cells[3].innerHTML;
                };
            }
        }
        selectedRowToInput_e();

        function selectedRowToInput_r() {

            for (var i = 1; i < table_r.rows.length; i++) {
                table_r.rows[i].onclick = function() {
                    // get the seected row index
                    rIndex_r = this.rowIndex;
                    document.getElementById("event_id_r").value = this.cells[1].innerHTML;
                    document.getElementById("username_r").value = this.cells[0].innerHTML;
                };
            }
        }
        selectedRowToInput_r();
        // to clear the values from the input field
        function clearContent() {
            document.getElementById("name").value = "";
            document.getElementById("username").value = "";
            document.getElementById("email").value = "";
            document.getElementById("contact").value = "";
            document.getElementById("gender").value = "";
            document.getElementById("address").value = "";
        }

        function clearContent_o() {
            document.getElementById("name_o").value = "";
            document.getElementById("username_o").value = "";
            document.getElementById("email_o").value = "";
            document.getElementById("contact_o").value = "";
            document.getElementById("gender_o").value = "";
            document.getElementById("address_o").value = "";
        }

        
    </script>
    <script>
        function clearContent_e() {
            document.getElementById("event_id").value = "";
            document.getElementById("event_name").value = "";
            document.getElementById("college_name").value = "";
            document.getElementById("event_date").value = "";
            document.getElementById("username_e").value = "";
        }

        function clearContent_r() {
            document.getElementById("event_id_r").value = "";
            document.getElementById("username_r").value = "";
        }
    </script>
</body>

</html>