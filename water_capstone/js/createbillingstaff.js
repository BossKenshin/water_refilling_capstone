

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

                const parent = document.querySelector("#consumerBillingTable tbody");

                $('#consumerBillingTable tbody').empty();

                for (let i = 0; i < json.length; i++) {

                    //clone the template
                    let clone = template.content.cloneNode(true);

                    //clone.querySelector("#cols .branchname").innerHTML = 'Staff';
                    clone.querySelector("#consumer-fullname1").innerHTML = json[i].fullname;
                    clone.querySelector("#consumer-address1").innerHTML = json[i].address;

                    clone.querySelector("#billing1-create").dataset.id = json[i].id;
                    clone.querySelector("#billing1-create").dataset.fullname = json[i].fullname;
                    clone.querySelector("#billing1-create").dataset.address = json[i].address;
                    clone.querySelector("#consumer-username1").innerHTML = json[i].user;


                    // var link =  "consumerprofile.php?consumerid=" +
                    // encodeURI(json[i].id);
                    // clone.querySelector("#consumer-row td a").setAttribute("href", link);


                    //apppend
                    parent.append(clone);
                }

            }


        })

    });
}




$('#btnbill').click(function(){


    var _startdate = document.getElementById('cfromdateb').value;
    var _duedate = document.getElementById('ctodateb').value;
    var _cubic = document.getElementById('ccubicsb').value;
    var _total = document.getElementById('ctotalb').value;


    if(_startdate != '' && _duedate != '' && _cubic != '' && _total != ''){

        $.ajax({
            url: "./sql/staff.addbill.php",
            dataType: 'script',
            type: "POST",
            data:{
                functionType: 'insert',
                start: _startdate,
                due: _duedate,
                cubic: _cubic,
                total: _total,
                id: consumer_id,
                staff: 'Kylie'
            },
            success: function(data) {

               if(data == 0){
                Swal.fire({
                    icon: "success",
                    title: "Bill added",
                  });  
               }
               else if (data == 1){
                Swal.fire({
                    icon: "error",
                    title: "Bill not added",
                    text: "Encountered some error",
                  });  
               }
               else{
                Swal.fire({
                    icon: "error",
                    title: "Bill cannot be added",
                    text: "The consumer has a pending bill, it must be paid",
                  });  
               }

                
               $('#cbill').modal('hide');
               $('#cbill input').val('');

            }


        })


    }




});


let consumer_id;

function setCID(id, name, add){
consumer_id = id;

document.getElementById('cnameb').value = name;
document.getElementById('caddb').value = add;
}

function getotal(){
    var value = document.getElementById('ccubicsb').value;

    if(value != ''){


 value = parseFloat(value);

    var total = (13 * value).toFixed(2);



    document.getElementById('ctotalb').value = total ;
    }
    else{
        document.getElementById('ctotalb').value = '' ;

    }


    
}



function filterConsumer(){


    var val = document.getElementById('search').value;
    
    
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#consumerBillingTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    
        // $("#consumerBillingTable td#consumer-fullname1:contains('" + val + "')").parent().show();
        // $("#consumerBillingTable td#consumer-fullname1:not(:contains('" + val + "'))").parent().hide();
    
    
    }