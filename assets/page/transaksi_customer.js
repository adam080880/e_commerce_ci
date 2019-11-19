
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

    $("#confirm").on('click', function() {
        $.ajax({
            url: laman + "api/client/confirm/" + $(this).data('id') + "?token=" + window.localStorage.getItem('token'),
            type: "POST",
            success: (e) => {
                if(e) {
                    alert("Pembelian berhasil, terima kasih :)")
                    document.location.href = laman + "transaksis"
                } else {
                    alert("Coba lagi dalam beberapa menit, atau hubungi kami :)")
                }
            }
        })
    })
})