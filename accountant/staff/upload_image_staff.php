<?php

    $file = $_FILES['txt_file'];
    $name = $file['name'];
    $tmp  = $file['tmp_name'];
    $size = $file['size'];
    $type= pathinfo($name, PATHINFO_EXTENSION);
    $t=time();
    $check= getimagesize($tmp);
    $res['imgPath'] = false;
    if($check == false){
        echo 'fake';
    }else{
        if($size > 2000000){
            echo 'Image size not available.';
        }else{
            if($type != 'jpg' && $type != 'JPG' && $type != 'png' && $type !='PNG' && $type !='gif' && $type !='GIF'){
                echo 'image not found';
            }else{
                $res['imgPath']="img/".$t.'.'.$type;
                move_uploaded_file( $tmp,"img/".$t.'.'.$type );
            }			
        }	
    }
    echo json_encode($res);
?>