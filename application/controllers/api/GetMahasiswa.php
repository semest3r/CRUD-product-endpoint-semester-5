<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. "libraries/Format.php";
require APPPATH. "libraries/RestController.php";

use chriskacerguis\RestServer\RestController;

class GetMahasiswa extends RestController {
    public function __construct(){
        parent::__construct();
        $this->load->model('ModelMahasiswa');
    } 
    public function index_get(){
        $mhs = new ModelMahasiswa;
        $data = $mhs->getMahasiswa();
        $this->response($data, 200);        
    }
    public function matakuliah_get(){
        $mhs = new ModelMahasiswa;
        $data = $mhs->getMatkul();
        $this->response($data, 200);
    }
    public function kelas_get(){
        $mhs = new ModelMahasiswa;
        $data = $mhs->getKelas();
        $this->response($data, 200);
    }
    public function klsmatkul_get(){
        $mhs = new ModelMahasiswa;
        $data = $mhs->getKls_Matkul();
        $this->response($data, 200);
    }
};
?>