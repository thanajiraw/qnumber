<?php
include "dbConn.php"; // Using database connection file here

if(isset($_POST['submit']))
{		
    $fullname = $_POST['name'];
    $number = $_POST['num'];
    $startnum = $_POST['startnum'];
    $year = $_POST['year'];

    $insert = mysqli_query($db,"INSERT INTO `type`(`TypeNumber`,`Name`,`current_number`,`current_year`) VALUES ('$number','$fullname','$startnum','$year')");

    if(!$insert)
    {
        echo mysqli_error();
    }
    else
    {
        echo "<script>";
        echo "alert('เพิ่มประเภทเรียบร้อยแล้ว');"; 
        echo "window.location.href = 'Booktype.php';";
        echo "</script>";
    }
}

mysqli_close($db); // Close connection