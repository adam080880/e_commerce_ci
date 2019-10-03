
let URL = "http://"+window.location.hostname+"/e_commerce/"

if(window.localStorage.getItem('token')) {
    alert('kamu sudah login')
    document.location.href = URL + "admin"
}

$(document).ready((e) => {
    
    $("#register").submit((e) => {
        e.preventDefault()

        $.ajax({
            url: URL + "api/users/register",
            data: {
                username: $("#username").val(),
                password: $("#password").val(),
                email: $("#email").val()
            },
            type: "POST",
            success: (e) => {
                if(!e.status) {
                    alert('Register Galat!!, User mungkin sudah ada')
                } else {
                    alert('Register Berhasil!!')                    
                    document.location.href= URL + "admin/login"
                }
            }
        })
    })

})