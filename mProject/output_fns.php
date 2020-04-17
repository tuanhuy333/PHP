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
    <title>Registration</title>
    

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
                <label id="username-lbl" for="username" class="required invalid">Username:</label>
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
                <label id="password-lbl" for="password" class="required">Password:</label>
               
            </div>
            <div class="controls">
            <input type="password" class="form-control" id="passwd" placeholder="Enter password" name="passwd" required="">
            </div>
        </div>
        <div class="form-group">
            <div class="control-label">
                <label  for="password2" class="required">Confirm Password:</label>
               
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
    <title>Login</title>
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
					<a class="float-right" href="forgot_form.php">Forgot your password?</a>
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

    
     <!--bootstrap 4 css-->
     <link href="Bootstrap4\bootstrap-4.4.1-dist\css\bootstrap.css" rel="stylesheet" type="text/css">

<div class="container">
<div class="login-form mx-auto col-5"> <!--mx-auto : margin horizontal center-->
    <div class="page-header text-center">
        <h1>Change Password</h1>
    </div>
    <form action="change_passwd.php" method="post" class="form-validate" _lpchecked="1" onsubmit="return validate_change_passwd_form()">
        <div class="form-group">
            <div class="control-label">
                <label for="old_passwd" class="required invalid">Old password:</label>
            </div>
            <div class="controls">
                <input name="old_passwd" id="old_passwd" value="" class="form-control" size="15" required="" autofocus="" placeholder="Enter old passwd" type="password">
                <p class="text-danger" id="error_url"></p>
               
            </div>
        </div>
        <div class="form-group">
            <div class="control-label">
                <label for="new_passwd" class="required invalid">New password:</label>
            </div>
            <div class="controls">
                <input name="new_passwd" id="new_passwd" value="" class="form-control" size="15" required=""  placeholder="Enter new password" type="text">
                <p class="text-danger" id="error_url"></p>
               
            </div>
        </div>
        <div class="form-group">
            <div class="control-label">
                <label for="new_passwd2" class="required invalid">Confirm new password:</label>
            </div>
            <div class="controls">
                <input name="new_passwd2" id="new_passwd2" value="" class="form-control" size="15" required=""  placeholder="Confirm new password" type="text">
                <p class="text-danger" id="error_url"></p>
               
            </div>
        </div>
        
        
            <div class="controls">
                <button type="submit" id="btn" class="btn btn-primary" onclick="">Change Password</button>
            </div>
        
        
        
        
    </form>
   
</div>
</div>

<script>
        function validate_change_passwd_form() {
            var new_passwd = document.getElementById("new_passwd");
            var new_passwd2 = document.getElementById("new_passwd2");

            if(new_passwd.value != new_passwd2.value){
                alert("New password chưa trùng khớp");
                new_passwd.focus();
                return false;
            }
           
            
           

            return true;
        }
       
            
           


       
    </script>

   
    

<?php
}
?>

<?php
//========== DISPLAY forgot form ==================
function display_forgot_passwd_form()
{

?>

     <!--bootstrap 4 css-->
     <link href="Bootstrap4\bootstrap-4.4.1-dist\css\bootstrap.css" rel="stylesheet" type="text/css">

<div class="container">
<div class="login-form mx-auto col-5"> <!--mx-auto : margin horizontal center-->
    <div class="page-header text-center">
        <h1>Forgot Password</h1>
    </div>
    <form action="forgot_passwd.php" method="post" class="form-validate" _lpchecked="1" >
        <div class="form-group">
            <div class="control-label">
                <label for="username" class="required invalid">Username:</label>
            </div>
            <div class="controls">
                <input name="username" id="username" value="" class="form-control" size="15" required="" autofocus="" placeholder="Enter username" type="text">
                <p class="text-danger" id="error_url"></p>
               
            </div>
        </div>
        
        
            <div class="controls">
                <button type="submit" id="btn" class="btn btn-primary" onclick="">Reset Password</button>
            </div>
        
        
        
        
    </form>
   
</div>
</div>

   
   

<?php
}
?>
<?php
//========== DISPLAY add bookmark form ==================
function display_add_bm_form()
{

?>
    <!--include file javascript để xử lý form-->


    <!--bootstrap 4 css-->
    <link href="Bootstrap4\bootstrap-4.4.1-dist\css\bootstrap.css" rel="stylesheet" type="text/css">

<div class="container">
<div class="login-form mx-auto col-5"> <!--mx-auto : margin horizontal center-->
    <div class="page-header text-center">
        <h1>Add new Bookmark</h1>
    </div>
    <form action="add_bms.php" method="post" class="form-validate" _lpchecked="1" onsubmit="return validate_add_bm_form()">
        <div class="form-group">
            <div class="control-label">
                <label for="new_url" class="required invalid">New url</label>
            </div>
            <div class="controls">
                <input name="new_url" id="new_url" value="" class="form-control" size="15" required="" autofocus="" placeholder="Enter new_url" type="text">
                <p class="text-danger" id="error_url"></p>
               
            </div>
        </div>
        
        
            <div class="controls">
                <button type="submit" id="btn" class="btn btn-primary" onclick="">Add</button>
            </div>
        
        
        
        
    </form>
   
</div>
</div>

   



    <script>
        function validate_add_bm_form() {
            var new_url = document.getElementById("new_url");

           
            var str = new_url.value;
            var sub1 = "http://";
            var sub2 = "https://";
            
            if (str.indexOf(sub1) == -1 && str.indexOf(sub2) == -1) {
                    alert("Url nhập vào phải có http:// hoặc https://");
                    new_url.focus();
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
    

    <div class="container">
  <h2>Your 's Bookmark</h2>
  <p>Hiển thị danh sách những bookmark mà bạn đã thêm vào</p>    
  <form action="delete_bms.php" method="post">        
  <table class="table table-hover table-bordered ">
    <thead class="bg-primary text-light">
      <tr>
        <th>Bookmark</th>
        <th>Delete</th>
        
      </tr>
    </thead>
    <tbody>
            <?php

            for ($i = 0; $i < count($url_array); ++$i) {
                echo "<tr>";
                echo "<td>$url_array[$i] </td>";
                //Clicking on the Delete BM option del_me[] activates the delete_bms.php script

                echo "<td><input type='checkbox' name='del_me[]' value='$url_array[$i]'></td>";
                echo "</tr>";
            }
            ?>
    </tbody>
  </table>
  <button type="submit" id="btn" class="btn btn-primary" onclick="">Delete bookmark</button>
            
  </form>
</div>



   


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