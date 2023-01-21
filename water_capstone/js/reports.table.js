
loadReport();

function loadReport(){

 var ele =document.getElementById('yearinp').value;
 var mo = document.getElementById('month-select').value;

if(ele == ''){

  document.getElementById('yearinp').value = new Date().getFullYear();
}
 var fil;

fil = document.getElementById('yearinp').value;


 if(fil.length == 4){

    $.ajax({
        url: "./sql/admin.report.php",
        type: "GET",
        data: {
          year: fil,
          month: mo
        },
        success: function (data) {

            var json = JSON.parse(data);

            
            const template = document.querySelector("#sales-template");

            const parent = document.querySelector("#reportTable tbody");
    
            $("#reportTable tbody").empty();
    
            for (let i = 0; i < json.length; i++) {
              //clone the template
              let clone = template.content.cloneNode(true);
    
              //clone.querySelector("#cols .branchname").innerHTML = 'Staff';
              clone.querySelector("#consumer").innerHTML = json[i].consumer;
              clone.querySelector("#paid").innerHTML = json[i].paidDate;
              clone.querySelector("#cubic").innerHTML = json[i].cubic;
              clone.querySelector("#total").innerHTML = json[i].total;
              clone.querySelector("#pay-type").innerHTML = json[i].payment_type;

              parent.append(clone);
            }

          
        }
      });

 }
 else{
    Swal.fire({
        icon: "error",
        title: "Please input valid year",
        text: "Example: 2022"
      });
 }
}



function html_table_to_excel(type)
{
    var data = document.getElementById('reportTable');

    var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});

    XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });

    XLSX.writeFile(file, 'file.' + type);
}
