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

    <title>Consumer| Billing History</title>
</head>
<body style="overflow:hidden;">
<?php include 'consumerside.php' ?>

    
   


<div class="container-fluid m-3">
    <div class="d-flex justify-content-between">
    <h1 style="color:white;">Billing History</h1>
        <div class="dropdown me-4">
        <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img id="profile-pic" alt="" style="height: 50px; width:50px; border-radius:50%; border:2px solid #98d4ff;">
        </a>
            <ul class="dropdown-menu">
              <li><button class="btn dropdown-item" id="alogout">Log Out</button></li>
            </ul>
        </div>
    </div>

    <div class="container-fluid m-2 bg-white rounded" style="height:70vh;">
    <div class="container text-center">
    <table class="table" id="historyTable">
        <thead>
            <tr>
                <th>Date From</th>
                <th>Date to</th>
                <th>m³ used</th>
                <th>Amount</th>
                <th>Payment Type</th>
                <th>Receipt</th>
            </tr>
        </thead>
        <tbody>
           
        </tbody>

    </table>
    </div>
</div>
<div class="modal fade" id="view" tabindex="-1">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-body">
        
        <div class="mb-3">
                <label for="cname" class="form-label">Name</label>
                <input class="form-control" type="text" id="cname" value="Christian Rosales" disabled>
        </div>
        <div class="mb-3">
                <label for="cname" class="form-label">Address</label>
                <input class="form-control" type="text" id="cadd" value="Siocon, Nailon, Bogo City" disabled>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label for="cname" class="form-label">From Date:</label>
                <input class="form-control" type="date" id="cfromdate" >
            </div>
            <div class="col">
                <label for="cname" class="form-label">To Date:</label>
                <input class="form-control" type="date" id="ctodate" onchange="btn()">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label for="cname" class="form-label">m³ used:</label>
                <input class="form-control" type="text" id="ccubics" value="21312313" disabled>
            </div>
            <div class="col">
                <label for="cname" class="form-label">Total:</label>
                <input class="form-control" type="text" id="ctotal" value="" disabled>
            </div>
            <div class="col">
                <label for="cname" class="form-label">Status</label>
                <input class="form-control" type="text" id="cstatus" value="Paid" disabled>
            </div>
        </div>


        </div>
    <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="genrec" onclick="rece()" disabled>Generate Receipt</button>
        <button type="button" class="btn btn-success" id="btnpaid" disabled>Mark as Paid</button>
    </div>
    </div>
    </div>
</div>


<script src="js/profileconsumer.js"></script>
<script src="js/billinghistory.js"></script>
</body>
</html>

