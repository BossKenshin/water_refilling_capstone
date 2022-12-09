<?php
include '/xampp/htdocs/water_capstone/dbconnect.php';

$acc = $_GET['typeAcc'];

$id = $_GET['id'];
if($acc == 'admin'){


    $admin = "SELECT * FROM admin WHERE admin_id = '$id';";

    $res = mysqli_query($conn, $admin);

    $arr = array();

    while($row = mysqli_fetch_assoc($res)){
        $arr [] = $row;
    }

    echo json_encode($arr);
}
else if($acc == 'staff'){

    $staff = "SELECT * FROM staff WHERE staff_id = '$id';";

    $res = mysqli_query($conn, $staff);

    $arr = array();

    while($row = mysqli_fetch_assoc($res)){
        $arr [] = $row;
    }

    echo json_encode($arr);
}
else{
    $consumer = "SELECT * FROM consumer WHERE consumer_id = '$id';";

    $res = mysqli_query($conn, $consumer);

    $arr = array();

    while($row = mysqli_fetch_assoc($res)){
        $arr [] = $row;
    }

    echo json_encode($arr);
}

?>