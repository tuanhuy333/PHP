<?php
require_once('bookmark_fns.php');
//session_start();
do_html_header('Recommending URLs');
if(check_valid_user()){
try{
    
        $urls = recommend_urls($_SESSION['valid_user']);
        display_recommended_urls($urls);
    
}
    catch(Exception $e){
        echo $e->getMessage();
    }
}else{
    echo "Bạn chưa đăng nhập";
}

      //  display_user_menu();
        do_html_footer();
        ?>