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
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Consumers| Bills</title>
</head>

<body style="overflow-x:hidden;">



<div class="container-fluid " id="whole-container" style="height: 120vh; max-height: fit-content;">

    <div class="row" style="height: inherit;">
        <div class="col-2 shadow" style="position: sticky; top:0px; height: 100vh;background-color: rgb(55, 55, 160); color: whitesmoke;">


        <p class="h4 mt-4 text-center" style="text-align:justify;">
        OWC&SS
        </p>

        <hr>
    
        <?php  include './consumerside.php' ?>
        </div>
        <div class="col-10">

            <div class="row pt-4 d-flex" style="height: 72px; box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
            <p class="h4">Your Billings</p>  
        
        </div>

        

        <div class="container-fluid m-2 bg-white rounded" style="height:70vh;">
            <div class="row pe-3">
                <div class="col-4" id="qr">
                    <button class="btn btn-success mt-2" id="btn-show-scanner">Scan your QR code: to see bill</button>
                    <br>
                    <a class="text-decoration-underline" download id="myqr" >My QR Code</a>

                    <div class="mt-3" style="width:100%; height:250px" id="reader"></div>

                </div>
                <div class="col-8">

              
                    <table class="table" id="billTable">
                        <thead>
                            <tr>
                                <th>Date From:</th>
                                <th>Date To:</th>
                                <th>m³ used</th>
                                <th>Amount</th>
                                <th>Days Penalty(<i>50 per day</i>)</th>
                                <th>Total</th>

                            </tr>
                        </thead>
                        <tbody>
                        <tr>

                                <td id="start"></td>
                                <td id="due"></td>
                                <td id="cubic"></td>
                                <td id="amount"></td>
                                <td id="days"></td>
                                <td id="total"></td>
                        </tr>

                        </tbody>
                    </table>
                    <div class="text-center">
                        <img src="./bg/GKI-GCash-QR-Code.png" alt="" style="width:250px;">
                        <p style="font-size:15px;">Scan This QR to Pay through GCASH</p>
                    </div>
                    <div class="center text-end">
                        
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#paymentproof">Pay bill</button>
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
                        <img alt="receipt" id="receipt" style="width:300px;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="submit-proof">Submit Proof</button>
                </div>
            </div>
        </div>
    </div>



        </div>


</div>


    <script src="js/cbillings.js"> </script>
    <script src="js/profileconsumer.js"></script>
    <script>
        var consumerid = localStorage.getItem('consumerid');
var consumer_user;



if(consumerid == null  ){
           window.location.replace('./index.html');
}

setProfile();

function setProfile(){
    $.ajax({
        url: "./sql/fetch.profile.php",
        data: {
            typeAcc: 'consumer',
            id: consumerid
        },
        success: function (data) {

            var profiledata = JSON.parse(data);

            // ele.setAttribute('src', './profile/'+profiledata[0].staff_pic)
            $("#myqr").attr("href",'./qrcode/'+profiledata[0].qrcode);

        }
    })
}
    </script>

</body>

</html>




