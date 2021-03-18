<?php
if( !session_id()) session_start(); //jika tidak ada session, maka jalankan session
// Alamat Utama Aplikasi yang diakses oleh user=======================================================

// memanggil file komponen app
require_once '../app/init.php'; // <<bootstrapping>>

// instansiasi class App yang telah dibuat
$app = new App();
