<?php

require_once 'bookmark_fns.php';


//session_start(); //để truy cập session

do_html_header('Change password form');

if(check_valid_user()){
    display_change_passwd_form();
}else{
    echo "Hãy đăng nhập để thay đổi password";
}




    


do_html_footer();


?>