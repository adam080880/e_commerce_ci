

function init_tampil()
{
    $.ajax({
        url: URL + "api/transaksi/get?token=" + token,
        type: "GET",
        success: (e) => {
            console.log(e)
        }
    })
}

$(document).ready((e) => {
    init_tampil()
})