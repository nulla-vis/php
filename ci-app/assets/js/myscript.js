const flashData = $('.flash-data').data('flashdata');
console.log(flashData);

if(flashData) {
    Swal.fire(
        'Data Mahasiswa',
        `Berhasil ${flashData}`,
        'success'
      )
}

// tombol hapus
$('.tombol-hapus').on('click',function(e) {
    e.preventDefault(); //sweet alert selalu aktifin aksi defaultnya, karena ini link, aksi defaultnya itu berpindah ke halaman yang ada di href-nya
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data Mahasiswa Akan Dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus data'
      }).then((result) => {
        if (result.isConfirmed) {
            // di atas saat tombol hapus dipencet, maka jalankan perintah event.preventDefault() agar tidak reload/berpindah halaman sebelum alert confirmation
            // di sini setelah tombol hapus (alert confirmation) dipencet, baru href-nya dijalankan
            document.location.href = href;
        }
      })
})