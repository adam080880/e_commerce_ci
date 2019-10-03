
let URL = "http://"+window.location.hostname+"/e_commerce/"

let token = window.localStorage.getItem('token')
let role = window.localStorage.getItem('role')
let verified = window.localStorage.getItem('verified')
if(!token) {
    window.localStorage.removeItem('token');
    window.localStorage.removeItem('role'); 
    window.localStorage.removeItem('verified'); 
    document.location.href = URL + "admin/login"
}

if(role != 'admin' || verified != 'verified_admin') {
    window.localStorage.removeItem('token');
    window.localStorage.removeItem('role'); 
    window.localStorage.removeItem('verified'); 
    document.location.href = URL + "admin/login"
}