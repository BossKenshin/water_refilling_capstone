loadConsumer();
function loadConsumer() {
  $(document).ready(function () {
    $.ajax({
      url: "./sql/consumer.fetchbill.php",
      type: "POST",
      data: {
        functionType: "onlinePaidConsumer",
      },
      success: function (data) {
        var json = JSON.parse(data);

        console.log(json);

        const template = document.querySelector("#consumer-row-template");

        const parent = document.querySelector("#onlineTable tbody");

        $("#onlineTable tbody").empty();

        for (let i = 0; i < json.length; i++) {
          //clone the template
          let clone = template.content.cloneNode(true);

          //clone.querySelector("#cols .branchname").innerHTML = 'Staff';
          clone.querySelector("#fullname").innerHTML = json[i].fullname;
          clone.querySelector("#address").innerHTML = json[i].address;
          clone.querySelector("#billing-view").dataset.id = json[i].id;
          clone.querySelector("#billing-view").dataset.fullname =
            json[i].fullname;
          address =
            json[i].address;

          clone.querySelector("#username").innerHTML = json[i].user;
          clone.querySelector("#billing-view").dataset.address = json[i].address;
          

          // var link =  "consumerprofile.php?consumerid=" +
          // encodeURI(json[i].id);
          // clone.querySelector("#consumer-row td a").setAttribute("href", link);
          //apppend
          parent.append(clone);
        }
      },
    });
  });
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
            functionType: 'fetchOnlineBill'
        },
        success: function(data) {

            var json = JSON.parse(data);

            console.log(data);


            if(json.length != 0){
            document.getElementById('genrec').removeAttribute('disabled');
            document.getElementById('btndeletebill').removeAttribute('disabled');
            document.getElementById('cfromdate').value = json[0].startDate.trim();
            document.getElementById('ctodate').value = json[0].dueDate.trim();
            document.getElementById('ccubics').value = json[0].cubic;
            document.getElementById('ctotal').value = json[0].total;
            document.getElementById('cstatus').value = json[0].status;
            document.getElementById('btnpaid').dataset.bid = json[0].bid;

            var ele = document.getElementById('seeproof').setAttribute('href', "./proof/"+json[0].proof_filename);

            var amount = parseFloat(json[0].total);
            var da;

            if(json[0].days_penalty < 0){
                da = 0;
                document.getElementById('cdays').value = 0;
            }
            else{
              da =  parseFloat(json[0].days_penalty);
              document.getElementById('cdays').value = json[0].days_penalty;
            }


            var twf = amount + (da * 50);

            document.getElementById('ctotalpayment').value = twf;


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


function rece(){
    document.getElementById('btnpaid').removeAttribute('disabled');

    var name = document.getElementById('cname').value;
    var address = document.getElementById('cadd').value;
    var mused = document.getElementById('ccubics').value;
    var total = document.getElementById('ctotalpayment').value;


    window.open(
        "receipt.php?cname="+
          encodeURI(name)+
           "&address="+
          encodeURI(address)+
          "&mused="+
          encodeURI(mused)+
          "&total="+
          encodeURI(total +" with fee")+
          "&staff="+
          encodeURI(staffname)
      );
}


$("#btnpaid").click(function () {
    var qrlen = $('#receipt').get(0).files.length;


    if(qrlen != 0){

    
    var file =  $('#receipt').prop('files')[0];    //Fetch the file


    var datas = new FormData();

    datas.append('receipt', file);
    datas.append('functionType', 'paidOnline');
    datas.append('id', consumer_id);
    datas.append('bid', document.getElementById('btnpaid').getAttribute('data-bid'));



    $.ajax({
      url: "./sql/staff.addbill.php",
      dataType: "script",
      type: "POST",
      data: datas,
      contentType: false,
      processData: false,
      success: function (data) {
        if (data == 0) {
          Swal.fire({
            icon: "success",
            title: "Bill Paid",
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Bill not paid",
            text: "Encountered some error",
          });
        }
  
        $("#view").modal("hide");
        loadConsumer();
      },
    });
}
else{
    Swal.fire({
        icon: "error",
        title: "Please attach receipt",
      });
}



  });
