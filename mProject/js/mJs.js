//nếu đúng thì gửi lên Server
//nếu sai thì thông báo lỗi form



function validate_mForm_register() {
    var username = document.getElementById("username");    
    var email = document.getElementById("email");
    var passwd = document.getElementById("passwd");
    var passwd2 = document.getElementById("passwd2");
    //null ?
    
    
    //length?
    if (username.value.length > 16) {
        username.focus(); //focus vào trường chưa nhập
        alert("Độ dài username phải nhỏ hơn 16");
        return false;
    }
    if (passwd.value.length < 6 || passwd.value.length > 16) {
        passwd.focus(); //focus vào trường chưa nhập
        alert("Độ dài passwd lớn hơn 6 và nhỏ hơn 16");
        return false;
    }
    //pass == pass2
    if (passwd2.value != passwd.value) {
        passwd2.focus(); //focus vào trường chưa nhập
        alert("Pass nhập lại chưa trùng khớp");
        return false;
    }


    return true;
}


function validate_mForm_change_passwd() {
    var old_passwd = document.getElementById("old_passwd");
    var new_passwd = document.getElementById("new_passwd");
    var new_passwd2 = document.getElementById("new_passwd2");
    //null ?
    if (old_passwd.value == "") {
        old_passwd.focus(); //focus vào trường chưa nhập
        alert("Chưa nhập old password 1");
        return false;
    }
    if (new_passwd.value == "") {
        new_passwd.focus(); //focus vào trường chưa nhập
        alert("Chưa nhập new password 1");
        return false;
    }
    if (new_passwd2.value == "") {
        new_passwd2.focus(); //focus vào trường chưa nhập
        alert("Chưa nhập new password 2");
        return false;
    }
    
    //pass == pass2
    if (new_passwd2.value != new_passwd.value) {
        passwd2.focus(); //focus vào trường chưa nhập
        alert("Pass nhập lại chưa trùng khớp");
        return false;
    }
    
    //email valid?


    return true;
}
// function validate_add_bm_form() {
//     var new_url = document.getElementById("new_url");
   
//     //null ?
//     if (new_url.value == "") {
//         new_url.focus(); //focus vào trường chưa nhập
//         alert("Chưa nhập vào trường");
//         return false;
//     }
//     var str = new_url.value;
//     var sub = "http://";
//     if (str.indexOf(sub) == -1) {
//         alert("Url của bạn chưa có giao thức http://");
        
//         return false;
//       }
    
    

//     return true;
// }
