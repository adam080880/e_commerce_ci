// import { CookiesManipulation } from "../plugins/CookiesManipulation";
function getCartCookies(param, cookies)
{    
    if(cookies.getCookie('cart') == false || cookies.getCookie('cart') == '') {
        param.html(0)
    } else {
        let res = JSON.parse(cookies.getCookie('cart'))
        param.html(res.item.length)
    }
}

$(document).ready(() => {

    let cookACookies = window.CookiesManipulation

    // __init_scrolling(document.getElementById("newest-item"))

    getCartCookies($("#cartShow"), cookACookies)    

})