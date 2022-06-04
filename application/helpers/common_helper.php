<?php
// iska use image ko resize karne ke liye kiya jata hai jaise isme likha hai same aisa he karna hai  baki code user_guide se lena hai usme se same code mil jaega bas $this ki jgh $CI likhna hai
 function resizeImage($source_path,$newe_path,$width,$height)
{
   $CI =& get_instance();

$config['image_library'] = 'gd2';
$config['source_image'] = $source_path;
$config['new_image'] = $newe_path;
$config['maintain_ratio'] = TRUE;
$config['width']         = $width;
$config['height']       = $height;

$CI->load->library('image_lib', $config);
$CI->image_lib->initialize($config);

$CI->image_lib->resize();
$CI->image_lib->clear();

}



 ?>
