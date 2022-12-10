var user;


setTimeout(function() {
   loadhistory();
  }, 1000);


function loadhistory(){
    
    user = document.getElementById('profile-pic').getAttribute('data-user');


    $.ajax({
        url: "./sql/consumer.bill.php",
        type: "POST",
        data:{
            functionType: 'history',
            user: user
     
        },
        success: function(data) {

                var json = JSON.parse(data);

                console.log(json);

                for(let i = 0; i < json.length; i++){
                    var tableRow = document.getElementById("historyTable");
                    var row = document.createElement("tr");
                    row.setAttribute('class', 'history-row');
                    var cell1 = document.createElement("td");
                    var cell2 = document.createElement("td");
                    var cell3 = document.createElement("td");
                    var cell4 = document.createElement("td");
                    var cell5 = document.createElement("td");
                    var cell6 = document.createElement("td");



                    cell1.innerHTML = json[i].startDate;
                    cell2.innerHTML = json[i].dueDate;
                    cell3.innerHTML = json[i].cubic;
                    cell4.innerHTML = json[i].total;
                    cell5.innerHTML =  json[i].payment_type;
                    
                    if( json[i].receipts != 'NONE'){
                        cell6.innerHTML = "<a download href='./receiptbill/"+json[i].receipts+"'> See Receipt </a>";
                    }
                    else{
                        cell6.innerHTML = json[i].receipts;
                    }

                    row.appendChild(cell1);
                    row.appendChild(cell2);
                    row.appendChild(cell3);
                    row.appendChild(cell4);
                    row.appendChild(cell5);
                    row.appendChild(cell6);
                    tableRow.appendChild(row);
                }   
           
        }


    })




}