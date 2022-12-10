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
            <h1 style="color:white;">Concerns</h1>
            <div class="dropdown me-4">
                <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img id="profile-pic" alt="" style="height: 50px; width:50px; border-radius:50%; border:2px solid #98d4ff;">
        </a>
            <ul class="dropdown-menu">
              <li><button class="btn dropdown-item" id="alogout">Log Out</button></li>
            </ul>
            </div>
        </div>

        <template id="send-template">
            <div class="sender" id="send-div">
                <p id="ti">Hello This is the Consumer Hello This is the Consumer </p>
                <img class="me-3" id="imgi" alt="" style="width:30px;height:30px; border-radius:50%;">
            </div>
        </template>

        <div class="container-fluid m-2 bg-white rounded " style="height:70vh;">
            <div class="container bg-white p-2 " id="messages" style="width: 500px; height:85%; overflow-y:scroll; display: block;">




            </div>
            <div class="container d-flex mt-1 p-2" style="width: 500px;  background-color:whitesmoke;">
                <label class="custom-file-upload">
                    <input type="file" accept="image/png, image/jpg, image/jpeg" id="imgfile" />
                    <i class="uil uil-file" style="font-size:30px; margin-right:20px;"></i>
                </label>
                <input type="text" class="form-control" id="textconcern">
                <button class="btn" id="sendcon"><i class="uil uil-message icon"></i></button>
            </div>
        </div>




        <style>
            .custom-file-upload:hover {
                cursor: pointer;

            }

            input[type="file"] {
                display: none;
            }

            .sender p {
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
                width: 100%;
                display: flex;
                justify-content: flex-end;
               
            }
        </style>

<script src="js/profileconsumer.js"></script>

        <script>
            var profile;

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

            
            profile = profiledata[0].profile;


            // ele.setAttribute('src', './profile/'+profiledata[0].staff_pic)

        }
    })
}

            $('#sendcon').click(function() {



                var plen = $('#imgfile').get(0).files.length

                var con = document.getElementById('textconcern').value;

          if(con != ''){

                  


            var file = $('#imgfile').prop('files')[0]; //Fetch the file


var formdata = new FormData();

if (plen != 0) {
    formdata.append('type', 'wpic');
    formdata.append('concernpic', file);
} else {
    formdata.append('type', 'wopic');
}
formdata.append('text', con);
formdata.append('id', consumerid);


if (formdata.get('type') == 'wpic') {
    const template = document.querySelector("#send-template");

    const parent = document.querySelector("#messages");
    //clone the template
    let clone = template.content.cloneNode(true);

    //clone.querySelector("#cols .branchname").innerHTML = 'Staff';
    clone.querySelector("#ti").innerHTML = formdata.get('text') + " " + " <br> <small style='color: blue;  font-size: 10px;'> with attachment </small> ";
    clone.querySelector("#imgi").setAttribute('src', './consumerprofile/'+ profile);

    //apppend
    parent.append(clone);

} else {

    const template = document.querySelector("#send-template");
    const parent = document.querySelector("#messages");



    //clone the template
    let clone = template.content.cloneNode(true);

    //clone.querySelector("#cols .branchname").innerHTML = 'Staff';
    clone.querySelector("#ti").innerHTML = formdata.get('text');
    clone.querySelector("#imgi").setAttribute('src', './consumerprofile/'+profile);

    //apppend
    parent.append(clone);
}
sendFormData(formdata);



          }
          else{
            Swal.fire({
                    icon: "error",
                    title: "No text sent",
                  });    
          }


            })


            function sendFormData(formdata){
                $.ajax({
        url: "./sql/concern.php",
        type: "POST",
        data: formdata,
        contentType: false,
                   processData: false,
        success: function (data) {

            if(data == 0){
                Swal.fire({
                    icon: "success",
                    title: "Concern sent",
                  });   
            }
            else{

               
                    Swal.fire({
                    icon: "error",
                    title: "Unable to send concern",
                  });    
            }
            document.getElementById('textconcern').value = "";
                document.getElementById('imgfile').value = "";
        }
    })

            }
        </script>

        

</body>

</html>