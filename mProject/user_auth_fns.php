<?php
require_once("db_fns.php");

//đăng ký
function register($username, $email, $password)
{
    //tạo kết nối
    $conn = db_connect();

    //kiểm tra nếu username là duy nhất
    $result = $conn->query("select * from user where username='$username'");
    if (!$result) {
        throw new Exception("Không thực hiện được truy vấn");
    }

    if ($result->num_rows > 0) {
        throw new Exception("User đã tồn tại . Hãy chọn Username khác");
    }

    //nếu ok thì insert
    //sha1 là kiểu băm (sha1 hash)
    $result = $conn->query("insert into user values ('$username',sha1('$password'),'$email')");

    if (!$result) {
        throw new Exception("Không thể insert vào DB.Thử lại");
    }
    return true;
}

function login($username, $password)
{
    //kết nối db
    $conn = db_connect();

    $result = $conn->query("select * from user
                            where username ='$username'
                            and passwd = sha1('$password')");
    if (!$result) {
        throw new Exception("Không thể thực hiện truy vấn select");
    }
    if ($result->num_rows > 0) {
        return true;
    } else {
        throw new Exception("Username or password không chính xác");
    }
}
//kiem tra session
//The check_valid_user()function checks that the current user has a registered session.
function check_valid_user()
// see if somebody is logged in and notify them if not
{
    if (isset($_SESSION['valid_user'])) {
        
        return true;
       
       
    } else {
        // they are not logged in 

      
        return false;
       // exit;
        
    }
}

//change password
function change_password($username, $old_password, $new_password)
// change password for username/old_password to new_password
// return true or false
{
    // if the old password is right
    // change their password to new_password and return true
    // else throw an exception
    //nếu ném ra exception sẽ ko thực hiện bên dưới
    login($username, $old_password);
    $conn = db_connect();
    $result = $conn->query("update user set passwd = sha1('$new_password')
                                where username = '$username'");
    if (!$result)
        throw new Exception('Password could not be changed.');
    else
        return true;
    // changed successfully
}

function reset_password($username)
// set password for username to a random value
// return the new password or false on failure
{
    // get a random word  6 chars length
    $new_password = getRandomWord();
    if ($new_password == false)
        throw new Exception('Could not generate new password.');
    // add a number  between 0 and 999 to it
    // to make it a slightly better password
    srand((float) microtime() * 1000000);
    $rand_number = rand(0, 999);
    $new_password .= $rand_number;
    // set users password to this in database or return false
    $conn = db_connect();
    $result = $conn->query("update user set passwd = sha1('$new_password')where username = '$username'");
    if (!$result)
        throw new Exception('Could not change password.');
    // not changed
    else
        return $new_password;
    // changed successfully
}
function getRandomWord($len = 6) {
    $word = array_merge(range('a', 'z'), range('A', 'Z'));
    shuffle($word);
    return substr(implode($word), 0, $len);
}
function get_random_word($min_length, $max_length)
// grab a random word from dictionary between the two lengths// and return it
{
    // generate a random word
    $word = "";
    // remember to change this path to suit your system
    $dictionary = '/usr/dict/words';
    // the ispell dictionary
    $fp = @fopen($dictionary, 'r');
    if (!$fp)
        return false;
    $size = filesize($dictionary);
    // go to a random location in dictionary
    srand((float) microtime() * 1000000);
    $rand_location = rand(0, $size);
    fseek($fp, $rand_location);
    // get the next whole word of the right length in the file
    while (strlen($word) < $min_length || strlen($word) > $max_length || strstr($word, "'")) {
        if (feof($fp))
            fseek($fp, 0);
        // if at end, go to start
        $word = fgets($fp, 80);
        // skip first word as it could be partial
        $word = fgets($fp, 80);
        // the potential password
    };
    $word = trim($word);
    // trim the trailing \n from fgets
    return $word;
}
function notify_password($username, $password)
// notify the user that password has been changed
{
    $conn = db_connect();
    $result = $conn->query("select email from user where username='$username'");
    if (!$result){
        throw new Exception('Could not find email address.');
    }else if ($result->num_rows==0)
    {
        throw new Exception('Could not find email address.');   
        // username not in db
    }else{
        $row = $result->fetch_object();
        $email = $row->email;
        $from = 'From: support@phpbookmark \r\n';
        $mesg = 'Your PHPbookmark password has been changed to $password \r\n.Please change it next time you log in. \r\n';
        if (mail($email, 'PHPbookmark login information', $mesg, $from))
        return true;
        else
        throw new Exception('Could not send email.');
    }
}

?>
