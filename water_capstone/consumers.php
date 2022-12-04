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
        <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <link rel="stylesheet" href="css/staff.css">

    <title>Consumers</title>
</head>
<body style="overflow:hidden;">


<div class="modal fade" id="addemp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Consumer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="fn" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="fn">
                </div>
                <div class="mb-3">
                    <label for="ln" class="form-label">Last Name</label>
                    <input type="text" class="form-control"  id="ln">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control"  id="phone"  maxlength="11" minlength="11" >
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control"  id="address">
                </div>
                <div class="mb-3">
                    <label for="usr" class="form-label" >Username</label>
                    <input type="text" class="form-control" id="usr">
                </div>
                <div class="mb-3">
                    <label for="psw" class="form-label">Password</label>
                    <input type="password" class="form-control" id="psw">
                </div>
                <div class="mb-3">
                    <label for="profile" class="form-label">Profile Image</label>
                    <input type="file" accept=".png, .jpeg, .jpg" class="form-control" id="profile">
                </div>

                <div class="mb-3" id="qrcode-2">
                    
                </div>


                 <div class="mb-3">
                    <button class="form-control btn btn-primary" id="btn-generate-qr" onclick="generateQRCode()">Generate QR Code</button>
                </div>
                <div class="mb-3">
                    <label for="qrcode-img" class="form-label">QR Image</label>
                    <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" id="qrcode-img">
                </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-add-consumer" >Save</button>
            </div>
        </div>
    </div>
</div>


<?php include 'sidebar.php' ?>

<template id="consumer-row-template">

<tr id="consumer-row">
                <td id="fullname">Christian Rosales</td>
                <td id="number"> 6516310651</td>
                <td id="caddress">Siocon</td>
                <td id="usern">Consumer</td>
                <td ><a class="btn btn-outline-secondary" >View</a></td>
</tr>

</template>

<div class="container-fluid m-3">
    <h1>Consumers</h1>
    <div class="container-fluid m-2 bg-white rounded" id="this" style="height:70vh; overflow-x:scroll;">
    <div class="dropdown p-3">
            <button class="btn btn-outline-secondary dropdown-toggle" id="btnopt" data-bs-toggle="dropdown"><i class="uil uil-cog icon"> </i>Options</button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addemp">Add Consumer</a></li>
            </ul>
    </div>
<div class="container-fluid m-3 row text-center">
    <table class="table" id="consumer-table">
        <thead>
            <tr>
                <th>Consumer Name</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Username</th>

                <th></th>
            </tr>
        </thead>
        <tbody>
           
        </tbody>

    </table>
</div>



<script src="js/navi.js"></script>
<script src="js/admin.consumer.js"></script>
</body>
</html>

<style>
    #this::-webkit-scrollbar
    {
        display: none;
    }
</style>