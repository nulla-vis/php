<?php
// class utama ----------------------------

// class yang ada di folder controllers adalah controller yang akan extend ke class Controller ini 
// yang akan mengatur semua controller yang kita buat pada folder tersebut
class Controller {
    public function view($view, $data = []) {
        require_once "../app/views/$view.php"; //perhatikan dimana fungsi ini dipanggil, yaitu pada index.php di bagian folder public
    }

    public function model($model) { //parameternya berupa nama model
        require_once "../app/models/$model.php";
        return new $model; //return class
    }
}