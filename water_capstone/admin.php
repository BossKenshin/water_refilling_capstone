<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- --- -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <title>Admin</title>
</head>
<body style="overflow:hidden;">
<?php include 'sidebar.php' ?>


<div class="container-fluid m-3">
    <h1 style="color:white;">Dashboard</h1>
    <div class="container-fluid m-2 bg-white rounded" style="height:70vh;">
    <h1 class="p-3">Welcome, Admin</h1>
            <hr>
            <div class="container-fluid d-flex justify-content-center">
                <div class="container col-4" id="nobra">
                    <div class="d-flex">
                        <div class="circle rounded"></div>
                        <h5><label class="h1" id="staffnum">1231</label> No. of Staff</h5>
                    </div>
                </div>
                <div class="container col-4" id="nobra">
                    <div class="d-flex">
                        <div class="circle rounded"></div>
                        <h5><label class="h1" id="consumernum">22</label> No. of Consumers</h5>
                    </div>
                </div>
                <div class="container col-4" id="nobra">
                    <div class="d-flex">
                        <div class="circle rounded"></div>
                        <h5><label class="h1" id="concernum">343</label> Concern(s)</h5>
                    </div>
                </div>
            </div>
    </div>




<script src="js/navi.js"></script>
<script src="js/profileadmin.js"></script>
<script>

loadStaff();
loadConsumerNum();
loadConcernNum();

function loadStaff(){

$(document).ready(function() {
    $.ajax({
        url: "./sql/admin.dashboard.sql.php",
        type: "GET",
        data:{
            functionType: 'staff'        
        },

        success: function(data) {

            var json = JSON.parse(data);

            document.getElementById('staffnum').innerHTML = json[0].sum;

        }


    })

});
}




function loadConsumerNum(){

$(document).ready(function() {
    $.ajax({
        url: "./sql/admin.dashboard.sql.php",
        type: "GET",
        data:{
            functionType: 'consumer'        
        },

        success: function(data) {

            var json = JSON.parse(data);

            document.getElementById('consumernum').innerHTML = json[0].sum;

        }


    })

});
}



function loadConcernNum(){

$(document).ready(function() {
    $.ajax({
        url: "./sql/admin.dashboard.sql.php",
        type: "GET",
        data:{
            functionType: 'concern'        
        },

        success: function(data) {

            var json = JSON.parse(data);

            document.getElementById('concernum').innerHTML = json[0].sum;

        }


    })

});
}


</script>
</body>
</html>


<style>
    #nobra {
        background-color: #0f62fe;
        margin: 5px;
        padding-top: 5px;
        padding-bottom: 5px;
        border-radius: 10px;
        width: 300px;
        color: white;
    }
    .circle
    {
        margin-right: 10px;
        max-height: 100%;
        min-width:50px;
        background-color: white;
    }
</style>