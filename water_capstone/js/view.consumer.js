
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