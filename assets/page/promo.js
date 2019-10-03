
function deletePromo(_id)
{
    if(!confirm('Apakah kau yakin ingin menghapus item ini?')) return ;

    $.ajax({
        url: URL + "api/promo/delete/"+_id + "?token=" + token,
        type: "GET",
        success: (e) => {
            console.log(e)
            init_table()
        }
    })
}

function init_table()
{
    let no = 0;
    $("#tampil").html("")
    $.ajax({
        url: URL + "api/promo/get" + "?token=" + token,
        type: "GET",
        success: (e) => {
            e.forEach((item, index) => {
                let expired = (new Date() > new Date(item.expired_date)) ? "table-danger" : ""                

                $("#tampil").append("<tr class='"+expired+"'><td>"+(++no)+"</td><td>#"+(item.token)+"</td><td>"+(item.diskon)+"</td><td>"+(item.expired_date)+"</td><td class='text-center'><button class='btn btn-sm btn-danger' onclick='deletePromo("+item.id+")'><span class='fa fa-trash fa-sm'></span></button></td></tr>")
            })
        }
    })
}

$(document).ready((e) => {
    init_table()

    $("#fPromoTambah").submit((e) => {
        e.preventDefault()

        $.ajax({
            url: URL + "api/promo/post" + "?token=" + token,
            type: "POST",
            data: {
                token: $("#kodePromo").val(),
                expired_date: $("#expiredDate").val(),
                diskon: $("#diskon").val()
            },
            success: (e) => {
                init_table() 
                $("#fPromoTambah").trigger("reset")
                $("#PromoModal").modal('hide')
            }
        })
    })
})