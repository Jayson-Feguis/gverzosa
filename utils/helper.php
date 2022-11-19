<?php 
    function uploadImage($file, $file_temp, $type){
        $image = $file; // $_FILES['addproductimage']['name']
        if($image != ""){
            $extension = end(explode('.', $image));
            $_date = new DateTime();
            $image_date = $_date->format('Y-m-d_H-i-s');
            $image = $type."-".$image_date.".".$extension;
            $source = $file_temp; // $_FILES['addproductimage']['tmp_name'];
            $destination = "../images/".$image;
            if(move_uploaded_file($source, $destination)){
                return $image;
            }
            else{
                return null;
            }
        }
    }
?>