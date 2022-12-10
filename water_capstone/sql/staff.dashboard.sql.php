<?php
include '/xampp/htdocs/water_capstone/dbconnect.php';

$type = $_GET['functionType'];

$today = date('Y-m-d');

if($type == 'penalty'){

    $penalty = "SELECT COUNT(bill_id) as sum
    FROM bill
    INNER JOIN consumer ON bill.cid = consumer.consumer_id
    WHERE DATEDIFF('$today ',dueDate) >= 1 && DATEDIFF('$today ',dueDate) < 30 AND status = 'pending'";
    
    $res = mysqli_query($conn,$penalty);

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

    $inactive = "SELECT COUNT(bill_id) as sum
    FROM bill
    INNER JOIN consumer ON bill.cid = consumer.consumer_id
    WHERE DATEDIFF('$today ',dueDate) >= 1 && DATEDIFF('$today ',dueDate) >= 30 AND status = 'pending'";
    
    $res = mysqli_query($conn,$inactive);

    $arr = array();

    while($row = mysqli_fetch_assoc($res)){
        $arr [] = $row;
    }

    echo json_encode($arr);
}


?>