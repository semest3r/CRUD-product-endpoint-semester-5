$data = [
  'image' => "test",
  'name' => 'test',
];
$img = imageCreateFromString($decode);
if (!$img){
    die('Base64 Not Valid Value');
}
if(!empty($data->image)){
    $file_name = 'img' . time();
    $img_file = 'assets/img/'.$file_name.'.png';
    imagepng($img, $img_file, 0);
    $this->response(['status'=>'sukses'], 200);
}else{
    $this->response(['status'=>'Upload Gagal'], 400);
}


$data = [
    'name_product' => $this->input->post('name_product', true),
    'code_product' => $this->input->post('code_product', true), 
    'image' => $encode,
    'id_category' => $this->input->post('id_category', true),
    'id_detail' => $this->input->post('id_detail', true),
];