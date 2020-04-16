<?php
require_once('bookmark_fns.php');

do_html_header('Adding bookmarks');
//create short variable name
if(isset($_POST['new_url'])){
    $new_url = $_POST['new_url'];
    try {
        //nếu người dùng đã đăng nhập thì mới thêm bookmark
        if( check_valid_user()){
            add_bm($new_url) ;
             echo 'Bookmark added.';

             //hiển thị bookmarr
              // get the bookmarks this user has saved
            if ($url_array = get_user_urls($_SESSION['valid_user']))
            display_user_urls($url_array);
        }
        else{
            echo "Bạn chưa đăng nhập";
        }
           
       
       
       
        
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    
}else{
    echo "Chưa điền url";
}




//display_user_menu();
do_html_footer();

?>
