<?php
// class utama ----------------------------
class App {
    protected $controller = 'home', //default controller, huruf besar kecil sama dengan nama class/controller (class disebut controller yang ada di dalam folder controllers)
              $method = 'index', //default method
              $params = [];  //default parameter, (defaultnya kosong)

    public function __construct(){
        $url = $this->parseURL(); //dari hasil method ini, url berisikan apapun yang kita ketik setelah masuk directory public
        // var_dump($url);

        //check apakah dimasukkan controller ke url/tidak==================================================================================
        if($url == NULL) { //jika tidak dimasukkan
            // set url ke default controller(class)
            $url = [$this->controller]; //set controller ke dalam url dalam bentuk array dengan hanya index-0
            // var_dump($url);
            // echo "<br>";
        }
        // =================================================================================================================================

        // set controller===================================================================================================================
        if(file_exists("../app/controllers/{$url[0]}.php")) { //check apakah controller/file yang diakses terdapat (ada/tidak) di dalam controllers (controllers = url[0]) , PERHATIKAN TULISANNYA (pada url tidak apa2 smua huruf kecil)
            $this->controller = $url[0]; //kalau ada filenya di dalam folder controlles, ditimpa
            unset($url[0]); //menghapus element/index ke-0 pada $url, namun indexnya tetap sama, cuman index-0 hilang, misalnya ada index 0,1,2 menjadi 1,2 (bukan memajukan index)
            // var_dump($url);
        }

        // jika dapat controllernya, lalu dipanggil (bisa pakai require / include)
        require_once "../app/controllers/{$this->controller}.php";
        // instansiasi kelas
        $this->controller = new $this->controller; // yang terjadi di sini : $this->controller = new Home();
        // var_dump($this->controller);
        // ==================================================================================================================================

        // set method========================================================================================================================
        // check apakah method di masukken ke url juga/tidak
        if(isset($url[1])) { 
            //check apakah method tersebut ada dalam controllernya (classnya)
            if(method_exists($this->controller, $url[1])) { //parameternya(object, nama_method)
                $this->method = $url[1]; //timpa methodnya jika benar method tersebut ada dalam controllernya(ada method tersebut dalam classnya)
                unset($url[1]); //menghapus element/index ke-1 pada $url, namun indexnya tetap sama, cuman index-1 hilang, misalnya ada index 1,2 menjadi 2 (bukan memajukan index)
            }
        }
        // ===================================================================================================================================

        // set parameter======================================================================================================================
        // check apakah parameter di masukken ke url juga/tidak
        if(!empty($url)) { //check apakan url masih ada isi setelah index 0 dan 1 di unset(dihapus depoannya)
            $this->params = array_values($url); //jika ada, masukkan semua values ke property params yang merupakan sebuah array
            // var_dump($url);
        }
        // ====================================================================================================================================

        // jalankan controller & method, serta kirimkan parameter jika ada=====================================================================
        call_user_func_array([$this->controller, $this->method], $this->params); //fungsi ini untuk menjalankan controller(class) dan methods serta mengirimkan parameter, parameternya (function, parameter_array), function bisa dalam array

    }

    // method - mangambil url dan memecah sesuai keinginan
    public function parseURL() {
        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/'); //menghilangkan tanda slash / diakhir url
            $url = filter_var($url, FILTER_SANITIZE_URL); //membersihkan url dari karakter aneh
            $url = explode('/', $url); //memecah url pada tiap2 slash (/) menjadi array
            return $url; //dalam bentuk array
        }
    }
}