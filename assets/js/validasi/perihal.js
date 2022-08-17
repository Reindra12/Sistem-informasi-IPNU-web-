function form_perihal() {
    var perihal = document.forms["tambah_perihal"]["perihal"].value;

    if (perihal == "") {
        validasi('Nama perihal wajib di isi!', 'warning');
        return false;
    }

}

function form_edit_perihal() {
    var perihal = document.forms["edit_perihal"]["perihal"].value;

    if (perihal == "") {
        validasi('Nama perihal wajib di isi!', 'warning');
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