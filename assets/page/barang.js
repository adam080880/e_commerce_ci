
function get_barang(_id_kategori) {

    _id_kategori.html('');

    $.ajax({        
        url: URL + "api/barang/getByCat/" + _id_kategori.attr('data-t') + "?token=" + token,
        type: "GET",
        success: (e) => {

            let data = e;
            data.forEach((item, index) => {
                _id_kategori.append("<div class='col-2'><div class='card shadow-sm item' onclick='showBarang("+item.id+")'><div class='card-body'></div><div class='card-footer bg-white'><span class='text-secondary-sidebar d-block'>" + item.nama + "</span><small class='small sidebar-group-p'>Rp. " + item.harga + "</small></div></div></div>")
            })

            __init_scrolling(document.querySelector("#kategori" + _id_kategori.attr('data-t')))
        }
    })

}

function showBarang(_id) {

    $.ajax({
        url: URL + "api/barang/find/" + _id + "?token=" + token,
        type: "GET",
        success: (e) => {
            let data = e[0];
            
            $("#id_b_e").val(data.id)
            $("#namaBarang_e").val(data.nama)
            $("#tipeBarang_e").val(data.tipe)
            $("#sizeBarang_e").val(data.size)
            $("#hargaBarang_e").val(data.harga)
            $("#stokBarang_e").val(data.stok)
            $("#kategoriBarang_e").val(data.kategori_id)
            $("#buttonDeleteBarang").attr("data-id", data.id)
        }
    })

    $("#ShowBarangModal").modal('show')
}

function editKate(_id) {

    $.ajax({
        url: URL + "api/kategori/find/" + _id + "?token=" + token,
        type: "GET",
        success: (e) => {
            let data = e.data[0]
            
            $('#id_e_kat').val(data.id)
            $('#namaKategori_e').val(data.kategori)
            
            $('#EditKategoriModal').modal('show')
        }
    })

}

function deleteKate(_id) {

    if(!confirm("Apakah anda yakin item ini dihapus?")) {
        return ;
    }

    $.ajax({
        url: URL + "api/kategori/delete/"+_id + "?token=" + token,
        type: "GET",
        success: (e) => {
            __init_tampil()
        }
    })
}

function tambahBarang(_id) {

    $("#id_b").val(_id)
    $("#BarangModal").modal('show')

}

function __init_tampil() {
    $("#tampil").html("")
    $("#kategoriBarang_e").html("")
    $.ajax({
        url: URL + "api/kategori/get" + "?token=" + token,
        type: "GET",
        success: (e) => {
            let kategori = e

            kategori.forEach((item, index) => {
                let id = "kategori" + item.id;
                $("#tampil").append("<div class='row'><div class='col text-left'><h5 class='sidebar-group-p'>" + item.kategori + "</h5></div><div class='col text-right'><button class='btn btn-sm btn-success' onclick='tambahBarang("+item.id+")'><i class='fas fa-plus-square'></i> Barang</button> <button class='btn btn-warning btn-sm' onclick='editKate("+item.id+")'><i class='fas text-white fa-sm fa-pen'></i></button> <button class='btn btn-danger btn-sm' onclick='deleteKate("+item.id+")'><i class='fas fa-trash'></i></button></div></div><hr><div class='row items flex-nowrap mb-4 p-2 pl-5 pr-5' style='overflow-x:hidden' data-t=" + item.id + " id='" + id + "'></div>");
                get_barang($('#' + id))

                $("#kategoriBarang_e").append("<option value='"+item.id+"'>"+item.kategori+"</option>")
            })            

        }
    })
}

$(document).ready((e) => {

    __init_tampil()

    // Form kategori submit
    $("#fKategoriTambah").submit((e) => {
        e.preventDefault()

        $.ajax({
            url: URL + "api/kategori/post" + "?token=" + token,
            type: "POST",
            data: {
                kategori: $("#namaKategori").val()
            },
            success: (e) => {
                __init_tampil()                

                $("#fKategoriTambah").trigger("reset")
                $("#KategoriModal").modal('hide')
            }
        })
    })

    // Form kategori edit
    $("#fKategoriEdit").submit((e) => {
        e.preventDefault()

        $.ajax({
            url: URL + "api/kategori/put" + "?token=" + token,
            type: "POST",
            data: {
                kategori: $("#namaKategori_e").val(),
                id: $("#id_e_kat").val()
            },
            success: (e) => {
                __init_tampil()                

                $("#fKategoriEdit").trigger("reset")
                $("#EditKategoriModal").modal('hide')
            }
        })
    })

    // Form barang tambah
    $("#fBarangTambah").submit((e) => {
        e.preventDefault()

        $.ajax({
            url: URL + "api/barang/post" + "?token=" + token,
            type: "POST",
            data: {
                kategori_id: $("#id_b").val(),
                nama: $("#namaBarang").val(),
                tipe: $("#tipeBarang").val(),
                size: $("#sizeBarang").val(),
                harga: $("#hargaBarang").val(),
                stok: $("#stokBarang").val()
            },
            success: (e) => {                
                __init_tampil()

                $("#fBarangTambah").trigger("reset")
                $("#BarangModal").modal('hide')
            }
        })
    })

    // Form barang edit
    $("#fBarangEdit").submit((e) => {
        e.preventDefault()

        $.ajax({
            url: URL + "api/barang/put" + "?token=" + token,
            type: "POST",
            data: {
                id: $('#id_b_e').val(),
                nama: $('#namaBarang_e').val(),
                size: $('#sizeBarang_e').val(),
                tipe: $('#tipeBarang_e').val(),
                harga: $('#hargaBarang_e').val(),
                stok: $('#stokBarang_e').val(),
                kategori_id: $('#kategoriBarang_e').val()
            },
            success: (e) => {
                $("#ShowBarangModal").modal('hide')
                $("#fBarangEdit").trigger("reset")
                __init_tampil()
            }
        })
    })

    // Form barang hapus
    $("#buttonDeleteBarang").click((e) => {
        let id = $("#buttonDeleteBarang").data('id')

        if(!confirm("Apakah anda yakin item ini di hapus?")) {
            return ;
        }

        $.ajax({
            url : URL + "api/barang/delete/"+id + "?token=" + token,
            type: "GET",
            success: (e) => {
                $("#ShowBarangModal").modal('hide')
                $("#fBarangEdit").trigger("reset")
                __init_tampil()
            }
        })
    })


})