
let URL = "http://"+window.location.hostname+"/e_commerce/"

let token = window.localStorage.getItem('token')
let role = window.localStorage.getItem('role')
if(!token) {
    window.localStorage.removeItem('token');
    window.localStorage.removeItem('role');     
    document.location.href = URL + "admin/login"
}

if(role != 'customer') {
    window.localStorage.removeItem('token');
    window.localStorage.removeItem('role');     
    document.location.href = URL
}