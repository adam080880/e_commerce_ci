
let propinsi_current_id = 0;
let propinsi_current = "";
let city_current_id = 0;
let city_current = "";

function __init_propinsi() {
    $(".province").html("");
    $.ajax({
        async: false,
        url: laman + "api/client/province?token="+window.localStorage.getItem('token'),
        type: "GET",        
        success: (e) => {
            let data = e.rajaongkir.results
            
            $.each(data, (index, value) => {
                $(".province").append(`<option value='${value.province_id}' data-value='${value.province}'>${value.province}</option>`)
            })
        }
    })
}

function getAlamat()
{
    let no = 1;
    $("#alamat_f").html("")
    $.ajax({
        url: laman + "api/client/alamat?token="+window.localStorage.getItem('token'),
        type: "GET",
        success: (e) => {
            $.each(e, (index, item) => {
                $("#alamat_f").append(`<tr><td>${no++}</td><td>${item.nama}</td><td>${item.alamat}</td><td><button class='btn btn-primary btn-sm' onclick='showAlamat(${item.id})'><span class='fa fa-info'></span> info</button></td></tr>`)
            })
        }
    })
}

function showAlamat(_id)
{
    $.ajax({
        url: laman + `api/client/alamat_id/${_id}?token=`+window.localStorage.getItem('token'),
        type: "GET",
        success: (e) => {

            $("#city_e").html("")
            $.ajax({        
                async: false,
                url: laman + `api/client/city/${e.province_ro_id}/?token=`+window.localStorage.getItem('token'),
                type: "GET",
                success: (e) => {
                    let data = e.rajaongkir.results
        
                    $.each(data, (index, value) => {
                        $("#city_e").append(`<option value='${value.city_id}' data-value='${value.city_name}'>${value.city_name}</option>`)
                    })
        
                }
            })

            $("#id_a").val(e.id)
            $("#alamat_e").val(e.alamat)
            $("#province_e").val(e.province_ro_id)
            $("#city_e").val(e.kabupaten_or_id)
            $("#kecamatan_e").val(e.kecamatan)
            $("#kelurahan_e").val(e.kelurahan)
            $("#kode_pos_e").val(e.kode_pos)                         
            $("#nama_e").val(e.nama)

            $("#rmAlamat").attr('onclick', `deleteAlamat(${e.id})`)
        }
    })
    $("#modalAlamat_e").modal('show')

}

function deleteAlamat(_id) {
    $.ajax({
        url: laman + "api/client/deleteAlamat/"+_id+"?token="+window.localStorage.getItem('token'),
        type: "GET",
        success: (e) => {
            alert('berhasil')
            getAlamat()
        }
    })
}

$(".province").change((e) => {            
    propinsi_current = $(".province")[0].selectedOptions[0].dataset.value
    propinsi_current_id = $(".province").val()

    $("#city").html("")
    $.ajax({        
        url: laman + `api/client/city/${propinsi_current_id}/?token=`+window.localStorage.getItem('token'),
        type: "GET",
        success: (e) => {
            let data = e.rajaongkir.results

            $.each(data, (index, value) => {
                $("#city").append(`<option value='${value.city_id}' data-value='${value.city_name}'>${value.city_name}</option>`)
            })

        }
    })
    $("#city").removeAttr('disabled')

})

$(".city").change((e) => {
    city_current = $(".city")[0].selectedOptions[0].dataset.value
    city_current_id = $(".city").val()

    $.ajax({
        url: laman + `api/client/city_id/${city_current_id}/?token=`+window.localStorage.getItem('token'),
        type: "GET",
        success: (e) => {
            let data = e.rajaongkir.results            
            $("#kode_pos").val(data.postal_code)
        }
    })
})

$("#form-profile").submit((e) => {
    e.preventDefault()

    $.ajax({
        url: laman + "api/client/addProfile?token="+window.localStorage.getItem('token'),
        type: "POST",
        data: {            
            alamat: $("#alamat").val(),
            provinsi: propinsi_current,
            kota_kab: city_current,
            kecamatan: $("#kecamatan").val(),
            kelurahan: $("#kelurahan").val(),
            kode_pos: $("#kode_pos").val(),
            province_ro_id: propinsi_current_id,
            kabupaten_or_id: city_current_id,
            nama: $("#nama").val()
        },
        success: (e) => {
            if(e) {
                alert("berhasil")
                getAlamat()
            } else {
                alert("galat")
                getAlamat()
            }
            $("#modalAlamat").modal('hide')
            $("#form-profile").trigger('reset')
        }
    })
})

$("#form-profile-e").submit((e) => {
    e.preventDefault()

    $.ajax({
        url: laman + "api/client/editProfile?token="+window.localStorage.getItem('token'),
        type: "POST",
        data: {            
            id: $("#id_a").val(),
            alamat: $("#alamat_e").val(),
            provinsi: propinsi_current,
            kota_kab: city_current,
            kecamatan: $("#kecamatan_e").val(),
            kelurahan: $("#kelurahan_e").val(),
            kode_pos: $("#kode_pos_e").val(),
            province_ro_id: propinsi_current_id,
            kabupaten_or_id: city_current_id,
            nama: $("#nama_e").val()
        },
        success: (e) => {
            if(e) {
                alert("berhasil")
                getAlamat()
            } else {
                alert("galat")
                getAlamat()
            }
            $("#modalAlamat_e").modal('hide')
            $("#form-profile").trigger('reset')
        }
    })
})

$(document).ready(() => {

    __init_propinsi();    
    getAlamat()

})