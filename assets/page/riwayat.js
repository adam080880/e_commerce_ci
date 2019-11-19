

function init_tampil()
{
    let no = 0;
    $("#tampil").html("")
    $.ajax({
        url: URL + "api/Transaksi_Admin/get?token=" + token,
        type: "GET",
        success: (e) => {
            $.each(e, (index, item) => {
                if(item.status == 'unverified') {
                    $("#tampil").append(`<tr><td>${++no}</td><td>${item.username}</td><td>${item.no_resi}</td><td>${item.created_at}</td><td class='text-center'><button class='btn btn-primary kirim' data-id='${item.id}'>Kirim</button></td></tr>`)
                } else if(item.status == 'verified') {
                    $("#tampil").append(`<tr><td>${++no}</td><td>${item.username}</td><td>${item.no_resi}</td><td>${item.created_at}</td><td class='text-center'><button class='btn btn-primary' disabled data-id='${item.id}'>Diantar</button></td></tr>`)
                } else {
                    $("#tampil").append(`<tr><td>${++no}</td><td>${item.username}</td><td>${item.no_resi}</td><td>${item.created_at}</td><td class='text-center'><button class='btn btn-success' disabled data-id='${item.id}'>Diterima</button></td></tr>`)
                }
            })
        }
    })
}

function changeStatusToVerified(id)
{
    $.ajax({
        url: URL + "api/Transaksi_Admin/changeToVerified/"+id+"?token=" + token,
        type: "POST",
        success: (e) => {
            alert("Barang diantar")
            init_tampil()
        }
    })
}

$(document).ready(function() {

    $('#tampil').on('click', ".kirim" ,function() {        
        let id = $(this).data('id')

        changeStatusToVerified(id)
    })
    init_tampil()    

})