
function init_table()
{
    $("#table-transaksi").html("")
    let no = 0

    $.ajax({
        url: laman + "api/client/transaksiAll?token=" + window.localStorage.getItem('token'),
        type: "GET",
        success: (e) => {
            console.log(e);
            $.each(e, (index, item) => {
                $("#table-transaksi").append(`<tr><td>${++no}</td><td>${item.no_resi}</td><td>${item.kirim}</td><td>${item.terima}</td><td>${parseInt( item.total ) + parseInt( item.biaya )}</td><td><a class='btn btn-primary' href='${laman + "transaksi/" + item.id}'>more</a></td></tr>`)
            })
        }
    })
}

$(document).ready(() => {

    init_table()

})