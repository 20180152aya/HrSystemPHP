<?php

function path($go){
    echo "<script>window.location.replace('/odc/$go')</script>";
}

function emptypath(){
    if(!$_SESSION['admin']['id']){
        path('pages-error-404.php');
    }
}

function auth($rule1 =null ,$rule2 =null){
    if($_SESSION['admin']){
        if($_SESSION['admin']['rule']==1 || $_SESSION['admin']['rule']== $rule1 || $_SESSION['admin']['rule']==$rule2){
            
        }else{
            path('pages-error-404.php');
        }
 
}else{
    path("Admin/login.php");
}
}
function filtervalidtion($input_value){
    $input_value =trim($input_value);
    $input_value =strip_tags($input_value);
    $input_value =htmlspecialchars($input_value);
    $input_value =stripcslashes($input_value);
return $input_value;

}
 function stringvalidtion($input_value,$size =3){
    $empty = empty($input_value);
    $length = strlen($input_value) < $size;
    if($empty == true || $length == true){
        return true;
    }else{
        return false;
    }

 }

 function numberValidtion($input_value)
 {
    $empty = empty($input_value);
    $isNagtive = $input_value<0;
    $isNumber = filter_var($input_value ,FILTER_VALIDATE_FLOAT) == false ;
    if($empty == true || $isNagtive == true|| $isNumber == true){
        return true;
    }else{
        return false;
    }
 }
 function filesizevalidtion($image_name,$file_size, $youesize =2){
    $size = ($file_size/1024) /1024;
    $fileempty = empty($image_name);
    $isvalidate = $size >$youesize;

    if($fileempty == true || $isvalidate == true){
        return true;
    }else{
        return false;
    }
 }
 function fileTypevalidate($file_tpye, $type1=null,$type2=null,$type3=null,$type4=null)
 {
if($file_tpye !="$type1" ||$file_tpye !="$type2" ||$file_tpye !="$type3" || $file_tpye !="$type4"){

    return false;
}else{
    return true;
}
 } 

?>