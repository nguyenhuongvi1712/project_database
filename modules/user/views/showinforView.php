<?php
if(get_session('user')==false) direct_to(base_url("?"));
get_header() ;


if(isset($_POST['btn-sm'])){
    $user = array();
    if(!empty($_POST['username'])){
        is_username($_POST['username'])?  : $data['error']['username'] = 'Tên đăng nhập sai định dạng';
    }
    if(!empty($_POST['tel'])){
        is_tel($_POST['tel'])?  : $data['error']['tel'] = 'Số điện thoại sai định dạng';
    }
    if(empty($data['error'])){
        $user['name']=empty($_POST['username'])?$data['userif']['username']:addcslashes($_POST['username'],"<>;'");
        $user['tel']=empty($_POST['tel']) ?$data['userif']['tel_number']:addcslashes($_POST['tel'],"<>'");
        $user['address']=empty($_POST['address'])?$data['userif']['address']:addcslashes($_POST['address'],"<>;'");
        db_query("UPDATE users set username='{$user['name']}',tel_number='{$user['tel']}',address='{$user['address']}' where email='{$data['userif']['email']}'");
        $_SESSION['user']['username'] = $user['name'];
        setcookie('user','',time()-604800); echo $email;
        direct_to(base_url("?mod=user&action=showinfor"));
   
    }

}
?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('input').hide();
            $('textarea').hide();
            $('i').click(function(){
                $('span[style="color:red;"]').remove();
                $(this).prev().children('.d').toggle();
                $(this).prev().children('[name]').toggle();

                $('input[name="btn-sm"]').show();
            })
        })
    </script>
    <div id="main-content-wp" class="home-page">
        <div class="wp-inner clearfix">
            <?php get_sidebar(); ?>
            <div class="container ">
                <h3 class="text-center">Thông tin khách hàng</h3>
                <form action="" method="post" class="form-group ">
                    <div class="row border p-3">
                        <div class="col-11 row">
                            <span class="font-weight-bold col-3">Họ và tên : </span>
                            <span class="d mr-3"><?php echo $data['userif']['username']?></span>
                            <input type="text" name='username' placeholder="<?php echo $data['userif']['username']?>" class="form-control col-9 ">
                            <?php form_error('username'); ?>
                        </div>
                        <i class="far fa-edit col-1 text-right btn" ></i>
                    </div>
                    <div class="row border p-3">
                        <div class="col-11 row">
                            <span class="font-weight-bold col-3">Email : </span>
                            <span class="d"><?php echo $data['userif']['email']?></span>
                        </div>
                    </div>
                    <div class="row border p-3">
                        <div class="col-11 row">
                            <span class="font-weight-bold col-3 ">Số điện thoại : </span>
                            <span class="d mr-3"><?php echo $data['userif']['tel_number']?></span>
                            <input type="text" name='tel' placeholder="<?php echo $data['userif']['tel_number']?>" class="form-control col-9 ">
                            <?php form_error('tel'); ?>
                        </div>
                        <i class="far fa-edit col-1 text-right btn"></i>
                    </div>
                    <div class="row border p-3">
                        <div class="col-11 row">
                            <span class="font-weight-bold col-3">Địa chỉ : </span>
                            <p class="d">
                                <?php echo $data['userif']['address']?>
                            </p>
                            <textarea name="address" id="" cols="30" rows="10"><?php echo $data['userif']['address']?></textarea>
                        </div>
                        <i class="far fa-edit col-1 text-right btn"></i>
                    </div>
                    <input type="submit" value="Submit" name="btn-sm" style="display: block;margin: auto;" class="btn btn-info mt-3">
                </form>
            </div>
        </div>
    </div>
    <? get_footer()?>