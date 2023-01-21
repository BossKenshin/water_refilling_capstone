let consumer_username ;


    $('#reader').hide();

    $('#btn-show-scanner').click(function(){

        if($("#reader").css('display') == 'none'){
            setCamera();
            $('#reader').show();
            } else{

            document.getElementById('reader').innerHTML ='';
            $('#reader').hide();

            }


    });

function onScanSuccess(decodedText, decodedResult) {
  // handle the scanned code as you like, for example:
  var decodedText1 = decodedText;

  var json = JSON.parse(decodedText1);

    consumer_username  = json.user;

  setBill(json.user);

}

function onScanFailure(error) {
  // handle scan failure, usually better to ignore and keep scanning.
  // for example:
  console.warn(`Code scan error = ${error}`);
}




function setBill(user){

    $.ajax({
            url: "./sql/consumer.bill.php",
            type: "POST",
            data:{
                functionType: 'fetchbill',
                user: user
         
            },
            success: function(data) {

                var json_bill = JSON.parse(data);


                    document.getElementById('start').innerHTML = json_bill[0].startDate;
                    document.getElementById('due').innerHTML = json_bill[0].dueDate;
                    document.getElementById('cubic').innerHTML = json_bill[0].cubic;
                    document.getElementById('amount').innerHTML = json_bill[0].total;
                   var dayss = json_bill[0].diff;
                                                                                                                                                                                                        var days;
                     if(dayss <= 0){
                        document.getElementById('days').innerHTML = '0';
                        days = 0;
                    }
                    else{
                      document.getElementById('days').innerHTML = json_bill[0].diff;
                      days = parseFloat(json_bill[0].diff);
                    }
                 

                  
                    document.getElementById('submit-proof').dataset.billid = json_bill[0].bill_id;


                      
                     var amount = parseFloat(json_bill[0].total);

                     var totalwfee = amount + (days * 50);

                    
                    document.getElementById('total').innerHTML = totalwfee;
            }


        })

}


// function onScanFailure(error) {
//   // handle scan failure, usually better to ignore and keep scanning.
//   // for example:
// }

function setCamera(){

let html5QrcodeScanner = new Html5QrcodeScanner(
  "reader",
  { fps: 10, qrbox: {width: 300, height: 300} },
  /* verbose= */ false);

html5QrcodeScanner.render(onScanSuccess,onScanFailure);



Html5Qrcode.getCameras().then(devices => {
  /**
   * devices would be an array of objects of type:
   * { id: "id", label: "label" }
   */
  if (devices && devices.length) {
    var cameraId = devices[0].id;
    // .. use this to start scanning.
  }
}).catch(err => {
  // handle err
});
}
var imgin = document.getElementById('proof');
var blah = document.getElementById('receipt');

imgin.onchange = evt => {
    const [file] = imgin.files
    if (file) {
      blah.src = URL.createObjectURL(file)
    }
  }


  $('#submit-proof').click(function(){

    var plen = $('#proof').get(0).files.length;
    var bid =  document.getElementById('submit-proof').getAttribute('data-billid');
    var rowCount = $('#billTable tbody tr #start').text();

    if(plen != 0 && bid != undefined || bid != null ){

            var filename =  $('#proof').prop('files')[0];    //Fetch the file

            var form_data = new FormData();

            form_data.append('functionType','paybillonline');
            form_data.append('proof',filename);
            form_data.append('bid',bid);

            $.ajax({
                url: "./sql/consumer.bill.php",
                dataType: 'script',
                type: "POST",
                data:form_data,
                processData: false,
                contentType: false,
                success: function(data) {
    
                    if(data== 0){
                        Swal.fire({
                            icon: "success",
                            title: "Proof of Payment Submitted",
                            text: "It will be reviewed by the staff for confirmation"
                          }); 
                    }

                    else{
                        Swal.fire({
                            icon: "error",
                            title: "Proof of Payment not Submitted",
                            text: "Please try again"
                          });
                    }
                }
    
    
            })

    }
    else{
        Swal.fire({
            icon: "error",
            title: "Fill out the form",
            text: "If error keeps showing please log in again"
          });  
    }
  
    $('#paymentproof').modal('hide');
    document.getElementById('proof').value = '';
    blah.src ='';
    $('#billTable tbody tr #start').text('');


  })
