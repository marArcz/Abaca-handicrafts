<?php 
define('UPLOAD_PATH','../../assets/images/');
function UploadFile($file, $path=UPLOAD_PATH,$return_include_path=true) : string{
    $filename = $file['name'];
    move_uploaded_file($file['tmp_name'],$path . $filename);

    return $return_include_path? $path . $filename : $filename;
}

?>