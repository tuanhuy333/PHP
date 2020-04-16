<?php
require_once('bookmark_fns.php');

//session_start(); //để sử dụng session
do_html_header('Changing password');
// create short variable names
if (isset($_POST['old_passwd']) && isset($_POST['new_passwd']) && isset($_POST['new_passwd2'])) {
    $old_passwd = $_POST['old_passwd'];
    $new_passwd = $_POST['new_passwd'];
    $new_passwd2 = $_POST['new_passwd2'];
    try {
        check_valid_user();

        // attempt update
        change_password($_SESSION['valid_user'], $old_passwd, $new_passwd);
        echo 'Password changed.';
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else {
    echo "aaa";
}

do_html_footer();
