<?php
include '/xampp/htdocs/water_capstone/dbconnect.php';

$type = $_GET['functionType'];

if($type == 'allconcern'){

    $all = "SELECT CONCAT(firstname, ' ', lastname) as fullname, concern_id FROM concern 
    INNER JOIN consumer ON concern.cid = consumer.consumer_id WHERE concern_text != '' ORDER BY concern_id DESC";

    $arr = array();

    $res = mysqli_query($conn, $all);

    while($row = mysqli_fetch_assoc($res)){
        $arr [] = $row;
    }

    echo json_encode($arr);

}
else if($type == 'resolve')
{

    $coid = $_GET['coid'];

    $resolve = "DELETE FROM concern WHERE concern_id = '$coid'";


    $res = mysqli_query($conn, $resolve);

    if($res){
        echo 0;
    }
    else{
        echo 1;
    }

    


}
else{

    $coid = $_GET['coid'];
    
    $one = "SELECT concern_text, concern_filename FROM concern WHERE concern_id = '$coid'";

    $arr = array();

    $res = mysqli_query($conn, $one);

    while($row = mysqli_fetch_assoc($res)){
        $arr [] = $row;
    }

    echo json_encode($arr);

}



?>