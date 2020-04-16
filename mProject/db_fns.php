<?php

function db_connect(){
    $result=new mysqli("localhost","root","","bookmarks");

    if(!$result){
        throw new Exception("Không thể kết nối DB.(thông tin kết nối sai)");
    }else{
        return $result;
    }
}


?>