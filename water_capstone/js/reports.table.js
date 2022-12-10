
loadReport();

function loadReport(){

 var ele =document.getElementById('yearinp').value;

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
          year: fil
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
              clone.querySelector("#month").innerHTML = json[i].month_title;
              clone.querySelector("#year").innerHTML = json[i].year;
              clone.querySelector("#sales").innerHTML = json[i].sales;

              var c = parseFloat(json[i].cubic);

            clone.querySelector("#cubic").innerHTML = c.toFixed(2);

              
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
