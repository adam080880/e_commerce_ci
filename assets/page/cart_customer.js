
function deleteCart(id)
{
    $.ajax({
        url: laman + "api/client/deleteCart/"+ id + "?token=" + window.localStorage.getItem('token'),
        type: "GET",
        success: (e) => {
            getCart($("#table-cart"))
            if(e.status) {
                alert("Berhasil dihapus")
            } else {
                alert("Galat dihapus")
            }
        }
    })
}

function getCart(table)
{
    let no = 0
    let harga_total = 0

    table.html("")
    return $.ajax({
        async:false,
        url: laman + "api/client/getcart?token=" + window.localStorage.getItem('token'),
        type: "GET",
        success: (e) => {
            e.forEach((item, index) => {
                table.append(`<tr><td>${++no}</td><td><a class='opwh-1 not-u' href='${laman+'item/'+item.barang_id}'>${item.nama}</a></td><td>${item.total}</td><td>Rp. ${item.harga},00</td><td>Rp. ${item.harga * item.total},00</td><td class='text-center'><button class='btn btn-sm btn-danger' onclick='deleteCart(${item.id})'><span class='fa fa-trash'></span></button></td></tr>`)
                harga_total += (item.harga * item.total)
            })

            $("#total-harga").html(harga_total)
        }
    })
}

$(document).ready(() => {

    getCart($("#table-cart"))

})