<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMahasiswa extends CI_Model
{
    public function getMahasiswa()
    {
       return $this->db->get('mahasiswa')->result();
    }
    public function getMatkul()
    {
        return $this->db->get('mata_kuliah')->result();
    }
    public function getKelas()
    {
        return $this->db->get('kelas')->result();
    }
    public function getKls_Matkul()
    {
        $this->db->select('kelas.*, mata_kuliah.*, kls_matkul.*');
        $this->db->from('kls_matkul');
        $this->db->join('kelas', 'kelas.id = kls_matkul.id_kelas', 'inner');
        $this->db->join('mata_kuliah', 'mata_kuliah.id = kls_matkul.id_matkul', 'inner');
        return $this->db->get('')->result_array();
    }
}
