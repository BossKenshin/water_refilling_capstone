<?php

include '/xampp/htdocs/water_capstone/dbconnect.php';

$typeOfFunction = $_POST['functionType'];


if ($typeOfFunction == 'insert') {


    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $new_file_name = str_replace(" ", "", $file_name);




    $insert = "INSERT INTO `staff`(`staff_firstname`, `staff_lastname`, `staff_username`, `staff_password`, `staff_pic`) 
VALUES ('$fn','$ln','$user','$pass','$new_file_name')";


    $res = mysqli_query($conn, $insert);

    if ($res) {
        move_uploaded_file($file_tmp, "C:/xampp/htdocs/water_capstone/profile/" . $new_file_name);

        echo 0;
    } else {
        echo 1;
    }
} else if ($typeOfFunction == 'updatewpic') {

    $id = $_POST['id'];
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];



    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $new_file_name = str_replace(" ", "", $file_name);




    $update = "UPDATE staff SET staff_firstname='$fn', staff_lastname='$ln', staff_username='$user', 
staff_password='$pass', staff_pic='$new_file_name' WHERE staff_id = '$id'";


    $res = mysqli_query($conn, $update);

    if ($res) {
        move_uploaded_file($file_tmp, "C:/xampp/htdocs/water_capstone/profile/" . $new_file_name);

        echo 0;
    } else {
        echo 1;
    }
}
else if ($typeOfFunction == 'updatewopic') {

    $id = $_POST['id'];
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $update = "UPDATE staff SET staff_firstname='$fn', staff_lastname='$ln', staff_username='$user', 
staff_password='$pass' WHERE staff_id = '$id'";


    $res = mysqli_query($conn, $update);

    if ($res) {

        echo 0;
    } else {
        echo 1;
    }
}
else if($typeOfFunction == 'fetch'){


$fetch = "SELECT staff_id as id, CONCAT(`staff_firstname`,' ',`staff_lastname`) as fullname, staff_pic as pic FROM `staff` ";

$res = mysqli_query($conn, $fetch);

$arr = array();

while($row = mysqli_fetch_assoc($res)){
    $arr [] = $row;
}

echo json_encode($arr);


}

else if($typeOfFunction == 'view'){

    $id = $_POST['id'];


    $fetch = "SELECT * FROM staff WHERE staff_id = '$id'";
    
    $res = mysqli_query($conn, $fetch);
    
    $arr = array();
    
    while($row = mysqli_fetch_assoc($res)){
        $arr [] = $row;
    }
    
    echo json_encode($arr);
    
    
    }


else {
    $id = $_POST['id'];

    $delete = "DELETE FROM `staff` WHERE staff_id = '$id'";


    $res = mysqli_query($conn, $delete);

    if ($res) {
        echo 0;
    } else {
        echo 1;
    }
}
