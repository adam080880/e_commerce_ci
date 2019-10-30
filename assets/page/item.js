
$(document).ready(() => {

    $("#cart-form").submit((e) => {
        e.preventDefault()
        $.ajax({
            url: laman + "api/client/addtocart?token=" + window.localStorage.getItem('token'),
            type: "POST",
            data: {
                barang_id: $("#barang_id").val(),
                total: $("#total").val()
            },
            success: (e) => {
                refreshCartNavbar()

                if(e.status) {
                    alert('berhasil di tambahkan ke cart')
                } else {
                    alert('tidak berhasil di tambahkan ke cart')
                }

                document.location.href=laman + "cart"
            }
        })
    })

})