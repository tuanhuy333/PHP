<?php
/*
filled_out($_POST);
valid_email($email);

chứa trong "data_valid_fns.php"
*/

//xử lý đăng ký
require_once('bookmark_fns.php');



//bắt đầu session 
//session_start(); //hàm có sẵn


//đã kiểm tra các trường ở client (js)
//nếu các biến POST đã được set
if(isset($_POST['email']) && isset($_POST['username']) && isset($_POST['passwd']) && isset($_POST['passwd2'])  ){
    try {

        $email = $_POST['email'];
        $username = $_POST['username'];
        $passwd = $_POST['passwd'];
        $passwd2 = $_POST['passwd2'];

        //thực hiện đăng ký
        register($username, $email, $passwd);
    
        //tạo session
        $_SESSION['valid_user'] = $username;
    
        //Thực hiện điều hướng trang web
        do_html_header("Registration successful");
        echo "Bạn đã đăng ký thành công.Hãy đến trang thành viên";
    
        //sinh url (thẻ a)
        do_html_url('member.php', 'Đến trang thành viên');
    
        //end page
        do_html_footer();
    } catch (Exception $e) {
        do_html_header("Lỗi ");
        echo $e->getMessage();
    
        do_html_footer();
        exit;
    }
}else{
    echo "Các biến POST chưa được set";
}

