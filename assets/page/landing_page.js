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

$(window).on('scroll', (e) => {    
    if($(document).scrollTop() >= $("#item").position().top+50) {        
        $("#item").css('visibility', 'visible')
        $("#item").addClass('on-ready-from-right-to-left-slide')
    }
})

$(document).ready(() => {

    let cookACookies = window.CookiesManipulation

    // __init_scrolling(document.getElementById("newest-item"))
    $("#item").css('visibility', 'hidden')
    getCartCookies($("#cartShow"), cookACookies)    

})