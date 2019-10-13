
let URL = "http://"+window.location.hostname+"/e_commerce/"

if(window.localStorage.getItem('verified')) {
    alert('Kamu adalah admin')
    document.location.href = URL + "admin"
}

if(window.localStorage.getItem('token') && window.localStorage.getItem('role')) {
    alert('kamu sudah login')
    document.location.href = URL
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
                    document.location.href= URL
                }
            }
        })
    })

})