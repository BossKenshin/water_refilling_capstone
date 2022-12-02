function update()
{
    document.getElementById('remove').setAttribute("hidden", true);
    document.getElementById('fnamel').removeAttribute("hidden");
    document.getElementById('lnamel').removeAttribute("hidden");
    document.getElementById('fnamei').removeAttribute("hidden");
    document.getElementById('lnamei').removeAttribute("hidden");
    document.getElementById('fnamel').removeAttribute("disabled");
    document.getElementById('lnamel').removeAttribute("disabled");
    document.getElementById('fnamei').removeAttribute("disabled");
    document.getElementById('lnamei').removeAttribute("disabled");
    document.getElementById('uni').removeAttribute("disabled");
    document.getElementById('pwi').removeAttribute("disabled");
    document.getElementById('btnback').setAttribute("hidden", true);
    document.getElementById('btndis').setAttribute("hidden", true);
    document.getElementById('btncan').removeAttribute("hidden");
    document.getElementById('btnsub').removeAttribute("hidden");
    document.getElementById('imgl').removeAttribute("hidden");
    document.getElementById('imgi').removeAttribute("hidden");
}
function cancel()
{
    document.getElementById('remove').removeAttribute("hidden");
    document.getElementById('fnamel').setAttribute("hidden", true);
    document.getElementById('lnamel').setAttribute("hidden", true);
    document.getElementById('fnamei').setAttribute("hidden", true);
    document.getElementById('lnamei').setAttribute("hidden", true);
    document.getElementById('fnamel').setAttribute("disabled", true);
    document.getElementById('lnamel').setAttribute("disabled", true);
    document.getElementById('fnamei').setAttribute("disabled", true);
    document.getElementById('lnamei').setAttribute("disabled", true);
    document.getElementById('uni').setAttribute("disabled", true);
    document.getElementById('pwi').setAttribute("disabled", true);
    document.getElementById('btnback').removeAttribute("hidden");
    document.getElementById('btndis').removeAttribute("hidden");
    document.getElementById('btncan').setAttribute("hidden", true);
    document.getElementById('btnsub').setAttribute("hidden", true);
    document.getElementById('imgl').setAttribute("hidden", true);
    document.getElementById('imgi').setAttribute("hidden", true);
    $('#inputs').find('input').val('');    
    loadStaff();
}

