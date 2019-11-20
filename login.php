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
    <link rel="stylesheet" href="./CSS/login.css">
    <title>Login/Signup</title>

</head>

<body>
    <div class="container">
        <div class="box" id="login">
            <div class="login-form">
                <h1>Login</h1>
                <br>
                <br>
                <form action="login.php" method="post">
                    <input type="text" name="usernm" class="inp" placeholder="Username" required>
                    <br>
                    <input type="password" name="pass" class="inp" placeholder="Password" required>
                    <br><br>


                    <input type="radio" name="user-type" value="admin" class="radio-btn" checked style=" margin: 0;height: 20px;width: 20px;">&nbsp; <span style="color:#86c323">Admin</span> &nbsp;&nbsp;

                    <input type="radio" name="user-type" value="organizer" class="radio" style=" margin: 0;height: 20px;width: 20px;"> &nbsp; <span style="color:#86c323">Orgainzer</span>&nbsp;&nbsp;

                    <input type="radio" name="user-type" value="student" class="radio" style=" margin: 0;height: 20px;width: 20px;">&nbsp; <span  style="color:#86c323">Student</span>
                    <br>
                    <br>
                    <button class="btn" name="login-btn">Login</button>
                </form>

                <?php
                    if(isset($_POST['login-btn'])){
                        $usernm = $_POST['usernm'];
                        $pass = $_POST['pass'];
                        $user_type = $_POST['user-type'];
                        $quer = "SELECT * from login_details WHERE username='$usernm' AND passwrd='$pass' AND user_type='$user_type'";
                        $query_ru = mysqli_query($con,$quer);
                        if(mysqli_num_rows($query_ru)>0){
                            $_SESSION["usernm"]=$usernm;
                            if($user_type == 'admin'){

                                header('location:admin.php');
                            }
                            else if($user_type == 'organizer'){
                                header('location:organizer.php');
                            }
                            else if($user_type == 'student'){
                                header('location:student.php');
                            }
                        }
                        else
                        {
                            echo'<script type="text/javascript"> alert("invalid")</script>';
                        }
                    }
                ?>

            </div>
        </div>
        <div class="box" id="signup">
            <div class="signup-form">
                <h1>Signup</h1>
                <br>
                <br>
                <form action="login.php" method="post">
                    <input type="text" name="name" class="input" placeholder="Name" required>
                    <br>
                    <input type="text" name="username" class="input" placeholder="Username" required>
                    <br>
                    <input type="text" name="email" class="input" placeholder="Email" required>
                    <br>
                    <input type="password" name="password" class="input" placeholder="Password" required>
                    <br>
                    <input type="password" name="cpassword" class="input" placeholder="Confirm Password" required>
                    <br>
                    <input type="number" name="contact" class="input contact" placeholder="Contact Number" required>
                    <br>
                    <input type="radio" name="gender" value="Male" checked>Male &nbsp &nbsp
                    <input type="radio" name="gender" value="Female">Female <br>
                    <input type="text" name="address" class="input" placeholder="Address" required>
                    <br>
                    <input type="radio" name="user-type-r" value="student" checked>Student &nbsp
                    <input type="radio" name="user-type-r" value="organizer">Orgainzer 
                    <br>
                    <br>
                    <!-- <input type="submit" name="signup-btn" value="SignUp"> -->
                    <button class="btn" id="ba" name="signup-btn">Signup</button>
                </form>
                <?php
                    if(isset($_POST['signup-btn'])){
                        // echo '<script type="text/javascript"> alert("button working")</script>';
                        $name = $_POST['name'];
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $cpassword = $_POST['cpassword'];
                        $contact = $_POST['contact'];
                        $gender = $_POST['gender'];
                        $address = $_POST['address'];
                        $user_type_r = $_POST['user-type-r'];

                        if($password == $cpassword){
                            
                            $query = "select * from login_details WHERE username='$username'";
                            $query_run = mysqli_query($con,$query);

                            if(mysqli_num_rows($query_run)>0){
                                echo '<script type="text/javascript"> alert("User already exists..or try with a new username")</script>';
                            }
                            {
                                // if the user is a student adding details to student_details table
                                if($user_type_r == 'student'){

                                    $query = "insert into student_details values('$username','$name','$email','$contact','$gender','$address')";
                                    $query_run = mysqli_query($con,$query);
                                }
                                else{
                                    // if user is a organizer ,adding details to organizer_details table
                                    $query = "insert into organizer_details values('$username','$name','$email','$contact','$gender','$address')";
                                    $query_run = mysqli_query($con,$query);
                                }
                                $query= "insert into login_details values('$username','$password','$user_type_r')";
                                $query_run = mysqli_query($con,$query);
                            }
                            if($query_run){
                                echo '<script type="text/javascript"> alert("User registered..")</script>';

                            }
                            else
                            {
                                echo ' <script type="text/javascript"> alert("User already exists.. Please Login")</script>';
                            }
                        
                        }
                        else{
                            echo ' <script type="text/javascript"> alert("Password does not match")</script>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>

</html>