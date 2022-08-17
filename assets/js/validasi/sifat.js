function form_sifat() {
    var sifat = document.forms["tambah_sifat"]["sifat"].value;

    if (sifat == "") {
        validasi('Nama sifat wajib di isi!', 'warning');
        return false;
    }

}

function form_edit_sifat() {
    var sifat = document.forms["edit_sifat"]["sifat"].value;

    if (sifat == "") {
        validasi('Nama sifat wajib di isi!', 'warning');
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