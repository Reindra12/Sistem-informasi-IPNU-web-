function form_suplier() {
    var suplier = document.forms["tambah_suplier"]["suplier"].value;
    var no_hp = document.forms["tambah_suplier"]["no_hp"].value;
    var alamat = document.forms["tambah_suplier"]["alamat"].value;

    if (suplier == "") {
        validasi('Nama suplier wajib di isi!', 'warning');
        return false;
    }else if (no_hp == ""){
        validasi('Nomor Telepon wajib di isi!', 'warning');
        return false;
    }
    else if (alamat == ""){
        validasi('Alamat wajib di isi!', 'warning');
        return false;
    }

}

function form_edit_suplier() {
    var suplier = document.forms["edit_suplier"]["suplier"].value;
    var no_hp = document.forms["edit_suplier"]["no_hp"].value;
    var alamat = document.forms["edit_suplier"]["alamat"].value;

    if (suplier == "") {
        validasi('Nama suplier wajib di isi!', 'warning');
        return false;
    }else if (no_hp == ""){
        validasi('Nomor Telepon wajib di isi!', 'warning');
        return false;
    }
    else if (alamat == ""){
        validasi('Alamat wajib di isi!', 'warning');
        return false;
    }

}


function validasi(judul, status) {
    swal.fire({
        title: judul,
        icon: status,
        confirmButtonColor: '#4e73df',
    });
}