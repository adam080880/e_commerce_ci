// import { CookiesManipulation } from "../plugins/CookiesManipulation";
function getCartCookies(param, cookies)
{
    if(!cookies.getCookie('cart')) {
        param.html(0)
    }
}

$(document).ready(() => {

    let cookACookies = window.CookiesManipulation

    __init_scrolling(document.getElementById("newest-item"))

    getCartCookies($("#cartShow"), cookACookies)    

})