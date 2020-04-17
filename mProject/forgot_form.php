<?php

require_once 'bookmark_fns.php';




if(check_valid_user()){
    do_html_header("Forgot password");
    echo "Bạn đã đăng nhập rồi";
    do_html_footer();
}else{
   
    display_forgot_passwd_form();
    
}





    





?>