<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- --- -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <title>Admin</title>
</head>

<body style="overflow-x:hidden;">
    <?php include 'sidebar.php' ?>


    <div class="container-fluid m-3">
        <h1 style="color:white;">Dashboard</h1>
        <div class="container-fluid m-2 bg-white rounded" style="min-height: 75vh; max-height:fit-content;">
            <h1 class="p-3">Welcome, Admin</h1>
            <hr>
            <div class="container-fluid d-flex justify-content-evenly">
                <div class="container col-4" id="nobra">
                    <div class="d-flex">
                        <div class="circle rounded"></div>
                        <h5><label class="h1" id="staffnum">1231</label> No. of Staff</h5>
                    </div>
                </div>
                <div class="container col-4" id="nobra">
                    <div class="d-flex">
                        <div class="circle rounded"></div>
                        <h5><label class="h1" id="consumernum">22</label> No. of Consumers</h5>
                    </div>
                </div>
                <div class="container col-4" id="nobra">
                    <div class="d-flex">
                        <div class="circle rounded"></div>
                        <h5><label class="h1" id="concernum">343</label> Concern(s)</h5>
                    </div>
                </div>
            </div>
            <div class="container-fluid d-flex justify-content-start">

                <div class="col-4 p-3 cu" id="nobra">
                    <div class="container d-flex justify-content-between mb-2">
                        <p class="h2">Cubics</p>
                        <button class="btn" id="edit-cubic" onclick="showhide()"><i class="bi bi-pencil-square text-light"></i></button>
                    </div>


                    <input type="number" name="" id="cubics" class="form-control" disabled>

        <div class=" container d-flex justify-content-between mt-3 mb-2" id="edit-btn-div" style="visibility: hidden;">
                    <button class="btn btn-light text-dark" id="save-cubic" onclick="addCubic()">Save</i></button>
                    <button class="btn btn-danger text-light" id="cancel-cubic" onclick="showhide()">Cancel</i></button>
                </div>

            </div>
        </div>
    </div>
    </div>




    <script src="js/navi.js"></script>
    <script src="js/profileadmin.js"></script>
    <script>
        loadStaff();
        loadConsumerNum();
        loadConcernNum();
        fetchCubic();

        function showhide() {

            var bele = document.getElementById('edit-btn-div');
            var bel1 = document.getElementById('edit-cubic');

            if (bele.style.visibility == 'unset') {

                bele.style.visibility = "hidden";
                bel1.style.visibility = "unset";
                document.getElementById('cubics').setAttribute('disabled', true);
                fetchCubic();


            } else {
                bele.style.visibility = "unset";
                bel1.style.visibility = "hidden";
                document.getElementById('cubics').removeAttribute('disabled', false);


            }


        }

        function addCubic() {

            var c = document.getElementById('cubics').value;
            var bele = document.getElementById('edit-btn-div');
            var bel1 = document.getElementById('edit-cubic');


            $(document).ready(function() {
                $.ajax({
                    url: "./sql/admin.cubic.php",
                    dataType: 'script',
                    type: "GET",
                    data: {
                        functionType: 'add',
                        cubic: c
                    },
                    success: function(data) {

                       if(data == 0){

                        fetchCubic();
                        bele.style.visibility = "hidden";
                bel1.style.visibility = "unset";
                document.getElementById('cubics').setAttribute('disabled', true);

                       }


                    }

                })

            });


        }

        function fetchCubic() {

            var c = document.getElementById('cubics').value;

            $(document).ready(function() {
                $.ajax({
                    url: "./sql/admin.cubic.php",
                    dataType: 'script',
                    type: "GET",
                    data: {
                        functionType: 'fetch'
                    },
                    success: function(data) {

                        document.getElementById('cubics').value = data;


                    }

                })

            });


        }

        function loadStaff() {

            $(document).ready(function() {
                $.ajax({
                    url: "./sql/admin.dashboard.sql.php",
                    type: "GET",
                    data: {
                        functionType: 'staff'
                    },

                    success: function(data) {

                        var json = JSON.parse(data);

                        document.getElementById('staffnum').innerHTML = json[0].sum;

                    }


                })

            });
        }




        function loadConsumerNum() {

            $(document).ready(function() {
                $.ajax({
                    url: "./sql/admin.dashboard.sql.php",
                    type: "GET",
                    data: {
                        functionType: 'consumer'
                    },

                    success: function(data) {

                        var json = JSON.parse(data);

                        document.getElementById('consumernum').innerHTML = json[0].sum;

                    }


                })

            });
        }



        function loadConcernNum() {

            $(document).ready(function() {
                $.ajax({
                    url: "./sql/admin.dashboard.sql.php",
                    type: "GET",
                    data: {
                        functionType: 'concern'
                    },

                    success: function(data) {

                        var json = JSON.parse(data);

                        document.getElementById('concernum').innerHTML = json[0].sum;

                    }


                })

            });
        }
    </script>
</body>

</html>


<style>
    #nobra {
        background-color: #0f62fe;
        margin: 5px;
        padding-top: 5px;
        padding-bottom: 5px;
        border-radius: 10px;
        width: 300px;
        color: white;
    }

    .cu {
        position: relative;
        left: 92px;
    }


    .circle {
        margin-right: 10px;
        max-height: 100%;
        min-width: 50px;
        background-color: white;
    }
</style>