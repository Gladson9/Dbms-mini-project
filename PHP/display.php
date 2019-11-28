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