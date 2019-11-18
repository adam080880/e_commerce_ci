
function checked_id()
{
    $.ajax({
        url: laman + "api/client/valid_transaksi/" + $("#transaksi_id").html() + "?token=" + window.localStorage.getItem('token'),
        type: "GET",
        success: (e) => {
            if(!e) {
                window.location.href = laman + "transaksis"
            }
        }
    })
}

$(document).ready(() => {
    checked_id()
})