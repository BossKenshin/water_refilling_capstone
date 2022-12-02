$('#btn-save-staff').click(function(){

   


    var fn = document.getElementById('fn').value
    var ln = document.getElementById('ln').value
    var user = document.getElementById('user').value
    var pass = document.getElementById('pass').value
    var len = $('#profile-pic').get(0).files.length


    if(fn != null && ln != null && user != null && pass != null && len != 0){

    var file =  $('#profile-pic').prop('files')[0];    //Fetch the file

        var form_data = new FormData();
        form_data.append('functionType', 'insert');
        form_data.append('fn', fn);
        form_data.append('ln', ln);
        form_data.append('user', user);
        form_data.append('pass',pass);
        form_data.append('file', file);



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
                      title: "Staff added successfully",
                    });       

                 document.getElementById('fn').value = "";
                 document.getElementById('ln').value = "";
                  document.getElementById('user').value = "";
                 document.getElementById('pass').value = "";
                 document.getElementById('profile-pic').value = "";

                 $('#addemp').modal('hide');

                 loadStaff();

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

})

loadStaff();


// setInterval(loadStaff, 3000);



function loadStaff(){    
    $(document).ready(function() {
        $.ajax({
            url: "./sql/admin.staff.php",
            type: "POST",
            data:{
                functionType: 'fetch'
            },
            success: function(data) {

                var json = JSON.parse(data);

                const template = document.querySelector("#staff-template");

                const parent = document.querySelector("#stafflist");

                $('#stafflist').empty();

                for (let i = 0; i < json.length; i++) {

                    //clone the template
                    let clone = template.content.cloneNode(true);

                    //clone.querySelector("#cols .branchname").innerHTML = 'Staff';
                    clone.querySelector("#staff-name").innerHTML = json[i].fullname;
                    clone.querySelector("#cols img").setAttribute("src", './profile/'+json[i].pic); 
                    clone.querySelector("#cols #goto-view").dataset.id = json[i].id;

                    var link =  "staffprofile.php?staffid=" +
                    encodeURI(json[i].id);

                    clone.querySelector("#cols #goto-view").setAttribute("href", link);


                    //apppend
                    parent.append(clone);
                }

            }


        })

    });
}


// $('#goto-view').click(function(){



//     console.log('click');
//     //alert(staff_id);


//     window.open(
//         "view.student.info.php?sid=" +
//           encodeURI(col2) +
//           "&studentname=" +
//           encodeURI(fname)+
//            "&id="+
//           encodeURI(col1)+
//           "&course="+
//           encodeURI(c)+
//           "&year="+
//           encodeURI(y),
//         "_self"
//       );



// })