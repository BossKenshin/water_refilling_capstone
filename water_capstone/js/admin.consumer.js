loadConsumer();

function loadConsumer(){    
    $(document).ready(function() {
        $.ajax({
            url: "./sql/admin.consumer.php",
            type: "POST",
            data:{
                functionType: 'fetch'
            },
            success: function(data) {

                var json = JSON.parse(data);

                const template = document.querySelector("#consumer-row-template");

                const parent = document.querySelector("#consumer-table tbody");

                $('#consumer-table tbody').empty();

                for (let i = 0; i < json.length; i++) {

                    //clone the template
                    let clone = template.content.cloneNode(true);

                    //clone.querySelector("#cols .branchname").innerHTML = 'Staff';
                    clone.querySelector("#fullname").innerHTML = json[i].fullname;
                    clone.querySelector("#number").innerHTML = json[i].phone;
                    clone.querySelector("#caddress").innerHTML = json[i].address;
                    clone.querySelector("#usern").innerHTML = json[i].user;


                    var link =  "consumerprofile.php?consumerid=" +
                    encodeURI(json[i].id);
                    clone.querySelector("#consumer-row td a").setAttribute("href", link);


                    //apppend
                    parent.append(clone);
                }

            }


        })

    });
}





function generateQRCode() {
    var fn = document.getElementById('fn').value;
    var ln= document.getElementById('ln').value;;
    var ph= document.getElementById('phone').value;;
    var usr = document.getElementById('usr').value;
    var pasw =document.getElementById('psw').value;
    var address = document.getElementById('address').value;


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

    var element = document.getElementById('addemp');

    element.scrollTo({
        top: 400,
        behavior: 'smooth'
      });

  } 
  else {
    Swal.fire({
        icon: "error",
        title: "Please fill out the form",
      });  
  }
}


$('#btn-add-consumer').click(function(){

    var fn = document.getElementById('fn').value;
    var ln= document.getElementById('ln').value;;

    var usr = document.getElementById('usr').value;
    var pasw =document.getElementById('psw').value;
    var ph= document.getElementById('phone').value;;
    var address = document.getElementById('address').value;

    var plen = $('#profile').get(0).files.length
    var qrlen = $('#qrcode-img').get(0).files.length

    if(fn != '' && ln != '' && pasw != '' && usr != '' && ph != '' && address != '' && plen != 0 && qrlen != 0){

        var profile =  $('#profile').prop('files')[0];    //Fetch the file
        var qrcode =  $('#qrcode-img').prop('files')[0];    //Fetch the file



        var form_data = new FormData();
        form_data.append('functionType', 'insert');
        form_data.append('fn', fn);
        form_data.append('ln', ln);
        form_data.append("phone", ph);
        form_data.append('address', address);
        form_data.append('user', usr);
        form_data.append('pass',pasw);
        form_data.append('profile', profile);
        form_data.append('qrcode', qrcode);

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
                      title: "Consumer added successfully",
                    });       

                    $('#addemp input').val('');

                 $('#addemp').modal('hide');

                 loadConsumer();

                  }
                  else{
                    Swal.fire({
                    icon: "error",
                    title: "Unable to Add Staff",
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






});


