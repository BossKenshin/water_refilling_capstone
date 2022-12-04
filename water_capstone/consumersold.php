<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>


    <!-- --- -->

    <link rel="stylesheet" href="css/staff.css">

    <title>Consumers</title>
</head>
<body style="overflow:hidden;">



<div class="modal fade" id="addemp" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Consumer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"  >First Name</label>
                    <input type="email" class="form-control" id="fn">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" >Last Name</label>
                    <input type="email" class="form-control" id="ln">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" >Address</label>
                    <input type="email" class="form-control" id="address">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" >Contact Number</label>
                    <input type="email" class="form-control" id="contact">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" >Username</label>
                    <input type="email" class="form-control" id="user">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" >Password</label>
                    <input type="password" class="form-control" id="pass">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Profile Image</label>
                    <input type="file" accept=".png, .jpeg, .jpg" class="form-control" id="profile-pic">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>



<?php include 'sidebar.php' ?>

    <div id="qr-reader" style="width: 600px"></div>


<div class="container-fluid m-3">
    <h1>Consumers</h1>
    <div class="container-fluid m-2 bg-white rounded" style="height:70vh;">
    <div class="dropdown p-3">
            <button class="btn btn-outline-secondary dropdown-toggle" id="btnopt" data-bs-toggle="dropdown"><i class="uil uil-cog icon"> </i>Options</button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addemp">Add Consumer</a></li>
            </ul>
    </div>
<div class="container-fluid m-3 row text-center">
    <table class="table">
        <thead>
            <tr>
                <th>Consumer Name</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Username</th>
                <th>Password</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Christian Rosales</td>
                <td>6516310651</td>
                <td>Siocon</td>
                <td>sample1</td>
                <td>sample1</td>
                <td><a class="btn btn-outline-secondary" href="#">View</a></td>
            </tr>
        </tbody>

    </table>

</div>


<script>function onScanSuccess(decodedText, decodedResult) {
    console.log(`Code scanned = ${decodedText}`, decodedResult);
}
var html5QrcodeScanner = new Html5QrcodeScanner(
	"qr-reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess);</script>



<script src="js/modals.js"></script>
<script src="js/navi.js"></script>
</body>
</html>




