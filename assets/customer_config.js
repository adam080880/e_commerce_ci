
let laman = "http://" + window.location.hostname + "/e_commerce/"

if (window.location.pathname == "/e_commerce/login") {

    

} else {
    let token = window.localStorage.getItem('token')
    let role = window.localStorage.getItem('role')
    if (!token) {
        window.localStorage.removeItem('token');
        window.localStorage.removeItem('role');
        document.location.href = laman + "login"
    }

    if (role != 'customer') {
        window.localStorage.removeItem('token');
        window.localStorage.removeItem('role');
        document.location.href = laman + "login"
    }
}

