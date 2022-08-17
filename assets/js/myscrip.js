//simpan
const flashData = $('.flash-data').data('flashdata');
if (flashData) {
    Swal.fire(
        'Berhasil!',
        ''+flashData,
        'success'
    );
};

//hapus
$('.tombol-hapus').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data Akan Di Hapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
      }).then((result) => {
        if (result.value) {
            document.location.href = href;
        };
      });
});


