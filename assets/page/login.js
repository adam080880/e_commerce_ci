
let URL = "http://"+window.location.hostname+"/e_commerce/"

if(window.localStorage.getItem('token') && window.localStorage.getItem('role') && window.localStorage.getItem('verified') ) {
    alert('kamu sudah login')
    document.location.href = URL + "admin"
}

$(document).ready((e) => {
    
    $("#login").submit((e) => {
        e.preventDefault()

        $.ajax({
            url: URL + "api/users/login",
            data: {
                username: $("#username").val(),
                password: $("#password").val()
            },
            type: "POST",
            success: (e) => {
                if(!e.status) {
                    alert('Login Galat!!, User tak valid')
                } else {
                    alert('Login Berhasil!!')
                    window.localStorage.setItem('token', e.data.token)
                    window.localStorage.setItem('role', e.data.role)
                    window.localStorage.setItem('verified', e.data.verified)
                    document.location.href= URL + "admin"
                }
            }
        })
    })

})