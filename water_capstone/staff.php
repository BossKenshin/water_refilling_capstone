<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- --- -->
    <link rel="stylesheet" href="css/staff.css">

    <title>Staff</title>
</head>

<body style="overflow-x:hidden;">



<div class="modal fade" id="addemp" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Staff</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="fn" class="form-label">First Name</label>
                    <input type="email" class="form-control" id="fn">
                </div>
                <div class="mb-3">
                    <label for="ln" class="form-label">Last Name</label>
                    <input type="email" class="form-control" id="ln">
                </div>
                <div class="mb-3">
                    <label for="user" class="form-label">Username</label>
                    <input type="email" class="form-control" id="user">
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" class="form-control" id="pass">
                </div>
                <div class="mb-3">
                    <label for="profile-pic" class="form-label">Profile Image</label>
                    <input type="file" accept=".png, .jpeg, .jpg" class="form-control" id="profile-pic">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-save-staff">Save changes</button>
            </div>
            
        </div>
    </div>
</div>


<template id="staff-template">

<div class="col-2 container rounded m-2" id="cols">
    <a id="goto-view">
        <div class="d-flex d-inline-flex p-2">
            <div class="branchname">
                <div class="profile">
                    <img src="img/nopicture.jpg"alt="">
                </div>
                <p id="staff-name">Christian Rosales</p>
            </div>
        </div>
</a>
    </div>

</template>



    <div class="container-fluid " id="whole-container" style="height: 120vh; max-height: fit-content;">

        <div class="row" style="height: inherit;">
            <div class="col-2 shadow" style="position: sticky; top:0px; height: 100vh;background-color: rgb(55, 55, 160); color: whitesmoke;">


                <p class="h4 mt-4 text-center" style="text-align:justify;">
                    OWC&SS
                </p>

                <hr>

                <?php include './sidebar.php' ?>
            </div>
            <div class="col-10">

                <div class="row pt-4" style="height: 72px; box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
                    <p class="h4">Staff</p>
                </div>

                <div class="row mt-4 d-flex p-4 justify-content-start" style="min-height:400px; max-height: fit-content;">

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addemp" style="width: 100px;">Add Staff</button>

                    <div class="container border mt-2" id="stafflist" style="min-height: inherit; max-height:fit-content">




                    </div>


                </div>


            </div>
        </div>


    </div>


    <script src="js/admin.js"></script>
    <script src="js/navi.js"></script>
    <script src="js/profileadmin.js"></script>



</body>


</html>