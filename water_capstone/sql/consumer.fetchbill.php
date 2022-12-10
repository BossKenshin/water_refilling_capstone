<?php
include '/xampp/htdocs/water_capstone/dbconnect.php';

$typeOfFunction = $_POST['functionType'];

$today = date("Y-m-d");

 if($typeOfFunction == 'onDateConsumer'){


    $fetch = "SELECT  consumer_id as id, CONCAT(firstname,' ',lastname) as fullname, phone, address, user,cid, dueDate, DATEDIFF(dueDate, '$today') AS DateDiff FROM `bill`
    INNER JOIN consumer ON bill.cid = consumer.consumer_id 
    WHERE '$today' <= dueDate AND status ='pending';";
    
    $res = mysqli_query($conn, $fetch);
    
    $arr = array();
    
    while($row = mysqli_fetch_assoc($res)){
        $arr [] = $row;
    }
    
    echo json_encode($arr);
    
    
    }
    else if($typeOfFunction == 'onPenaltyConsumer'){
        $fetch = "SELECT  consumer_id as id, CONCAT(firstname,' ',lastname) as fullname, phone, address, user,cid, dueDate, DATEDIFF('$today',dueDate) AS DateDiff FROM `bill`
        INNER JOIN consumer ON bill.cid = consumer.consumer_id 
        WHERE  '$today' > dueDate AND status ='pending' AND DATEDIFF('$today',dueDate ) < 30";
    
    $res = mysqli_query($conn, $fetch);
    
    $arr = array();
    
    while($row = mysqli_fetch_assoc($res)){
        $arr [] = $row;
    }
    
    echo json_encode($arr);
    }
    else if($typeOfFunction == 'onInactiveConsumer'){
        $fetch = "SELECT  consumer_id as id, CONCAT(firstname,' ',lastname) as fullname, phone, address, user,cid, dueDate, (DATEDIFF('$today',dueDate) / 30)  as mo FROM `bill`
        INNER JOIN consumer ON bill.cid = consumer.consumer_id 
        WHERE  '$today' > dueDate AND status ='pending' AND DATEDIFF('$today',dueDate ) >= 30";
    
    $res = mysqli_query($conn, $fetch);
    
    $arr = array();
    
    while($row = mysqli_fetch_assoc($res)){
        $arr [] = $row;
    }
    
    echo json_encode($arr);
    }
    
    else if($typeOfFunction == 'onlinePaidConsumer'){
        $fetch = "SELECT  consumer_id as id, CONCAT(firstname,' ',lastname) as fullname, phone, address, user,cid, dueDate, DATEDIFF('$today',dueDate) as datediff,proof_filename FROM `payment_proof`
        INNER JOIN bill ON payment_proof.bill_id = bill.bill_id
        INNER JOIN consumer ON bill.cid = consumer.consumer_id 
        WHERE status ='toConfirm';";
    
    $res = mysqli_query($conn, $fetch);
    
    $arr = array();
    
    while($row = mysqli_fetch_assoc($res)){
        $arr [] = $row;
    }
    
    echo json_encode($arr);
    }
    

?>