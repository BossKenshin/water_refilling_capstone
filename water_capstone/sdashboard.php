<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- --- -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Staff</title>
</head>

<body style="overflow:hidden;">



<div class="container-fluid " id="whole-container" style="height: 120vh; max-height: fit-content;">

    <div class="row" style="height: inherit;">
        <div class="col-2 shadow" style="position: sticky; top:0px; height: 100vh;background-color: rgb(55, 55, 160); color: whitesmoke;">


        <p class="h4 mt-4 text-center" style="text-align:justify;">
        OWC&SS
        </p>

        <hr>
    
        <?php  include './staffside.php' ?>
        </div>
        <div class="col-10">

            <div class="row pt-4 d-flex" style="height: 72px; box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
            <p class="h4">Dashboard</p>  
        
        
            </div>

            <div class="row mt-4 d-flex p-4 justify-content-evenly" style="height: 200px;">


            <div class="col-3 bg-success shadow">  <h5><label class="h1" id="consumernum">1231</label> No. of Consumer(s)</h5></div>
            <div class="col-3 bg-warning shadow"><h5><label class="h1" id="penaltynum">22</label> No. of Penalty Account(s)</h5></div>
            <div class="col-3 bg-info shadow"><h5><label class="h1" id="inactivenum">343</label> No. of Inavtive Account(s)</h5></div>
    


            </div>


        </div>
    </div>


</div>




       <script src="js/profilestaff.js"></script>
       <script>
        
        loadInactive();
loadConsumerNum();
loadPenaltyNum();

function loadInactive(){

$(document).ready(function() {
    $.ajax({
        url: "./sql/staff.dashboard.sql.php",
        type: "GET",
        data:{
            functionType: 'inactive'        
        },

        success: function(data) {

            var json = JSON.parse(data);

            document.getElementById('inactivenum').innerHTML = json[0].sum;

        }


    })

});
}




function loadConsumerNum(){

$(document).ready(function() {
    $.ajax({
        url: "./sql/staff.dashboard.sql.php",
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



function loadPenaltyNum(){

$(document).ready(function() {
    $.ajax({
        url: "./sql/staff.dashboard.sql.php",
        type: "GET",
        data:{
            functionType: 'penalty'        
        },

        success: function(data) {

            var json = JSON.parse(data);

            document.getElementById('penaltynum').innerHTML = json[0].sum;

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
        max-height: 90%;
        min-width:50px;
        background-color: white;
    }
</style>