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


    <title>Consumer</title>
</head>

<body style="overflow-x:hidden;">


    <div class="modal fade" id="qrcode">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <img id="qrcodeimg" alt="qrcode" style="width:300px;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    

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
                    <p class="h4">Consumer Profile</p>
                </div>

                <div class="row mt-4 d-flex p-4 justify-content-start" style="min-height:400px; max-height: fit-content;">



                    <div class="container-fluid bg-white rounded" id="this" style="overflow-x:scroll;">
            <div class="container-fluid row text-center">
                <div class="form-control mb-4">
                    <div class="container">
                        <div>
                            <img id="profile" alt="">
                            <div class="lol">
                                <div class="d-flex">
                                    <h1 class="mx-4" id="remove">Rosales, Christian</h1>
                                </div>
                                <div class="test inline-flex">
                                    <button id="lol" class="btn btn-outline-dark m-2" onclick="update()"><i class="uil uil-pen"></i></button>
                                    <button id="lol" class="btn btn-outline-dark m-2" data-bs-toggle="modal" data-bs-target="#qrcode"><i class="uil uil-qrcode-scan"></i></button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-3 mb-3" id="qrcode-2" hidden>

                        </div>
                        <div class="row" id="inputs">
                            <div class="col-3 mb-3" id="fname">
                                <label class="form-label" id="fnamel" hidden>First Name</label>
                                <input type="text" class="form-control" id="fnamei" name="fname" hidden disabled>
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label" id="lnamel" hidden>Last Name</label>
                                <input type="text" class="form-control" id="lnamei" name="lname" hidden disabled>
                            </div>
                            <div class="col-3 mb-3">
                                <label for="addr" class="form-label" id="addrl" hidden>Address</label>
                                <input type="text" class="form-control" id="addr" name="addr" hidden disabled>
                            </div>
                            <div class="col-3 mb-3">
                                <label for="phonenum" class="form-label" id="phonenuml" hidden>Phone Number</label>
                                <input type="text" class="form-control" id="phonenum" name="phonenum" hidden disabled>
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">UserName</label>
                                <input type="text" class="form-control" id="uni" name="usn" disabled>
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" id="pwi" name="psw" disabled>
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label" id="imgl" hidden>Profile</label>
                                <input type="file" class="form-control" id="imgi" name="img" hidden>
                            </div>

                            <div class="col-3 mb-3">
                                <button class="form-control btn btn-primary mt-4" id="btn-generate-qr" hidden onclick="generateQRCode()">Generate QR Code</button>
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label" id="qrimgl" hidden>QR Image</label>
                                <input type="file" class="form-control" id="qrimgi" name="qrimg" hidden>
                            </div>

                            <hr>
                            <div class="row justify-content-end mb-3">
                                <button type="button" class="col-2 btn mr-3" id="btncan" onclick="cancel()" hidden>Cancel</button>
                                <a href="consumers.php" class="col-2 btn mr-3" id="btnback">Back</a>
                                <button type="button" class="col-2 btn btn-danger ms-2" data-bs-toggle="modal" data-bs-target="#dismissal" id="btndis" onclick="disem()">Dismiss Account</button>
                                <button type="submit" class="col-2 btn btn-success ms-2" id="btnsub" name="submit" hidden><i class="uil uil-check"></i></button>
                            </div>
                        </div>
                    </div>





                </div>


            </div>
        </div>


    </div>





                <script src="js/view.consumer.js"></script>
                <script src="js/updateconsumer.js"></script>
                <script src="js/navi.js"></script>
</body>

</html>




<style>
    #this::-webkit-scrollbar {
        display: none;
    }

    .lol {
        display: flex;
        justify-content: space-between;
    }

    .ulol {
        height: 100px;
        width: 100%;
        background-color: #1d1b31;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;

    }

    .container img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        border: 5px solid #1d1b31;
        object-fit: cover;
    }
</style>