<?php
//========== DISPLAY HEADER ==================
function do_html_header($title)
{
    //print an HTML header
?>

    <html>

    <head>
        <title><?php echo $title; ?></title>
        <meta charset="UTF-8">
        <!--responsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--bootstrap 4 css-->
        <link href="Bootstrap4\bootstrap-4.4.1-dist\css\bootstrap.css" rel="stylesheet" type="text/css">
        <!--jquery-->
        <script type="text/javascript" src="Jquery\jquery-3.4.1.min.js"></script>
        <!--bootstrap 4 js-->
        <script type="text/javascript" src="Bootstrap4\bootstrap-4.4.1-dist\js\bootstrap.js"></script>
 

    </head>

    <body>

   
        

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="member.php">Php Bookmark</a>

            <!-- Links -->
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item"> <a class="nav-link" href="member.php">Home</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="add_bm_form.php">Add Bookmark</a>
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" href="recommend.php">Recommend Url</a>
                </li>

                <?php 
                    //nếu đã đăng nhập thì "xin chào"
                    if(check_valid_user()){

                        //xuất hiện hi + user !
                        echo "<div class='dropdown'>
                        <button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown'>".
                            "Hi "   . stripslashes($_SESSION['valid_user'])." !". //stripslashes :hàm xử lý chuỗi ,sẽ bỏ dấu \ or \\
                        
                        "</button>
                        <div class='dropdown-menu'>
                          <a class='dropdown-item' href='change_passwd_form.php'>Change Password</a>
                          <a class='dropdown-item' href='#'>Link 2</a>
                          <a class='dropdown-item' href='#'>Link 3</a>
                        </div>
                      </div>";
                       
                      //xuất hiện log out
                        echo "<li class='nav-item'> 
                        <a class='nav-link' href='logout.php'>Logout</a>
                        </li>";
                    }
                    //nếu chưa thì hiện option "đăng nhập đăng ký"
                    else{
                        echo "<li class='nav-item'> 
                        <a class='nav-link' href='login.php'>Log in</a>
                        </li>";
                        echo "<li class='nav-item'> 
                        <a class='nav-link' href='register_form.php'>Register</a>
                        </li>";
                        
                    }
                ?>
                
              
            </ul>

            <p id="test"></p>
        </nav>



        <!--Script-->
        <script>
        var path_name=window.location.pathname;
        var arr_split=path_name.split("/");
        var file_name=arr_split[arr_split.length-1];
        
            var x=document.getElementsByClassName("nav-link");
            for(let i=0;i<x.length;++i){
                
                 if(x[i].getAttribute('href') == file_name)
                 {
                  
                   x[i].className+=" active";
                 }

           
            }
        
        </script>





    </body>

    </html>

<?php

}

//========== DISPLAY FOOTER ==================
function do_html_footer()
{
    //print an HTML footer
?>

    <!-- Footer -->
    <footer class="page-footer font-small ">

        <!-- Copyright -->
        <div class="footer-copyright text-center text-white py-3 bg-danger">© 2020 Copyright:
            <a href="#"> NguyenTuanHuy.com</a>
        </div>
        <!-- Copyright -->
      
        
    </footer>
    <!-- Footer -->
    



<?php
}
?>

<?php
//========== DISPLAY info site ==================
function display_info_site()
{

?>
    <h3>This is info site html</h3>
    <ul>

        <li>Info 1</li>
        <li>Info 2</li>
        <li>Info 3</li>
    </ul>

<?php
}
?>

<?php
//========== DISPLAY registration form ==================
function display_registration_form()
{

?>
    

    <!--bootstrap 4 css-->
    <link href="Bootstrap4\bootstrap-4.4.1-dist\css\bootstrap.css" rel="stylesheet" type="text/css">

<div class="container">
<div class="login-form mx-auto col-5"> <!--mx-auto : margin horizontal center-->
    <div class="page-header text-center">
        <h1>Register</h1>
    </div>
    <form action="register_new.php" method="post" class="form-validate" _lpchecked="1" >
        <div class="form-group">
            <div class="control-label">
                <label id="username-lbl" for="username" class="required invalid">Username</label>
            </div>
            <div class="controls">
                <input name="username" id="username" value="" class="form-control" size="15" required="" autofocus="" placeholder="Enter username" type="text">
               
            </div>
        </div>

        <div class="form-group">
            <div class="control-label">
                <label class="control-label " for="email">Email:</label>
            </div>
            <div class="controls">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required=""> <!--thêm required để kiểm tra form-->
               
            </div>
        </div>
        <div class="form-group">
            <div class="control-label">
                <label id="password-lbl" for="password" class="required">Password</label>
               
            </div>
            <div class="controls">
            <input type="password" class="form-control" id="passwd" placeholder="Enter password" name="passwd" required="">
            </div>
        </div>
        <div class="form-group">
            <div class="control-label">
                <label  for="password2" class="required">Confirm Password</label>
               
            </div>
            <div class="controls">
                <input type="password" class="form-control" id="passwd2" placeholder="Confirm password" name="passwd2" required="">
            </div>
        </div>
       
           
        <div class="controls">
            <button type="submit" class="btn btn-primary" onclick="validate_mForm_register()">Register</button>
        </div>
           
        
       
        
    </form>
   
</div>
</div>
<script type="text/javascript" src="js/mJs.js"></script>
   
<?php
}
?>
<?php
//========== DISPLAY login form ==================
function display_login_form()
{

?>
    <!--bootstrap 4 css-->
     <link href="Bootstrap4\bootstrap-4.4.1-dist\css\bootstrap.css" rel="stylesheet" type="text/css">

    <div class="container">
	<div class="login-form mx-auto col-5"> <!--mx-auto : margin horizontal center-->
		<div class="page-header text-center">
			<h1>Login</h1>
		</div>
		<form action="member.php" method="post" class="form-validate" _lpchecked="1" >
			<div class="form-group">
				<div class="control-label">
					<label id="username-lbl" for="username" class="required invalid">Username<span class="star"> *</span></label>
				</div>
				<div class="controls">
                    <input name="username" id="username" value="" class="form-control" size="15" required="" autofocus="" placeholder="Enter username" type="text">
                   
				</div>
			</div>
			<div class="form-group">
				<div class="control-label">
					<label id="password-lbl" for="password" class="required">Password<span class="star"> *</span></label>
					<a class="float-right" href="forgot_passwd.php">Forgot your password?</a>
				</div>
				<div class="controls">
                <input type="password" class="form-control" id="passwd" placeholder="Enter password" name="passwd" required="">
				</div>
			</div>
			
			<div class="form-group d-flex justify-content-start">
				<div class="controls">
					<button type="submit" class="btn btn-primary" >Log in</button>
				</div>
			</div>
			
			
			
		</form>
		<div class="text-center">
			<a href="register_form.php">Don't have an account?</a>
		</div>
	</div>
</div>






<?php
}
?>

