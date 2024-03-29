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
        <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">



    <link rel="stylesheet" href="css/staff.css">

    <title>Consumers</title>
</head>
<body style="overflow-x:hidden;">

<template id="sales-template"> 
<tr>
                    <td id="consumer"></td>
                    <td id="paid"></td>
                    <td id="cubic"></td>
                    <td id="total"></td>
                    <td id="pay-type"></td>

</tr>
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
            <p class="h4">Monthly Reports</p>
        </div>

        <div class="row mt-4 d-flex p-4 justify-content-start" style="min-height:400px; max-height: fit-content;">


        <div class="row mx-3 d-flex" style="width:100%; height: 40px;">

<input type="number" class="form-control" placeholder="Enter Year" id="yearinp"  maxlength="4" style="width: 200px;">
<select id="month-select" class="form-select w-25">
    <option value="1">January</option>
    <option value="2">February</option>
    <option value="3">March</option>
    <option value="4">April</option>
    <option value="5">May</option>
    <option value="6">June</option>
    <option value="7">July</option>
    <option value="8">August</option>
    <option value="9">September</option>
    <option value="10">October</option>
    <option value="11">November</option>
    <option value="12">December</option>

</select>
<button class="btn btn-primary mx-3" style="width: 200px;" id="bnt-filter" onclick="loadReport()">Get Sales</button>
<button class="btn btn-dark float-end" style="width: 100px;" data-toggle="tooltip" id="btn-export-table" onclick="html_table_to_excel('xlsx')" data-placement="left" title="Export Table"><i class="bi bi-printer-fill"></i></button>
</div>


        <table class="table border shadow" id="reportTable" >
        
            <thead>
            <tr>
                    <td>Consumer</td>
                    <td>Paid Date</td>
                    <td>Cubics Used</td>
                    <td>Total</td>
                    <td>Type of Payment</td>



                </tr>
            </thead>
            <tbody>
                
            </tbody>
          </table>
         

        </div>


    </div>
</div>


</div>


<script src="js/navi.js"></script>
<script src="js/profileadmin.js"></script>
<script src="js/reports.table.js"></script>

</body>
</html>




