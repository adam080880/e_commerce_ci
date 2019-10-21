
function getCart(table)
{
    return $.ajax({
        url: laman + "api/client/getcart?token=" + window.localStorage.getItem('token'),
        type: "GET",
        success: (e) => {
            
        }
    })
}

$(document).ready(() => {

    

})