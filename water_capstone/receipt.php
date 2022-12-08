<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- --- -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type = "text/css" media="print" href="css/reciept.css" />
    <script src="js/receipt.js"></script>

</head>
<body style="overflow:hidden;">
<?php
include 'staffside.php';
?>
<div class="container-fluid m-3">
    <div class="d-flex justify-content-between" id="top">
        <h1>Reciept</h1>
        <div class="dropdown me-4">
        <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="img/nopicture.jpg" alt="" style="height: 50px; width:50px; border-radius:50%; border:2px solid #98d4ff;">
        </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Log Out</a></li>
            </ul>
        </div>
    </div>
<div class="container0-fluid p-0" id="maindashboard">
        <div class="container1-fluid">
        <section class="home-section" style="overflow-y: scroll; overflow-x:hidden; max-height: 100vh;" >
                <div class="container mt-5 mb-5 d-flex justify-content-center">
            <div class="receipt" style="width:215.43307087px; padding:10px;" id="receiptprint">
                    <h5 class="text-center">Water Bill</h5>
                    <hr>
                        <div style="font-size:10px; margin-bottom:10px !important;">
                            <p style="margin-bottom:-3px !important;">Consumer Name: <span id="fullname">Christian Rosales</span> </p>
                            <p id="add" style="margin-bottom:-3px !important;">Address: Siocon</p>
                            <p  class="meter" style="margin-bottom:-3px !important;">m³ used: </p>
                            <h5 id="cubics" class="meter" style="margin-bottom:-3px !important;">123287</h5><br>
                            <p class="meter" style="margin-bottom:-3px !important;">Amount: </p>
                            <h5 class="meter" style="margin-bottom:-3px !important;">PHP <span  id="total">123287</span> </h5><br>
                            <p  style="margin-bottom:-3px !important; text-align:center;">Paid date: <span id="paidDate"> 10/12/2022 </span> </p>
                                <hr>
                            <p>Billing staff: <span id="staff"> Jhonrel Patiño</span></p>
                        </div>
                <div class="table-group-divider text-center">
                    <p style="font-size:10px; margin-top:10px;">Thank You For Paying!</p>
                </div>
            </div>
                <button class="btn btn-success ms-3" onclick="test()">Print</button>
        </section>
</div>
</div>
<style>
    .meter{
        display:inline-block;
    }

</style>

<script>

const params = new URLSearchParams(window.location.search);
var consumer_name = params.get("cname");
var address = params.get("address");
var used = params.get("mused");
var total = params.get("total");
var staff = params.get("staff");

document.getElementById('fullname').textContent = consumer_name;
document.getElementById('add').textContent = "Address" +" "+address;
document.getElementById('cubics').textContent = used;
document.getElementById('total').textContent = total;
document.getElementById('staff').textContent = staff;

let date = new Date().toLocaleDateString();
document.getElementById('paidDate').textContent = date;

function test() {
        window.print();
        window.close();
}
</script>
<script src="js/modals.js"></script>
</body>
</html>




