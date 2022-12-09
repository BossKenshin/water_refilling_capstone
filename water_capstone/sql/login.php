<?php
include '/xampp/htdocs/water_capstone/dbconnect.php';

$typeOfFunction = $_GET['functionType'];


 if($typeOfFunction == 'staff'){

    $user = $_GET['user'];
    $pass = $_GET['pass'];

    $sql = "SELECT *, 'staff' as acctype FROM staff WHERE staff_username = '$user' AND staff_password = '$pass'";

    $res = mysqli_query($conn, $sql);

    $arr = array();


       while($row = mysqli_fetch_assoc($res)){
            $arr [] = $row;
       }
      echo json_encode($arr);

 }
 else if($typeOfFunction == 'admin'){

    $user = $_GET['user'];
    $pass = $_GET['pass'];

    $sql = "SELECT *, 'admin' as acctype FROM admin WHERE admin_username = '$user' AND admin_password = '$pass'";

    $res = mysqli_query($conn, $sql);

    $arr = array();


       while($row = mysqli_fetch_assoc($res)){
            $arr [] = $row;
       }
      echo json_encode($arr);
 }
 else{

    $user = $_GET['user'];
    $pass = $_GET['pass'];

    $sql = "SELECT *, 'consumer' as acctype FROM consumer WHERE user = '$user' AND pass = '$pass'";

    $res = mysqli_query($conn, $sql);

    $arr = array();


       while($row = mysqli_fetch_assoc($res)){
            $arr [] = $row;
       }
      echo json_encode($arr);
 }
    

?>