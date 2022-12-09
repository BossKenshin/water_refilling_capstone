var adminid = localStorage.getItem('adminid');



if(adminid == null ){
           window.location.replace('./index.html');
}

setProfile();

function setProfile(){
    $.ajax({
        url: "./sql/fetch.profile.php",
        data: {
            typeAcc: 'admin',
            id: adminid
        },
        success: function (data) {

            var profiledata = JSON.parse(data);

            var ele = document.getElementById('alogout');


            console.log(ele);
      

        }
    })
}

$('#alogout').click(function(){

localStorage.clear();
window.location.reload();

});