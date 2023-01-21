<?php
include '/xampp/htdocs/water_capstone/dbconnect.php';


$y = $_GET['year'];
$m = $_GET['month'];


$report = "SELECT CONCAT(consumer.firstname,' ',consumer.lastname) AS consumer,
(CASE
 
WHEN MONTH(`dueDate`) = 1 THEN 'JANUARY'
WHEN MONTH(`dueDate`) = 2 THEN 'FEBRUARY'
WHEN MONTH(`dueDate`) = 3 THEN 'MARCH'
WHEN MONTH(`dueDate`) = 4 THEN 'APRIL'
WHEN MONTH(`dueDate`) = 5 THEN 'MAY'
WHEN MONTH(`dueDate`) = 6 THEN 'JUNE'
WHEN MONTH(`dueDate`) = 7 THEN 'JULY'
WHEN MONTH(`dueDate`) = 8 THEN 'AUGUST'
WHEN MONTH(`dueDate`) = 9 THEN 'SEPTEMBBER'
WHEN MONTH(`dueDate`) = 10 THEN 'OCTOBER'
WHEN MONTH(`dueDate`) = 11 THEN 'NOVEMBER'
WHEN MONTH(`dueDate`) = 12 THEN 'DECEMBER'
 END
)as month_title,`paidDate`,`cubic`,`total`,`payment_type`
FROM `bill` 
INNER JOIN consumer ON bill.cid = consumer.consumer_id
WHERE YEAR(dueDate) = '$y' AND MONTH(dueDate) = '$m';";

 $res = mysqli_query($conn,$report);

 $arr = array();

 while($row = mysqli_fetch_assoc($res)){
    $arr [] =$row;
 }

 echo json_encode($arr);

?>