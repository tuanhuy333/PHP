<?php


require_once 'bookmark_fns.php';


do_html_header("Search");

$keyword=$_GET['keyword'];
if(check_valid_user()){

    //nếu lấy url của user hiện tại return true thì hiển thị url
    if ($url_array = get_search_urls($_SESSION['valid_user'],$keyword)){
        echo "Có ".count($url_array)." kết quả tìm thấy";
        display_user_urls($url_array);
    }else{
        echo "Ko có kết quả";
    }
    


}else{
    echo "Bạn chưa đăng nhập";
}


do_html_footer();
?>