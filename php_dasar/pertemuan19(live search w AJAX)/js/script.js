// console.log("OK");

//ambil element2 yang dibutuhkan========================================================================
var keyword =  document.getElementById("keyword");
var tombolCari = document.getElementById("tombol-cari");
var container = document.getElementById("container");

//tambahkan event saat keyword ditulis===================================================================
keyword.addEventListener("keyup" , function() {
    
    //membuat object ajax--------------------------------------------------------------------------------
    var ajax = new XMLHttpRequest();

    //check if ajax ready to use or nope-----------------------------------------------------------------
    ajax.onreadystatechange = function() {
        if( ajax.readyState == 4 && ajax.status == 200 ) {
            // console.log(ajax.responseText); //responseText = contain whatever inside the sourcefile
            container.innerHTML = ajax.responseText;
            // console.log(keyword.value);
        }
    }

    //ajax execution-------------------------------------------------------------------------------------
    // ajax.open("GET/POST","sourcefile",true/false); true = asynchronus, false synchronus
    ajax.open("GET","ajax/mahasiswa.php?keyword=" + keyword.value,true); //using get to send data
    ajax.send();

});