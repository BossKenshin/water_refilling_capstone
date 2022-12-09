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

    <title>Consumer| Dashboard</title>
</head>
<body style="overflow:hidden;">
<?php include 'consumerside.php' ?>

    
   


<div class="container-fluid m-3">
    <div class="d-flex justify-content-between">
    <h1>Dashboard</h1>
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

    </div>









<script src="js/profileconsumer.js"></script>
</body>
</html>