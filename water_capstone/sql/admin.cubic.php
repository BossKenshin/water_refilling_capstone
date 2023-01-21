<?php
include '/xampp/htdocs/water_capstone/dbconnect.php';

$type = $_GET['functionType'];

if($type == 'fetch'){

        $cubics = "SELECT admin_cubic FROM admin";
        $query = mysqli_query($conn, $cubics);

        if( $cubic = mysqli_fetch_assoc($query)){

            echo $cubic['admin_cubic'];

        }
        else{
            echo 0;
        }


}
else{

    $cubic = $_GET['cubic'];


    $update = "UPDATE admin SET admin_cubic = '$cubic'";

    $query = mysqli_query($conn,$update);

    if($query){
        echo 0;
    }
    else{
        echo 1;
    }

}



?>