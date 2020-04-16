<?php 


echo basename($_SERVER['SCRIPT_NAME']);
?>

<nav class="navbar navbar-expand-sm bg-primary navbar-dark ">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="#">Php Bookmark</a>

            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item"> <a class="<?php if(basename($_SERVER['SCRIPT_NAME'])=='member.php') echo 'nav-link active'; else echo 'nav-link'; ?>" href="member.php">Home</a></li>
                <li class="nav-item">
                    <a class="<?php if(basename($_SERVER['SCRIPT_NAME'])=='add_bm_form.php') echo 'nav-link active'; else echo 'nav-link'; ?>" href="add_bm_form.php">Add Bookmark</a>
                </li>
                <li class="nav-item"> 
                    <a class="<?php if(basename($_SERVER['SCRIPT_NAME'])=='recommend.php') echo 'nav-link active'; else echo 'nav-link'; ?>" href="recommend.php">Recommend Url</a>
                </li>
                
               
            </ul>

            <p id="test"></p>
        </nav>
