<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. "libraries/Format.php";
require APPPATH. "libraries/RestController.php";

use chriskacerguis\RestServer\RestController;

class Product extends RestController{
    public function __construct(){
        parent::__construct();
        $this->load->model('ModelProduct');
    } 

    public function index_get(){
        $product = new ModelProduct;
        $data = $product->getProduct();
        $this->response($data, 200);       
    }

    public function index_post(){
        $product = new ModelProduct;

        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
            $image = $this->upload->data();
            $gambar = $image['file_name'];
        } else {
            $gambar = 'default.jpg';
        }
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $data = array(
            'name_product' => $this->post('name_product', true),
            'code_product' => $this->post('code_product', true), 
            'image' => $gambar,
            'id_category' => $this->post('id_category', true)
        );
        $insert = $product->createProduct($data);
        if ($insert > 0) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail'), 502);
        }
    }

    public function category_get(){
        $category = new ModelProduct;
        $data = $category->getCategory();
        $this->response($data, 200);
    }

    public function category_post(){
        $category = new ModelProduct;
        $data = array(
            'name_category' => $this->post('name_category', true),
        );
        $checkData = $category->getCategoryByName($data);
        if ($checkData == False) {
            $insert = $category->createCategory($data);
            if ($insert > 0) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail'), 502);
            }
        } else {
            $this->response(array('status'=>'Data Already Registered'),400);
        }

    }

    public function detail_get(){

    }

    public function detail_post(){

    }
};