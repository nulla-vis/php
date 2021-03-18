$(function() {
    $('.tombolTambahData').on('click', ()=>{
        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#nama').val('');
        $('#nrp').val('');
        $('#email').val('');
        $('#jurusan').val('');
        $('#id').val('');
    });

    $('.tampilModalUbah').on('click', function() {
        $('#formModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action','http://localhost/php/phpmvc/public/mahasiswa/ubah');

        const id = $(this).data('id');

        $.ajax({
            url:'http://localhost/php/phpmvc/public/mahasiswa/getubah',
            data:{id : id}, //ini bisa ditambahkan untuk mengirim data berupa object
            method: 'post', //method pengiriman datanya
            dataType: 'json', // set tipe data yang dikirim berupa apa (json/text)
            success:function (data){
                // console.log(data);
                $('#nama').val(data.nama);
                $('#nrp').val(data.nrp);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id); //data akan dikirimkan ke ubah() ($('.modal-body form').attr('action','http://localhost/php/phpmvc/public/mahasiswa/ubah')agar bisa mendapat data sesuai id-nya

            }
        });
    })
});