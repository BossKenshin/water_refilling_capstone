<?php
include '/xampp/htdocs/water_capstone/dbconnect.php';

$typeOfFunction = $_POST['functionType'];


if($typeOfFunction == 'fetchbill'){

    $user = $_POST['user'];


    $getbill = "
    SELECT bill_id,startDate,`dueDate`,cubic,total, DATEDIFF('2022-12-09',dueDate) as diff
    FROM bill
    INNER JOIN consumer ON bill.cid = consumer.consumer_id
    WHERE status = 'pending' AND (
        CASE 
        WHEN DATEDIFF('2022-12-09',dueDate) <= 0 THEN 'no penalty'
        WHEN DATEDIFF('2022-12-09',dueDate) >= 1 && DATEDIFF('2022-12-09',dueDate) < 30 THEN 'penalty'
        WHEN DATEDIFF('2022-12-09',dueDate) >= 1 && DATEDIFF('2022-12-09',dueDate) >= 30 THEN 'inactive'
    
        ELSE 'no penalty'
        END) != 'inactive' AND user = '$user';";

        $res = mysqli_query($conn, $getbill);
    
        $arr = array();
        
        while($row = mysqli_fetch_assoc($res)){
            $arr [] = $row;
        }
        
        echo json_encode($arr);
        

}
else if($typeOfFunction == 'paybillonline'){

    $proof_filename = $_FILES['proof']['name'];
    $proof_file_tmp = $_FILES['proof']['tmp_name'];
    $proof = str_replace(" ", "", $proof_filename);

    $bill_id = $_POST['bid'];


    $paybill = "UPDATE bill SET payment_type = 'Online', status = 'toconfirm' WHERE bill_id = '$bill_id'";
    $setproof = "INSERT INTO `payment_proof`( `bill_id`, `proof_filename`) 
    VALUES ('$bill_id','$proof')";

    $res1 = mysqli_query($conn, $paybill);
    $res2 = mysqli_query($conn, $setproof);

    if($res1 && $res2){
        move_uploaded_file($proof_file_tmp, "C:/xampp/htdocs/water_capstone/proof/" .$proof);
        echo 0;
    }
    else{
        echo 1;
    }

}
else if($typeOfFunction == 'history'){


    $user = $_POST['user'];


    $getbillhistory = "SELECT `startDate`,`dueDate`,`cubic`,`total` FROM `bill`
    INNER JOIN consumer ON bill.cid = consumer.consumer_id 
    WHERE user = '$user' AND status = 'paid' ORDER BY dueDate DESC";

        $res = mysqli_query($conn, $getbillhistory);
    
        $arr = array();
        
        while($row = mysqli_fetch_assoc($res)){
            $arr [] = $row;
        }
        
        echo json_encode($arr);

}


?>