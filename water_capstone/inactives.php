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
<?php include 'staffside.php' ?>

    
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
                <label for="cfromdate" class="form-label">From Date:</label>
                <input class="form-control" type="date" id="cfromdate" disabled >
            </div>
            <div class="col">
                <label for="ctodate" class="form-label">To Date:</label>
                <input class="form-control" type="date" id="ctodate"  disabled>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label for="ccubics" class="form-label">m?? used:</label>
                <input class="form-control" type="text" id="ccubics" value="21312313" disabled>
            </div>
            <div class="col">
                <label for="ctotal" class="form-label">Total:</label>
                <input class="form-control" type="text" id="ctotal" value="" disabled>
            </div>
            <div class="col">
                <label for="cstatus" class="form-label">Status</label>
                <input class="form-control" type="text" id="cstatus" value="Paid" disabled>
            </div>
        </div>
        <div class="mb-3">
                <label for="cnumbermonth" class="form-label">Late payments no. of Month/s</label>
                <input class="form-control" type="number" id="cnumbermonth" value="" disabled>
        </div>
        <div class="mb-3">
                <label for="ctotalwithfee" class="form-label">Total amount to be paid. <i>1500 Php fee</i></label>
                <input class="form-control" type="number" id="ctotalwithfee" value="" disabled>
        </div>
        <div class="mb-3 row">
        <button type="button" class="btn btn-success" id="genrec" onclick="rece()" disabled>Generate Receipt</button>

        </div>

        </div>
    <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="btndeletebill">Delete bill</button>
        <button type="button" class="btn btn-success" id="btnpaid" disabled>Mark as Paid</button>
    </div>
    </div>
    </div>
</div>
   


<div class="container-fluid m-3">
    <div class="d-flex justify-content-between">
    <div class="container">
        <h1 style="color:white;">Inactive Accounts</h1>
        <input class="form-control w-25" type="text" id="search" placeholder="Search" onclick="filterConsumer()" style="height:40px;">
    </div>
        <div class="dropdown me-4">
        <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img id="profile-pic" alt="" style="height: 50px; width:50px; border-radius:50%; border:2px solid #98d4ff;">
        </a>
            <ul class="dropdown-menu">
              <li><button class="btn dropdown-item" id="alogout">Log Out</button></li>
            </ul>
        </div>
    </div>

    <template id="inactive-consumer-template">
            <tr>
                <td id="fullname">Christian Rosales</td>
                <td id="username">Username</td>
                <td id="address">Address</td>
                <td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#view" id="billing-view" onclick="setBill(this.getAttribute('data-id'),this.getAttribute('data-fullname'),this.getAttribute('data-address'), this.getAttribute('data-mo') )"><i class="uil uil-eye icon"> View</i></button></td>
            </tr>
        </template>

    <div class="container-fluid m-2 bg-white rounded" style="height:70vh;">
    <div class="container text-center">
    <table class="table" id="inactiveTable">
        <thead>
            <tr>
                <th>Consumer Name</th>
                <th>Username</th>
                <th>Address</th>

                <th></th>
            </tr>
        </thead>
        <tbody>
     
        </tbody>

    </table>
    </div>
</div>









<script src="js/inactive.js"></script>
<script src="js/profilestaff.js"></script>

</body>
</html>



