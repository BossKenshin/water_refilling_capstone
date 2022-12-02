
const params = new URLSearchParams(window.location.search);
var staff_id = params.get("staffid");

loadStaff();

function loadStaff(){    
    $(document).ready(function() {
        $.ajax({
            url: "./sql/admin.staff.php",
            type: "POST",
            data:{
                functionType: 'view',
                id: staff_id
            },
            success: function(data) {

                var json = JSON.parse(data);


                document.querySelector('#profile').setAttribute("src", './profile/'+json[0].staff_pic)
                document.getElementById('remove').innerHTML = json[0].staff_firstname + ' '+ json[0].staff_lastname;
                document.getElementById('fnamei').value = json[0].staff_firstname;
                document.getElementById('lnamei').value = json[0].staff_lastname;


                document.getElementById('uni').value = json[0].staff_username;
                document.getElementById('pwi').value = json[0].staff_password;




                console.log(json);

            }


        })

    });
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
                    url: "./sql/admin.staff.php",
                    type: "POST",
                    data:{
                        functionType: 'delete',
                        id: staff_id
                    },
                    success: function(data) {

                
                                window.location.replace('staff.php');
                            
        
                    }
        
        
                })
        
            });

        }
      })

    })
}




$('#btnsub').click(function(){


    var fn = document.getElementById('fnamei').value
    var ln = document.getElementById('lnamei').value
    var user = document.getElementById('uni').value
    var pass = document.getElementById('pwi').value
    var len = $('#imgi').get(0).files.length


    if(fn != null && ln != null && user != null && pass != null ){

        var form_data = new FormData();

        if(len != 0){

            var file =  $('#imgi').prop('files')[0];    //Fetch the file

            form_data.append('functionType', 'updatewpic');
            form_data.append('id',staff_id);
            form_data.append('fn', fn);
            form_data.append('ln', ln);
            form_data.append('user', user);
            form_data.append('pass',pass);
            form_data.append('file', file);
    
    
    
        
        }
        else{

            form_data.append('functionType', 'updatewopic');
            form_data.append('id',staff_id);
            form_data.append('fn', fn);
            form_data.append('ln', ln);
            form_data.append('user', user);
            form_data.append('pass',pass);
        }


        $.ajax({
            url: "./sql/admin.staff.php",                      //Server api to receive the file
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
                      title: "Staff Updated ",
                    });       

                 document.getElementById('fnamei').value = "";
                 document.getElementById('lnamei').value = "";
                  document.getElementById('uni').value = "";
                 document.getElementById('pwi').value = "";
                 document.getElementById('imgi').value = "";


                 loadStaff();

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


