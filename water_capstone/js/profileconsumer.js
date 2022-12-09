var consumerid = localStorage.getItem('consumerid');
var consumer_user;



if(consumerid == null  ){
           window.location.replace('./index.html');
}

setProfile();

function setProfile(){
    $.ajax({
        url: "./sql/fetch.profile.php",
        data: {
            typeAcc: 'consumer',
            id: consumerid
        },
        success: function (data) {

            var profiledata = JSON.parse(data);

            var ele = document.getElementById('profile-pic');
            staffname = profiledata[0].user;


            // ele.setAttribute('src', './profile/'+profiledata[0].staff_pic)
            $("#profile-pic").attr("src",'./consumerprofile/'+profiledata[0].profile);

        }
    })
}

$('#alogout').click(function(){

localStorage.clear();
window.location.reload();

});