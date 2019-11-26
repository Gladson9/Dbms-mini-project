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
    <script src="./JS/display.js"></script>
</head>

<body>
    <h1>Admin Page</h1>
    <br>
    <nav>
        <ul>
            <li> <a href="./index.html">LOGOUT</a></li>
        </ul>
    </nav>
    <div class="btns">
        <button onclick="show(1)">Student Details</button>
        <button onclick="show(2)">Organizer Details</button>
        <button onclick="show(3)">Event Details</button>
        <br>
        <br>
    </div>

    <div id="table1">
        <div class="left">
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



                $query = "SELECT username,name,email,contact,gender,address from student_details";
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

        <div class="box" id="signup">
            <div class="signup-form">
                <br>
                <h1>Edit or Add info</h1>
                <form method="POST">
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
                    <button class="btn" id="add" name="add">Add</button>
                    <button class="btn" name="edit">Edit</button>
                    <button class="btn" name="remove">Remove</button>
                    <!-- onclick="addHtmlTableRow();" 
                        onclick="removeSelectedRow();"
                        onclick="editHtmlTbleSelectedRow();"
                -->
                </form>
                <button class="btn" name="" onclick="clearContent();">Clear</button>
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
                    } {
                        // if the user is a student adding details to student_details table
                        $query = "insert into student_details values('$username','$name','$email','$contact','$gender','$address')";
                        $query_run = mysqli_query($con, $query);
                    }
                    $query = "insert into login_details values('$username','$password','student')";
                    $query_run = mysqli_query($con, $query);
                }

                //  removing details from database 

                if (isset($_POST['remove'])) {

                    $username = $_POST['username'];
                    $query1 = "delete from login_details WHERE username='$username'";
                    // $query2 = "delete from student_details WHERE username='$username'";
                    $query_run = mysqli_query($con, $query1);
                    // $query_run = mysqli_query($con, $query2);
                }
                $prev_username = $_POST['username'];
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
    </div>
    <div id="table2">
        <div class="left">
            <h1>Organizer Details</h3>
                <table width="100%">
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

        <div class="box" id="signup">
            <div class="signup-form">
                <br>
                <h1>Edit or Add info</h1>
                <form method="POST">
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
                    <button class="btn" id="add" name="add">Add</button>
                    <button class="btn" name="edit">Edit</button>
                    <button class="btn" name="remove">Remove</button>
                    <!-- onclick="addHtmlTableRow();" 
                        onclick="removeSelectedRow();"
                        onclick="editHtmlTbleSelectedRow();"
                -->
                </form>
                <button class="btn" name="" onclick="clearContent();">Clear</button>
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
                    } {
                        // if the user is a student adding details to student_details table
                        $query = "insert into student_details values('$username','$name','$email','$contact','$gender','$address')";
                        $query_run = mysqli_query($con, $query);
                    }
                    $query = "insert into login_details values('$username','$password','student')";
                    $query_run = mysqli_query($con, $query);
                }

                //  removing details from database 

                if (isset($_POST['remove'])) {

                    $username = $_POST['username'];
                    $query1 = "delete from login_details WHERE username='$username'";
                    // $query2 = "delete from student_details WHERE username='$username'";
                    $query_run = mysqli_query($con, $query1);
                    // $query_run = mysqli_query($con, $query2);
                }
                $prev_username = $_POST['username'];
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
    </div>
    <div id="table3">
        <h3 style="color:#ffffff;text-align:center;font-size:30px;">Event Details</h3>
        <table width="100%">
            <tr>
                <th>Event ID</th>
                <th>Event Name</th>
                <th>College Name</th>
                <th>Event Date</th>
            </tr>
            <!-- displaying data in webpage -->
            <?php
            $query = "SELECT event_id,event_name,college_name,event_date from event_details ";
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
    <script>
        document.getElementById("table1").style.display = "none";
        document.getElementById("table2").style.display = "none";
        document.getElementById("table3").style.display = "none";
    </script>


    <!-- for edit,delete option -->
    <script>
        var rIndex,
            table = document.getElementById("table");
        // check the empty input
        function checkEmptyInput() {

            var isEmpty = false,
                name = document.getElementById("name").value,
                username = document.getElementById("username").value,
                email = document.getElementById("email").value,
                contact = document.getElementById("contact").value,
                gender = document.getElementById("gender").value,
                address = document.getElementById("address").value;
            // password = document.getElementById("password").value,
            // usertype = document.getElementById("usertype").value;

            if (name === "" || username === "" || email === "" || contact === "" || gender === "" || address === "") {
                // alert("First Name Connot Be Empty");
                isEmpty = true;
            }
            // else if(lname === ""){
            //     alert("Last Name Connot Be Empty");
            //     isEmpty = true;
            // }
            // else if(age === ""){
            //     alert("Age Connot Be Empty");
            //     isEmpty = true;
            // }
            return isEmpty;
        }

        // add Row
        function addHtmlTableRow() {
            // get the table by id
            // create a new row and cells
            // get value from input text
            // set the values into row cell's
            if (!checkEmptyInput()) {
                var newRow = table.insertRow(table.length),
                    cell1 = newRow.insertCell(0),
                    cell2 = newRow.insertCell(1),
                    cell3 = newRow.insertCell(2),
                    cell4 = newRow.insertCell(3),
                    cell5 = newRow.insertCell(4),
                    cell6 = newRow.insertCell(5),
                    name = document.getElementById("name").value,
                    username = document.getElementById("username").value,
                    email = document.getElementById("email").value,
                    contact = document.getElementById("contact").value,
                    gender = document.getElementById("gender").value,
                    address = document.getElementById("address").value;

                cell2.innerHTML = name;
                cell1.innerHTML = username;
                cell3.innerHTML = email;
                cell4.innerHTML = contact;
                cell5.innerHTML = gender;
                cell6.innerHTML = address;
                // call the function to set the event to the new row
                selectedRowToInput();
            }
        }

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

        function editHtmlTbleSelectedRow() {
            var name = document.getElementById("name").value,
                username = document.getElementById("username").value,
                email = document.getElementById("email").value,
                contact = document.getElementById("contact").value,
                gender = document.getElementById("gender").value,
                address = document.getElementById("address").value;
            if (!checkEmptyInput()) {
                // table.rows[rIndex].cells[0].innerHTML = username;
                // table.rows[rIndex].cells[1].innerHTML = name;
                // table.rows[rIndex].cells[2].innerHTML = email;
                // table.rows[rIndex].cells[3].innerHTML = contact;
                // table.rows[rIndex].cells[4].innerHTML = gender;
                // table.rows[rIndex].cells[5].innerHTML = address;
            }
        }

        function removeSelectedRow() {
            if (rIndex >= 1) {
                table.deleteRow(rIndex);
            }
            // clear input text
            // document.getElementById("name").value = "";
            // document.getElementById("username").value = "";
            // document.getElementById("email").value = "";
            // document.getElementById("contact").value = "";
            // document.getElementById("gender").value = "";
            // document.getElementById("address").value = "";
        }

        function clearContent() {
            document.getElementById("name").value = "";
            document.getElementById("username").value = "";
            document.getElementById("email").value = "";
            document.getElementById("contact").value = "";
            document.getElementById("gender").value = "";
            document.getElementById("address").value = "";
        }
    </script>
</body>

</html>