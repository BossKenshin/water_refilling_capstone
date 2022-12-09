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
    <link rel="stylesheet" href="css/staff.css">

    <title>Consumers| Bills</title>
</head>

<body style="overflow:hidden;">
    <?php include 'consumerside.php' ?>



    <div class="container-fluid m-3">
        <div class="d-flex justify-content-between">
            <h1>Billings</h1>
            <div class="dropdown me-4">
                <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="img/nopicture.jpg" alt="" style="height: 50px; width:50px; border-radius:50%; border:2px solid #98d4ff;">
                </a>
                <ul class="dropdown-menu">



                    <li><a class="dropdown-item" href="#">Log Out</a></li>
                </ul>
            </div>
        </div>




        <div class="container-fluid m-2 bg-white rounded" style="height:70vh;">
            <div class="row pe-3">
                <div class="col-6" id="qr">
                    <button class="btn btn-success mt-2">Scan QR</button>
                    <div class="qrscanner mt-3" style="width:100%; height:100%;"></div>
                </div>
                <div class="col-6">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date From:</th>
                                <th>Date To:</th>
                                <th>m³ used</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>10-12-22</td>
                                <td>10-13-22</td>
                                <td>1982</td>
                                <td>5000</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center">
                        <img src="img/qrcode.png" alt="" style="width:250px;">
                        <p style="font-size:10px;">Scan This QR to Pay through GCASH</p>
                    </div>
                    <div class="center text-end">
                        
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#paymentproof">Pay</button>
                    </div>

                </div>

            </div>

        </div>

    <div class="modal fade" id="paymentproof" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Attach Proof of Payment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="file"  accept="image/png, image/jpeg, image/jpg" class="form-control mb-3" id="proof">
                    <div class="text-center">
                        <img src="img/receipt.jpg" alt="receipt" id="receipt" style="width:300px;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Submit Proof</button>
                </div>
            </div>
        </div>
    </div>


        <script src="js/modals.js"></script>
        <script src="js/navi.js"></script>
</body>

</html>




