<?php

require_once 'bookmark_fns.php';


do_html_header('User Profile');

if(check_valid_user()){
    display_user_profile();
}else{
    echo "Bạn phải đăng nhập ";
}

do_html_footer();

?>