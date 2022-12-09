function rece(){
    document.getElementById('btnpaid').removeAttribute('disabled');

    var name = document.getElementById('cname').value;
    var address = document.getElementById('cadd').value;
    var mused = document.getElementById('ccubics').value;
    var total = document.getElementById('ctotal').value;


    window.open(
        "receipt.php?cname="+
          encodeURI(name)+
           "&address="+
          encodeURI(address)+
          "&mused="+
          encodeURI(mused)+
          "&total="+
          encodeURI(total)+
          "&staff="+
          encodeURI('Kyle Jenner')
      );


}

let consumer_id;

function setCID(id, name, add){
consumer_id = id;

document.getElementById('cnameb').value = name;
document.getElementById('caddb').value = add;
}

function setBill(id, name, add){
    consumer_id = id;

    document.getElementById('btnpaid').setAttribute('disabled', true);
    
    document.getElementById('cname').value = name;
    document.getElementById('cadd').value = add;

    $.ajax({
        url: "./sql/staff.addbill.php",
        type: "POST",
        data:{
            id: consumer_id,
            functionType: 'fetchBillCounter'
        },
        success: function(data) {

            var json = JSON.parse(data);


            if(json.length != 0){
            document.getElementById('genrec').removeAttribute('disabled');
            document.getElementById('btndeletebill').removeAttribute('disabled');
            document.getElementById('cfromdate').value = json[0].startDate.trim();
            document.getElementById('ctodate').value = json[0].dueDate.trim();
            document.getElementById('ccubics').value = json[0].cubic;
            document.getElementById('ctotal').value = json[0].total;
            document.getElementById('cstatus').value = json[0].status;

            $("#payment").val("2");

            }
            else{
            document.getElementById('genrec').setAttribute('disabled', true);
            document.getElementById('btndeletebill').setAttribute('disabled', true);
            document.getElementById('cfromdate').value = '';
            document.getElementById('ctodate').value = '';
            document.getElementById('ccubics').value ='';
            document.getElementById('ctotal').value = '';
            document.getElementById('cstatus').value = '';

            }


            
        }
    })
}
    

loadConsumer();

function loadConsumer(){    
    $(document).ready(function() {
        $.ajax({
            url: "./sql/consumer.fetchbill.php",
            type: "POST",
            data:{
                functionType: 'onDateConsumer'
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
                    clone.querySelector("#billing1-view").dataset.id = json[i].id;
                    clone.querySelector("#billing1-view").dataset.fullname = json[i].fullname;
                    clone.querySelector("#billing1-view").dataset.address = json[i].address;
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

$('#btndeletebill').click(function(){

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
    
    
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
    
    
            $.ajax({
              url: "./sql/staff.addbill.php",
              dataType: 'script',
              type: "POST",
              data: {
                id: consumer_id,
                functionType: 'delete'
              },
            }).done(function (data) {
             
    
              if (data == 0) {
                loadConsumer();

            swalWithBootstrapButtons.fire(
                "Deleted!",
                "Bill now deleted",
                "success"
              );
    
              } else {

                Swal.fire({
                    icon: "error",
                    title: "Deleting bill error",
                    text: "Encountered some error",
                  }); 
                

              }
            });
    
          }
        });

});

$('#btnpaid').click(function (){

    $.ajax({
        url: "./sql/staff.addbill.php",
        dataType: 'script',
        type: "POST",
        data:{
            functionType: 'paid',
            paymentType: "Over the Counter",
            id: consumer_id,
        },
        success: function(data) {

           if(data == 0){
            Swal.fire({
                icon: "success",
                title: "Bill Paid",
              });  
           }
           else {
            Swal.fire({
                icon: "error",
                title: "Bill not paid",
                text: "Encountered some error",
              });  
           }
          

            
           $('#view').modal('hide');
           loadConsumer();

        }


    })

});
