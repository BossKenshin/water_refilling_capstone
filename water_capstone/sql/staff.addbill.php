<?php
include '/xampp/htdocs/water_capstone/dbconnect.php';

$typeOfFunction = $_POST['functionType'];


if($typeOfFunction == 'insert'){
    $id = $_POST['id'];


    $check_bill = "SELECT bill_id FROM bill WHERE cid = '$id' AND status = 'pending'";

    $res = mysqli_query($conn, $check_bill);

    $rows = mysqli_num_rows($res);

    if($rows == 0){
        $start = $_POST['start'];
        $due = $_POST['due'];
        $cubic = $_POST['cubic'];
        $total = $_POST['total'];
        $staff = $_POST['staff'];
    
        $addbill = "INSERT INTO `bill`( `cid`, `startDate`, `dueDate`, `cubic`, `total`,  `staff`)
         VALUES ('$id',' $start','$due','$cubic','$total','$staff')";
    
         $result = mysqli_query($conn, $addbill);
    
    
         if($result){
            echo 0;
         }
         else{
            echo 1;
         }  
    }
    else{
        echo 2;
    }

   

}
else if($typeOfFunction == 'fetchBillCounter'){

   $id =  $_POST['id'];


    $sql_get_bill = "SELECT * FROM bill WHERE cid = '$id' AND status = 'pending'";

    $result = mysqli_query($conn, $sql_get_bill);

    $bill_arr = array();

    while($row = mysqli_fetch_assoc($result)){

        $bill_arr [] = $row;

    }

    echo json_encode($bill_arr);


}
else if($typeOfFunction == 'paid'){

    $id =  $_POST['id'];
    $payment = $_POST['paymentType'];

    $pay_bill = "UPDATE bill SET status = 'paid', payment_type = '$payment' WHERE cid = '$id' AND status = 'pending'";

    $result = mysqli_query($conn, $pay_bill);

    if($result){
        echo 0;

    }
    else{
        echo 1;
    }


}
else if($typeOfFunction == 'delete'){

    $id =  $_POST['id'];

    $delete_bill ="DELETE FROM bill WHERE cid = '$id' and status = 'pending'";

    $result = mysqli_query($conn, $delete_bill);

    if($result){
        echo 0;

    }
    else{
        echo 1;
    }

}




?>