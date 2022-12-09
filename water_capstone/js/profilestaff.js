var staffid = localStorage.getItem('staffid');
var staffname;



if(staffid == null  ){
           window.location.replace('./index.html');
}

setProfile();

function setProfile(){
    $.ajax({
        url: "./sql/fetch.profile.php",
        data: {
            typeAcc: 'staff',
            id: staffid
        },
        success: function (data) {

            var profiledata = JSON.parse(data);

            var ele = document.getElementById('profile-pic');
            staffname = profiledata[0].staff_username;


            // ele.setAttribute('src', './profile/'+profiledata[0].staff_pic)
            $("#profile-pic").attr("src",'./profile/'+profiledata[0].staff_pic);

        }
    })
}

$('#alogout').click(function(){

localStorage.clear();
window.location.reload();

});