<?php
include '/xampp/htdocs/water_capstone/dbconnect.php';


$y = $_GET['year'];

$report = "SELECT MONTH(`dueDate`) as month,
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
)as month_title,
YEAR(`dueDate`) as year, SUM(total) as sales, SUM(cubic) as cubic FROM bill WHERE YEAR(dueDate) = '$y'
 GROUP BY MONTH(dueDate) ORDER BY MONTH(dueDate) AND YEAR(dueDate)";

 $res = mysqli_query($conn,$report);

 $arr = array();

 while($row = mysqli_fetch_assoc($res)){
    $arr [] =$row;
 }

 echo json_encode($arr);

?>