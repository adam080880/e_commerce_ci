
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

function checkout(data)
{
    $.ajax({
        url: laman + "api/client/checkout?token=" + window.localStorage.getItem('token'),
        type: "POST",
        data: data,
        success: (e) => {
            if(e.status) {
                document.location.href=laman+'transaksi/'+e.data.id
            } else {
                document.location.href=laman+'cart'
            }
        }
    })
}

function getAlamat()
{
    let no = 1;
    $("#alamat").html("")
    $.ajax({
        url: laman + "api/client/alamat?token="+window.localStorage.getItem('token'),
        type: "GET",
        success: (e) => {
            $.each(e, (index, item) => {
                $("#alamat").append(`<option value='${item.id}'>${item.nama}</option>`)
            })
        }
    })
}

$(document).ready(() => {

    getCart($("#table-cart"))
    getAlamat()

    $("#checkoutBtn").submit((e) => {
        e.preventDefault()
        checkout({
            token: $("#promoToken").val(),
            alamat: $("#alamat").val()
        })
    })

})