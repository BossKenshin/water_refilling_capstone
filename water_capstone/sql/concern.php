<?php
include '/xampp/htdocs/water_capstone/dbconnect.php';

$type = $_POST['type'];


if($type == 'wopic'){
  


    $id = $_POST['id'];
    $text = $_POST['text'];

    $sql = "INSERT INTO `concern`( `cid`, `concern_text`) VALUES ('$id','$text')";

    $res = mysqli_query($conn, $sql);

    if($res){
        echo 0;
    }
    else{
        echo 1;

    }
}
else{


    $filename = $_FILES['concernpic']['name'];
    $filename_tmp = $_FILES['concernpic']['tmp_name'];
    $pic = str_replace(" ", "", $filename);


    $id = $_POST['id'];
    $text = $_POST['text'];

    $sql = "INSERT INTO `concern`( `cid`, `concern_text`, `concern_filename`) VALUES ('$id','$text','$pic')";

    $res = mysqli_query($conn, $sql);


    if($res){
        move_uploaded_file($filename_tmp, "C:/xampp/htdocs/water_capstone/concern/" .$pic);

        echo 0;
    }
    else{
        echo 1;

    }

}

?>