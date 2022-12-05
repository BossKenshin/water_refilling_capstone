
const params = new URLSearchParams(window.location.search);
var cid = params.get("consumerid");

loadConsumer();

function loadConsumer(){    
    $(document).ready(function() {
        $.ajax({
            url: "./sql/admin.consumer.php",
            type: "POST",
            data:{
                functionType: 'view',
                id: cid
            },
            success: function(data) {

                var json = JSON.parse(data);
                console.log(json);


                document.querySelector('#profile').setAttribute("src", './consumerprofile/'+json[0].profile)
                document.querySelector('#qrcodeimg').setAttribute("src", './qrcode/'+json[0].qrcode)

                document.getElementById('remove').innerHTML = json[0].firstname + ' '+ json[0].lastname;
                document.getElementById('fnamei').value = json[0].firstname;
                document.getElementById('lnamei').value = json[0].lastname;
                document.getElementById('addr').value = json[0].address;
                document.getElementById('phonenum').value = json[0].phone;


                document.getElementById('uni').value = json[0].user;
                document.getElementById('pwi').value = json[0].pass;





            }


        })

    });
}




function generateQRCode() {
    var fn = document.getElementById('fnamei').value;
    var ln= document.getElementById('lnamei').value;;
    var ph= document.getElementById('phonenum').value;;
    var usr = document.getElementById('uni').value;
    var pasw =document.getElementById('pwi').value;
    var address = document.getElementById('addr').value;


  if (fn != '' && usr != '' && pasw != '' && ln != '' && ph != '' && address != '') {

    var json = {"fullname": fn +' '+ ln ,"phone": ph, "address":address, "user":usr}

    var jsontext = JSON.stringify(json);

    console.log(JSON.parse(jsontext));
    /*With some styles*/
    let qrcodeContainer2 = document.getElementById("qrcode-2");

    qrcodeContainer2.innerHTML = "";
    new QRCode(qrcodeContainer2, {
      text: jsontext,
      width: 128,
      height: 128,
      colorDark: "#5868bf",
      colorLight: "#ffffff",
      correctLevel: QRCode.CorrectLevel.H
    });

    $('#qrcode-2').append("<p class='m-3' > Save this image and attach the QR Code </p>")


   
  } 
  else {
    Swal.fire({
        icon: "error",
        title: "Please fill out the form",
      });  
  }
}



function disem(){
    $(document).ready(function() {

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $(document).ready(function() {
                $.ajax({
                    url: "./sql/admin.consumer.php",
                    type: "POST",
                    data:{
                        functionType: 'delete',
                        id: cid
                    },
                    success: function(data) {

                
                                window.location.replace('consumers.php');
                            
        
                    }
        
        
                })
        
            });

        }
      })

    })
}



$('#btnsub').click(function(){


    var fn = document.getElementById('fnamei').value;
    var ln= document.getElementById('lnamei').value;;
    var ph= document.getElementById('phonenum').value;;
    var usr = document.getElementById('uni').value;
    var pasw =document.getElementById('pwi').value;
    var address = document.getElementById('addr').value;
    var len = $('#imgi').get(0).files.length
    var lent = $('#qrimgi').get(0).files.length



    if(fn != null && ln != null && usr != null && pasw != null && lent == 1 && ph != null && address != null){

        var form_data = new FormData();

        if(len != 0){

            var file =  $('#imgi').prop('files')[0];    //Fetch the file
            var qrcode =  $('#qrimgi').prop('files')[0];    //Fetch the file


            form_data.append('functionType', 'updatewpic');
            form_data.append('id',cid);
            form_data.append('fn', fn);
            form_data.append('ln', ln);
            form_data.append('address',address);
            form_data.append('ph',ph);
            form_data.append('user', usr);
            form_data.append('pass',pasw);
            form_data.append('profile', file);
            form_data.append('qrcode', qrcode);

    
    
    
        
        }
        else{
            var qrcode =  $('#qrimgi').prop('files')[0];    //Fetch the file


            form_data.append('functionType', 'updatewopic');
            form_data.append('id',cid);
            form_data.append('fn', fn);
            form_data.append('ln', ln);
            form_data.append('address',address);
            form_data.append('ph',ph);
            form_data.append('user', usr);
            form_data.append('pass',pasw);
            form_data.append('qrcode', qrcode);

        }


        $.ajax({
            url: "./sql/admin.consumer.php",                      //Server api to receive the file
                   type: "POST",
                   dataType: 'script',
                   cache: false,
                   contentType: false,
                   processData: false,
                   data: form_data,
                success:function(dat2){
                  if(dat2==0) 
                  {
                    Swal.fire({
                      icon: "success",
                      title: "Consumer Updated ",
                    });       

                    $('#inputs').find('input').val('');    
                    document.getElementById('qrcode-2').innerHTML="";
                    loadConsumer();

                  }
                  else{
                    Swal.fire({
                    icon: "error",
                    title: "Unable to Update Staff",
                  });    
                  }
                 
                }
          });



    }
    else{

        Swal.fire({
            icon: "error",
            title: "Please fill out the form",
          });  

    }

})
