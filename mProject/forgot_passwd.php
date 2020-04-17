<?php
require_once('bookmark_fns.php');

do_html_header('Resetting password');
// creating short variable name
if(isset($_POST['username'])){
    $username = $_POST['username'];
try{
    $password = reset_password($username);
    notify_password($username, $password);
    echo 'Your new password has been emailed to you.<br />';
    }
    catch (Exception $e){
        echo $e->getMessage();
        echo 'Your password could not be reset - please try again later.';
    }
}
   
    do_html_footer();
?>