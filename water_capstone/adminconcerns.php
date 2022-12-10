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


    <title>Admin| Concerns</title>
</head>

<body style="overflow:hidden;">
    <?php include 'sidebar.php' ?>


    <div class="container-fluid m-3">
        <div class="d-flex justify-content-between">
            <h1  style="color:white;">Concerns</h1>
        </div>

        <div class="container-fluid m-2 bg-white rounded d-flex justify-content-center" style="height:70vh;">
            <div class="container text-center">
                <template id="consumer-concern-template">
                    <tr>
                    <td id="cnamee">Christian Rosales</td>
                    <td> <button class="btn btn-secondary" id="viewconcernme" onclick="viewConcern(this.getAttribute('data-id'))">View Message</button></td>
               
                    </tr>
               </template>
                <table class="table" id="concernTable">
                    <thead>
                        <th>Consumer Name</th>
                        <th></th>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>


        <div class="modal fade" id="viewconcern">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Christian Rosales</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text" id="concerntext">
                        <p >This is consumer This is consumer This is consumer This is consumer This is consumer This is consumer This is consumer </p>
                        <a download ><img src="img/nopicture.jpg" alt=""></a>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="markread">Mark as Read</button>

                    </div>
                </div>
            </div>
        </div>


        <style>
            a img{
                width: 200px;
            }


            .text p {
                padding: 3px;
                padding-right: 10px;
                min-width: 100px;
                max-width: 200px;
                border-radius: 10px;
                background-color: #bfd0ff;
            }

            p {
                font-size: smaller;
            }

            .sender {
                float: left;
                text-align: right;
            }

            li {
                list-style: none;
            }
        </style>

        
<script>

    loadConsumerConcerns();

function loadConsumerConcerns(){
$(document).ready(function() {
    $.ajax({
        url: "./sql/adminconcernsql.php",
        type: "GET",
        data:{
            functionType: 'allconcern',
        },
        success: function(data) {

            var json = JSON.parse(data);


            const template = document.querySelector("#consumer-concern-template");

            const parent = document.querySelector("#concernTable tbody");

            $('#concernTable tbody').empty();

            for (let i = 0; i < json.length; i++) {

                //clone the template
                let clone = template.content.cloneNode(true);

                //clone.querySelector("#cols .branchname").innerHTML = 'Staff';
                clone.querySelector("#cnamee").innerHTML = json[i].fullname;
                clone.querySelector("#viewconcernme").dataset.id = json[i].concern_id;


                //apppend
                parent.append(clone);
            }
            
        }
    })

});
}


function viewConcern(coid){

    $('#viewconcern').modal('show');


    $(document).ready(function() {
    $.ajax({
        url: "./sql/adminconcernsql.php",
        type: "GET",
        data:{
            functionType: 'getone',
            coid, coid
        },
        success: function(data) {

            var json = JSON.parse(data);


                var eletext = document.querySelector('#concerntext p');
                var elelink = document.querySelector('#concerntext a');
                var eleimage = document.querySelector('#concerntext a img');
                document.getElementById('markread').dataset.id = coid;


                eletext.innerHTML = json[0].concern_text;

                if(json[0].concern_filename == null){
                    $('#concerntext a').hide();
                }
                else{
                    $('#concerntext a').show();

                    elelink.setAttribute('href','./concern/'+json[0].concern_filename);
                    eleimage.setAttribute('src','./concern/'+json[0].concern_filename);
                }
            
        }
    })

});
}

$('#markread').click(function(){

    var coid = document.getElementById('markread').getAttribute('data-id');

    $.ajax({
        url: "./sql/adminconcernsql.php",
        dataType: 'script',
        type: "GET",
        data:{
            functionType: 'resolve',
            coid, coid
        },
        success: function(data) {


            if(data == 0){
                Swal.fire({
                    icon: "success",
                    title: "Done",
                  });    
            }
            else{
                Swal.fire({
                    icon: "error",
                    title: "Unable to Mark as Read",
                  });    
            }

            loadConsumerConcerns();

            $('#viewconcern').modal('hide');

        }
    })

})



</script>


        <script src="js/navi.js"></script>
        <script src="js/profileadmin.js"></script>
</body>

</html>