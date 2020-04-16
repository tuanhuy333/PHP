<?php

function filled_out($form_vars)
{
    //kiểm tra mỗi biến có giá trị
    //dùng vòng lặp để duyệt ( truyền $form_vars là 1 mảng -> $_POST )
    foreach ($form_vars as $key => $value) {
        //$_POST['username']
        //key : username
        //value : giá trị nhập vào của editText

        //nếu $key chưa được set
        if (!isset($key) || ($value == '')) {
            return false;
        }
    }
    return true;
}

//dùng regular expression để kt
function valid_email($address)
{

    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $address)) ? FALSE : TRUE;
}
