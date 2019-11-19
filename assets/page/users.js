
function init_table()
{
    let no = 0;
    $("#tampil").html("")
    $.ajax({
        url: URL + "api/users/get" + "?token=" + token,
        type: "GET",
        success: (e) => {
            e.forEach((item, index) => {                  
                let verified = (item.verified == 'verified_admin') ? 'btn-success' : 'btn-danger';   
                let btnV = (item.verified == 'verified_admin') ? 'fas fa-check' : 'fas fa-ban';   

                if(item.role != 'admin') {
                    verified = 'd-none'
                    btnV = ''

                    $("#tampil").append("<tr class=''><td>"+(++no)+"</td><td>"+(item.username)+"</td><td>"+(item.email)+"</td><td>"+(item.role)+"</td><td class='text-center'><a class='btn btn-primary btn-sm' href='"+URL + "transaksi/user/" + item.id +"'><span class='fas fa-clock fa-sm'></span></a></td></tr>")
                } else if(item.role == 'admin') {
                    $("#tampil").append("<tr class=''><td>"+(++no)+"</td><td>"+(item.username)+"</td><td>"+(item.email)+"</td><td>"+(item.role)+"</td><td class='text-center'><button class='btn btn-sm "+verified+"' onclick='checkVerified("+item.id+")'><span class='"+btnV+" fa-sm'></span></button></td></tr>")
                }                
            })
        }
    })
}

function checkVerified(_id) {
    if(!confirm('yakin ingin melakukan ini?')) {
        return ;
    }

    $.ajax({
        url: URL + "api/users/checked/" + _id + "?token=" + token,
        type: "GET",
        success: (e) => {
            init_table()
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