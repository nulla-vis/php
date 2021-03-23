
$(document).ready(function() {
    //hilangkan tombol cari------------------------------------------------------------
    $('#tombol-cari').hide();


    //event ketika keyword diketik
    $('#keyword').on('keyup',function() {
        //munculkan icon loading-------------------------------------------------------
        $(".loader").show();

        //ajax menggunakan load--------------------------------------------------------
        //ajax load mengambil data dari source menggunakan GET
        $('#container').load("ajax/mahasiswa.php?keyword=" + $('#keyword').val());
        //load = load isi filesource/udah isinya dengan file source
        //val = value

        //ajax menggunakan $.get()
        $.get("ajax/mahasiswa.php?keyword=" + $("#keyword").val() , function(data) {

            //ganti isi container dengan data
            $("#container").html(data);

            //menghilangkan icon loader
            $(".loader").hide();

        });
    })
});

