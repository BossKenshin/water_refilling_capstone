
$('#btn-login').click(function(){
var value = $("input:checked").val();
var user = document.getElementById('user').value;
var pass = document.getElementById('pass').value;

if(value != undefined && user != '' && pass != ''){

    var functionType = "";

        if(value == 'admin'){
            functionType = 'admin';
        }
        else if(value == 'staff'){
            functionType = 'staff';
        }
        else{
            functionType = 'consumer';
        }


        $.ajax({
            url: "./sql/login.php",
            data: {
              functionType: functionType,
              user: user,
              pass: pass
            },
            success: function (data) {

                var json = JSON.parse(data);

                if(json.length != 0){

                    if(json[0].acctype == "admin"){
                        localStorage.setItem('adminid', json[0].admin_id);
                        window.location.href = "admin.php"
                    }
                    else if(json[0].acctype == "staff"){

                        localStorage.setItem('staffid', json[0].staff_id);
                        window.location.href = "sdashboard.php"
                    }
                    else{
                        localStorage.setItem('consumerid', json[0].consumer_id);
                        window.location.href = "cdashboard.php"
                    }

                }
                else{
                    Swal.fire({
                        icon: "error",
                        title: "Log in credentials do not match to an account",
                      });
                }

                    console.log(json);
           
            },
          });



}
else{
    Swal.fire({
        icon: "error",
        title: "Please fill out form",
      });
}


})