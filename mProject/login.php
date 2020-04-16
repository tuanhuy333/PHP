<?php
/*
do_html_header("Register form");
display_registration_form();
do_html_footer();

chứa trong "output_fns.php"
*/

//import những function trong "bookmark_fns.php"
require_once('bookmark_fns.php');


//gọi hàm này với tham số title là rỗng






if(check_valid_user()){
    
    echo "Bạn đã đăng nhập rồi";
    do_html_url("member.php","Home");
}else{
    

    display_login_form();
    
}











?>