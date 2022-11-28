<?php



$path = 'assets/test.jpg';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$encode = base64_encode($data);
#$base64 = 'data:image/' . $type . ';base64,' . $encode;
echo $encode;


#if (file_exists($path)){
#    unlink($path);
#    echo "berhasil";
#}else{
#    echo "not found";
#}



#if(!empty($encode)){
#    $decode = base64_decode($encode);
#    try {
#        $im = imageCreateFromString($decode);
#        if(!$im) {
#            throw new Exception("Value is not a valid image");
#        }
#        echo "decode berhasil";
#    } catch(Exception $e){
#        echo 'message: ' . $e->getMessage();
#    }
#}
#$decode = base64_decode($encode);
#$img = imageCreateFromString($decode);
#if (!$img){
#    die('Base64 Not Valid Value');
#}
#$img_file = 'assets/img/testnew.png';
#
#imagepng($img, $img_file, 0);
#
#$data = 'image';
#
#$enc = base64_encode($data);
#$dec = base64_decode($enc);
#echo $enc;
#echo $dec;


?>
