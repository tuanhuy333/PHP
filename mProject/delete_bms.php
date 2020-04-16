<?php
require_once('bookmark_fns.php');
//session_start();
//create short variable names
do_html_header('Deleting bookmarks');
$del_me=null;
if(isset($_POST['del_me'])){
    $del_me = $_POST['del_me']; //duyệt theo mảng del_me từ name= del_me[] của <input
    $valid_user = $_SESSION['valid_user'];
    
    check_valid_user();
    if (count($del_me) >0){
        foreach($del_me as $url){
            if (delete_bm($valid_user, $url))
            echo 'Deleted ' .htmlspecialchars($url).'<br />';
            else echo 'Could not delete ' .htmlspecialchars($url).'<br />';
        }
    }
    else echo 'No bookmarks selected for deletion';

    // get the bookmarks this user has saved
    if ($url_array = get_user_urls($valid_user))
    display_user_urls($url_array);
    
    // display_user_menu();
   
}//chưa lựa chọn checkbox for delete
else{
    echo "Không có bookmark nào được lựa chọn để xóa ";
}
do_html_footer();
 


?>