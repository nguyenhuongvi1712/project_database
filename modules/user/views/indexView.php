<?php
get_header();
if(isset($_POST['btn-login'])){
    if(empty($_POST['email'])) $data['error']['email'] = 'Tên đăng nhập không được để trống';
    else{
        is_email($_POST['email'])?  : $data['error']['email'] = 'Tên đăng nhập sai định dạng';
    }
    if(empty($_POST['password'])) $data['error']['password'] = 'Mật khẩu không được để trống';
    else {
        is_password($_POST['password'])? :$data['error']['password'] = 'Mật khẩu không đúng định dạng';
    }
    if(empty($data['error'])){
        $name = check_user($_POST['email'],$_POST['password']);
        if($name){
            del_session('logout');
            $user = array(
                'username' => $name,
                'email' => $_POST['email'],
                'type' => get_type_of_user($_POST['email'])
            );
            if (!empty($_POST['remember-me'])) {
                setcookie('user',json_encode($user), time()+604800); //lưu trữ cookie trong 1 tuần;
            }
            set_session('user',$user);
            if($user['type']==1)
                direct_to(base_url("admin/?"));
            else
                direct_to(base_url("?"));
        }
        else
        {
            $data['error']['user_login'] = 'Email hoặc mật khẩu không đúng';
        }
    }
}

?>

    <style>
        .container{
           font-size: 20px;
        }
        #login {
            margin: 40px auto;
            background-color: #ffffff;
            border: 2px solid #000000;
        }
        label{
            display: inline-block;
        }
        form input {
            margin: 0px auto;
           
        }
        
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center p-2" id="login">
                <h1>Đăng nhập</h1>
                <form action="" method="post" class="p-2 text-center">
                    <input type="email" name="email" id="" placeholder="Email" class="d-block p-2 mb-5"> 
                    <?php form_error('email');?>
                    <input type="password" name="password" id="" placeholder="Password" class="d-block p-2 mb-5"> 
                    <?php form_error('password');?>
                    <label for="remember-me" class="mt-2">Ghi nhớ đăng nhập</label>
                    <input type="checkbox" name="remember-me" id="remember-me">
                    <input type="submit" value="Login" name="btn-login" class="btn-primary btn-lg d-block">
                    <?php form_error('user_login');?>
                </form>
                <a href="" class="d-block">Quên mật khẩu ?</a>
                <a href="?mod=user&action=register" class="d-block">Đăng kí</a>
            </div>
        </div>
    </div>
    
   
<?php
get_footer();
?>