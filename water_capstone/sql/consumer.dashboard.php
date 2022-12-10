<?php
include '/xampp/htdocs/water_capstone/dbconnect.php';

$type = $_GET['functionType'];


$today = date('Y-m-d');


if($type == 'notif'){

    $id = $_GET['id'];

$get_notif = "SELECT bill_id,startDate,`dueDate`,cubic,total, DATEDIFF('$today',dueDate) as diff,
(
   CASE 
   WHEN DATEDIFF('$today',dueDate) <= 0 THEN 'You have a pending  bill due this month  '
   WHEN DATEDIFF('$today',dueDate) >= 1 && DATEDIFF('$today',dueDate) < 30 THEN 'You have a pending  bill this month with penalty'
   WHEN DATEDIFF('$today',dueDate) >= 1 && DATEDIFF('$today',dueDate) >= 30 THEN 'inactive'

   ELSE 'no penalty'
   END) as notif
FROM bill
INNER JOIN consumer ON bill.cid = consumer.consumer_id
WHERE status = 'pending' AND (
   CASE 
   WHEN DATEDIFF('$today',dueDate) <= 0 THEN 'no penalty'
   WHEN DATEDIFF('$today',dueDate) >= 1 && DATEDIFF('$today',dueDate) < 30 THEN 'penalty'
   WHEN DATEDIFF('$today',dueDate) >= 1 && DATEDIFF('$today',dueDate) >= 30 THEN 'inactive'

   ELSE 'no penalty'
   END) != 'inactive' AND cid = '$id' AND status = 'pending';";


$result = mysqli_query($conn,$get_notif);

$arr = array();

while( $row = mysqli_fetch_assoc($result)){
        $arr [] = $row;
}

echo json_encode($arr);

}
else{

    $id = $_GET['id'];
    
$get_notif = "SELECT SUM(cubic) as cubic_used FROM `bill` WHERE cid = '$id';";


$result = mysqli_query($conn,$get_notif);

$arra = array();

while( $row = mysqli_fetch_assoc($result)){
        $arra [] = $row;
}

echo json_encode($arra);
}




?>