function btn(){
    let cubics = document.getElementById("ccubics").value;
    let status = document.getElementById("cstatus").value;
    if(cubics.length != 0 && status.length != 0){
        if(status == "Paid"){
            document.getElementById('genrec').removeAttribute("disabled");
        }
        else
        {
            document.getElementById('genrec').setAttribute("disabled", true);
        }
    document.getElementById('btnpaid').removeAttribute("disabled");
    }
    }
    function rece(){
        window.open("receipt.php");
    }