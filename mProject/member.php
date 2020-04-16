<?php
// include function files for this application
require_once('bookmark_fns.php');
//bắt đầu sesion
//session_start();


//nếu các POST được set rồi (click vào submit POST từ form)
if(isset($_POST['username']) && isset($_POST['passwd'])){
    $username = $_POST['username'];
    $passwd = $_POST['passwd'];


//khi post data sẽ chạy ở đây
if ($username!="" && $passwd!="") //nếu có giá trị
// they have just tried logging in
//vô trang này thông qa đăng nhập
{
    
    try{
       
        //thực hiện đăng nhập
        login($username, $passwd);
        // if they are in the database register the user id
        $_SESSION['valid_user'] = $username;
    }catch(Exception $e){
        // unsuccessful login
        do_html_header('Problem');
        echo $e->getMessage(); //sẽ xuất exception message trong login(...)
        do_html_url('login.php', 'Login');
        do_html_footer();
        exit;
    }
}
}
    //vô thẳng trang này mà chưa đăng nhập
    //============= nếu đã có session
    do_html_header('Home');
    if(check_valid_user()){
         // get the bookmarks this user has saved
        if ($url_array = get_user_urls($_SESSION['valid_user']))
        display_user_urls($url_array);
    }else{
        echo "Bạn chưa đăng nhập";
    }
    


   
   


    do_html_footer();
?>