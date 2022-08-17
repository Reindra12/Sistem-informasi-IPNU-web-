function form_kecamatan() {
    var kecamatan = document.forms["tambah_kecamatan"]["kecamatan"].value;

    if (kecamatan == "") {
        validasi('Nama kecamatan wajib di isi!', 'warning');
        return false;
    }

}

function form_edit_kecamatan() {
    var kecamatan = document.forms["edit_kecamatan"]["kecamatan"].value;

    if (kecamatan == "") {
        validasi('Nama kecamatan wajib di isi!', 'warning');
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