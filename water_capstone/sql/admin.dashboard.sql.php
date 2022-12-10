<?php
include '/xampp/htdocs/water_capstone/dbconnect.php';

$type = $_GET['functionType'];

if($type == 'staff'){

    $staff = "SELECT COUNT(staff_id) as sum FROM staff";
    
    $res = mysqli_query($conn,$staff);

    $arr = array();

    while($row = mysqli_fetch_assoc($res)){
        $arr [] = $row;
    }

    echo json_encode($arr);

}
else if($type == 'consumer'){


    $consumer = "SELECT COUNT(consumer_id) as sum FROM consumer";
    
    $res = mysqli_query($conn,$consumer);

    $arr = array();

    while($row = mysqli_fetch_assoc($res)){
        $arr [] = $row;
    }

    echo json_encode($arr);
}
else{
    $concern = "SELECT COUNT(concern_id) as sum FROM concern WHERE concern_text != ''";
    
    $res = mysqli_query($conn,$concern);

    $arr = array();

    while($row = mysqli_fetch_assoc($res)){
        $arr [] = $row;
    }

    echo json_encode($arr);
}


?>