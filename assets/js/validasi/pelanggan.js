function form_pelanggan() {
    var pelanggan = document.forms["tambah_pelanggan"]["pelanggan"].value;
    var no_hp = document.forms["tambah_pelanggan"]["no_hp"].value;
    var alamat = document.forms["tambah_pelanggan"]["alamat"].value;

    if (pelanggan == "") {
        validasi('Nama pelanggan wajib di isi!', 'warning');
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

function form_edit_pelanggan() {
    var pelanggan = document.forms["edit_pelanggan"]["pelanggan"].value;
    var no_hp = document.forms["edit_pelanggan"]["no_hp"].value;
    var alamat = document.forms["edit_pelanggan"]["alamat"].value;

    if (pelanggan == "") {
        validasi('Nama pelanggan wajib di isi!', 'warning');
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