<?php
//========== sinh url chuyển hướng trang ==================
function do_html_url($trang, $ten)
{

?>
    <a href="<?php echo $trang ?>"><?php echo $ten ?></a>

<?php
}
?>

<?php
//========== DISPLAY change form ==================
function display_change_passwd_form()
{

?>


    <!--Form html code-->
    <form action="change_passwd.php" method="post" onsubmit="return validate_mForm_change_passwd()">

        <label>Old Password:
        </label>
        <input type="text" id="old_passwd" name="old_passwd"><br><br>

        <label>New Password:
        </label>
        <input type="text" id="new_passwd" name="new_passwd"><br><br>

        <label>Confirm password:
        </label>
        <input type="text" id="new_passwd2" name="new_passwd2"><br><br>



        <input type="submit" value="Submit">
    </form>
    <!--include file javascript để xử lý form-->
    <script type="text/javascript" src="js/mJs.js"></script>


<?php
}
?>

<?php
//========== DISPLAY forgot form ==================
function display_forgot_passwd_form()
{

?>


    <!--Form html code-->
    <form action="forgot_passwd.php" method="post" onsubmit="return validate_mForm_forgot_passwd();">


        <label>UserName:
        </label>

        <input type="text" id="username" name="username"><br>


        <input type="submit" value="Submit">
    </form>

    <!--include file javascript để xử lý form-->
    <script type="text/javascript">
        function validate_mForm_forgot_passwd() {
            var username = document.getElementById("username");

            //null ?

            if (username.value == "") {
                username.focus(); //focus vào trường chưa nhập
                alert("Chưa nhập username");
                return false;
            }



            return true;
        }
    </script>


<?php
}
?>
<?php
//========== DISPLAY add bookmark form ==================
function display_add_bm_form()
{

?>
    <!--include file javascript để xử lý form-->




    <!--Form html code-->
    <form action="add_bms.php" method="post" onsubmit="return validate_add_bm_form()">


        <label>New BookMark
        </label>

        <input type="text" id="new_url" name="new_url"><br>


        <input type="submit" value="Submit">
    </form>




    <script>
        function validate_add_bm_form() {
            var new_url = document.getElementById("new_url");

            //null ?
            if (new_url.value == "") {
                new_url.focus(); //focus vào trường chưa nhập
                alert("Chưa nhập vào trường");
                return false;
            }
            var str = new_url.value;
            var sub1 = "http://";
            var sub2 = "https://";
            if (str.indexOf(sub1) == -1 && str.indexOf(sub2) == -1) {
                alert("Url của bạn chưa có giao thức http:// hoặc https://");

                return false;
            }



            return true;
        }
    </script>


<?php
}
?>
<?php
//========== DISPLAY user urls ==================
//hiển thị các url của user lấy được từ DB (hàm get_user_urls($username))
function display_user_urls($url_array)
{

?>
    <h2>Your 's Bookmark</h2>

    <br>
    <form action="delete_bms.php" method="post">
        <table border="1px">
            <tr>
                <th>Bookmark</th>
                <th>Delete ?</th>
            </tr>
            <?php

            for ($i = 0; $i < count($url_array); ++$i) {
                echo "<tr>";
                echo "<td>$url_array[$i] </td>";
                //Clicking on the Delete BM option del_me[] activates the delete_bms.php script

                echo "<td><input type='checkbox' name='del_me[]' value='$url_array[$i]'></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <input type="submit" value="Submit">
    </form>


<?php


}
?>

<?php
//========== DISPLAY user urls ==================
//hiển thị các url của user lấy được từ DB (hàm get_user_urls($username))
function display_user_menu()
{
?>
    <hr>
    <ul>


    </ul>
<?php


}
?>

<?php
//========== DISPLAY user urls ==================
//hiển thị các url của user lấy được từ DB (hàm get_user_urls($username))
function display_recommended_urls($urls)
{
?>
    <h3>Recommend url khi current_user ko có "đánh dấu BM" mà >2 ng dùng khác trong DB đánh dấu</h3>
    <p>Vd : user 2 ,user 3 đánh dấu http://zingnew.vn/</p>
    <p>user 1 thì ko đánh dấu trang zing này</p>
    <p>nên recommend sẽ là : http://zingnew.vn/</p>
<?php
    for ($i = 0; $i < count($urls); ++$i) {
        echo $urls[$i] . "<br>";
    }
}
?>