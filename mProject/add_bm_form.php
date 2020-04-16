<?php

require_once 'bookmark_fns.php';

do_html_header("Add new bookmark");
if(check_valid_user()){
    display_add_bm_form();
}else{
    echo "Bạn chưa đăng nhập";
}


do_html_footer();

?>