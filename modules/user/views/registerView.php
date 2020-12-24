<?php
get_header();

if(isset($_POST['btn-register'])){
    if(empty($_POST['username'])) $data['error']['username'] = 'Tên đăng nhập không được để trống';
    else{
        is_username($_POST['username'])?  : $data['error']['username'] = 'Tên đăng nhập sai định dạng';
    }
    if(empty($_POST['password'])) $data['error']['password'] = 'Mật khẩu không được để trống';
    else {
        is_password($_POST['password'])? :$data['error']['password'] = 'Mật khẩu không đúng định dạng';
    }
    if(empty($_POST['email'])) $data['error']['email'] = 'Email không được để trống';
    else{
        is_email($_POST['email'])? (check_is_exist_email($_POST['email'])? $data['error']['email'] = 'Email đã tồn tại':0) : $data['error']['email'] = 'Email sai định dạng';
    }
    if(empty($_POST['tel'])) $data['error']['tel'] = 'Số điện thoại không được để trống';
    else{
        is_tel($_POST['tel'])?  : $data['error']['tel'] = 'Số điện thoại sai định dạng';
    }
    if(empty($_POST['address'])) $data['error']['address'] = 'Địa chỉ không được để trống';
    if(empty($data['error'])){
        $pw = md5($_POST['password']);
        $sql = "INSERT INTO users(username,email,password,address,tel_number,gender,type) VALUES ('{$_POST['username']}', '{$_POST['email']}','{$pw}','{$_POST['address']}','{$_POST['tel']}','{$_POST['gender']}',0);";
        db_query($sql);
        direct_to(base_url("?mod=user"));
    }
   
}
?>

    <style>
        #register {
            margin: 40px auto;
            background-color: #ffffff;
            border: 2px solid #000000;
        }
        #register form input[type=submit]{
            margin: 0px auto;
        }
        
        form label {
            font-weight: bold;
        }
        
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-4  p-2" id="register">
                <h1 class="text-center">Đăng kí</h1>
                <form action="" method="post" class="p-2">
                    <label for="username">Tên đăng nhập</label>
                    <input type="text" name="username" id="username" placeholder="Username" class="d-block p-1 mb-2" <?php set_value('username'); ?> >
                    <?php form_error('username'); ?>
                    <label for="password">Mật khẩu</label>
                    <input type="password" name="password" id="password" placeholder="Password" class="d-block p-1 mb-2">
                    <?php form_error('password'); ?>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="abc@gmail.com" class="d-block p-1 mb-2"  <?php set_value('email'); ?>>
                    <?php form_error('email'); ?>
                    <label for="tel">Số điện thoại</label>
                    <input type="text" name="tel" id="tel" placeholder="012345678" class="d-block p-1 mb-2"  <?php set_value('tel'); ?>>
                    <?php form_error('tel'); ?>
                    <label for="address">Địa chỉ</label>
                    <textarea name="address" id="address" cols="40" rows="5" class="d-block mb-2" ><?php set_value_textarea('address') ?> </textarea>
                    <?php form_error('address'); ?>
                    <label for="gender" class="d-block">Giới tính</label>
                    <label for="male">Nam</label>
                    <input type="radio" name="gender" id="male" checked="checked" class="mr-4" value="Male">
                    <label for="female">Nữ</label>
                    <input type="radio" name="gender" id="female" value="Female" >
                    <input type="submit" value="Register" name="btn-register" class="btn btn-primary btn-lg  d-block text-center">
                </form>
            </div>
        </div>
    </div>
<?php

get_footer();
?>