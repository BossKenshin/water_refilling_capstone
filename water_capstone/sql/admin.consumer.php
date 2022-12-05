<?php

include '/xampp/htdocs/water_capstone/dbconnect.php';

$type = $_POST['functionType'];


if($type == 'insert'){

    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $ph = $_POST['phone'];
    $address = $_POST['address'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $profile_filename = $_FILES['profile']['name'];
    $profile_file_tmp = $_FILES['profile']['tmp_name'];
    $profile = str_replace(" ", "", $profile_filename);

    $qr_file_name = $_FILES['qrcode']['name'];
    $qr_file_tmp = $_FILES['qrcode']['tmp_name']; 
    $qrcode = str_replace(" ", "", $user.$qr_file_name);

    $sql_insert = "INSERT INTO `consumer`( `firstname`, `lastname`, `phone`,`address`, `user`, `pass`, `qrcode`, `profile`)
     VALUES ('$fn','$ln','$ph','$address','$user','$pass','$qrcode','$profile')";

     $result = mysqli_query($conn, $sql_insert);

     if($result){
        move_uploaded_file($profile_file_tmp, "C:/xampp/htdocs/water_capstone/consumerprofile/" . $profile);
        rename($qr_file_tmp, "C:/xampp/htdocs/water_capstone/qrcode/" . $qrcode);

        echo 0;

     }
     else{
        echo 1;
     }


}
else if($type == 'fetch'){

    $sql_fetch = "SELECT consumer_id as id, CONCAT(firstname,' ',lastname) as fullname, phone, address, user FROM consumer";

    $res = mysqli_query($conn, $sql_fetch);

    $arr = array();
    
    while($row = mysqli_fetch_assoc($res)){
        $arr [] = $row;
    }
    
    echo json_encode($arr);

}
else if($type == 'updatewpic'){


    $id = $_POST['id'];
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $ph = $_POST['ph'];
    $address = $_POST['address'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $profile_filename = $_FILES['profile']['name'];
    $profile_file_tmp = $_FILES['profile']['tmp_name'];
    $profile = str_replace(" ", "", $profile_filename);

    $qr_file_name = $_FILES['qrcode']['name'];
    $qr_file_tmp = $_FILES['qrcode']['tmp_name']; 
    $qrcode = str_replace(" ", "", $user.$qr_file_name);

    $sql_update_consumer = "UPDATE `consumer` SET `firstname`='$fn',`lastname`='$ln',
    `phone`='$ph',`address`='$address',`user`='$user',`pass`='$pass',`qrcode`='$qrcode',`profile`='$profile' WHERE consumer_id='$id'";


    $result = mysqli_query($conn, $sql_update_consumer);

    if($result){
        move_uploaded_file($profile_file_tmp, "C:/xampp/htdocs/water_capstone/consumerprofile/" . $profile);
        rename($qr_file_tmp, "C:/xampp/htdocs/water_capstone/qrcode/" . $qrcode);
        echo 0;
    }
    else{
        echo 1;
    }
    

}
else if($type == 'updatewopic'){

    
    $id = $_POST['id'];
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $ph = $_POST['ph'];
    $address = $_POST['address'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if(isset($_FILES['qrcode']['name'])){

    $qr_file_name = $_FILES['qrcode']['name'];
    $qr_file_tmp = $_FILES['qrcode']['tmp_name']; 
    $qrcode = str_replace(" ", "", $user.$qr_file_name);

    $sql_update_consumer = "UPDATE `consumer` SET `firstname`='$fn',`lastname`='$ln',
    `phone`='$ph',`address`='$address',`user`='$user',`pass`='$pass',`qrcode`='$qrcode' WHERE consumer_id='$id'";


    $result = mysqli_query($conn, $sql_update_consumer);

    if($result){
        move_uploaded_file($qr_file_tmp, "C:/xampp/htdocs/water_capstone/qrcode/" . $qrcode);
        echo 0;
    }
    else{
        echo 1;
    }
}else{
    echo 1;

}

}
else if($type == 'view'){

    $id = $_POST['id'];

    $sql_fetch = "SELECT * FROM `consumer` WHERE consumer_id = '$id'";

    $res = mysqli_query($conn, $sql_fetch);

    $arr = array();
    
    while($row = mysqli_fetch_assoc($res)){
        $arr [] = $row;
    }
    
    echo json_encode($arr);
}

else {
    $id = $_POST['id'];

    $delete = "DELETE FROM `consumer` WHERE consumer_id = '$id'";


    $res = mysqli_query($conn, $delete);

    if ($res) {
        echo 0;
    } else {
        echo 1;
    }
}






?>