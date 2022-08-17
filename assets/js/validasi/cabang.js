function form_cabang() {
    var nama = document.forms["tambah_cabang"]["cabang"].value;
    var alamat = document.forms["tambah_cabang"]["alamat"].value;
    var kecamatan = document.forms["tambah_cabang"]["kecamatan"].value;
    var username = document.forms["tambah_cabang"]["username"].value;
    var password = document.forms["tambah_cabang"]["password"].value;

    if (nama == "") {
        validasi('Nama cabang wajib di isi!', 'warning');
        return false;
    } else if (alamat == "") {
        validasi(' Alamat Wajib Di Isi!', 'warning')
        return false;
    } else if (kecamatan == "") {
        validasi(' Kecamatan Wajib Di Pilih!', 'warning')
        return false;
    } else if (username == "") {
        validasi('Username Jual  Wajib Di Isi!', 'warning')
        return false;
    } else if (password == "") {
        validasi('Password   Wajib Di Isi!', 'warning')
        return false;
    }

}

function editcabang() {
    var kacamata = document.forms["edit_cabang"]["cabang"].value;

    if (kacamata == "") {
        validasi('Nama cabang wajib di isi!', 'warning');
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

function fileIsValid(fileName) {
    var ext = fileName.match(/\.([^\.]+)$/)[1];
    ext = ext.toLowerCase();
    var isValid = true;
    switch (ext) {
        case 'png':
        case 'jpeg':
        case 'jpg':
        case 'tiff':
        case 'gif':
        case 'tif':

            break;
        default:
            this.value = '';
            isValid = false;
    }
    return isValid;
}

function VerifyFileNameAndFileSize() {
    var file = document.getElementById('GetFile').files[0];


    if (file != null) {
        var fileName = file.name;
        if (fileIsValid(fileName) == false) {
            validasi('Format bukan gambar!', 'warning');
            document.getElementById('GetFile').value = null;
            return false;
        }
        var content;
        var size = file.size;
        if ((size != null) && ((size / (1024 * 1024)) > 3)) {
            validasi('Ukuran maximum 1024px', 'warning');
            document.getElementById('GetFile').value = null;
            return false;
        }

        var ext = fileName.match(/\.([^\.]+)$/)[1];
        ext = ext.toLowerCase();

        if (ext == 'pdf') {
            $('#pdf').show();
            $('#img').hide();
            $(".custom-file-label").addClass("selected").html(file.name);
            document.getElementById('outputPdf').src = window.URL.createObjectURL(file);
        } else {
            $('#pdf').hide();
            $('#img').show();
            $(".custom-file-label").addClass("selected").html(file.name);
            // document.getElementById('outputImg').src = window.URL.createObjectURL(file);
        }
        return true;

    } else
        return false;
}

