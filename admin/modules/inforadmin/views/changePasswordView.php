<?php 
ob_start();
get_header();
if(isset($_POST['btn-submit'])){
    if(empty($_POST['pass-old'])) $data['error']['pass-old'] = 'Mật khẩu không được để trống';
    else {
        is_password($_POST['pass-old'])? :$data['error']['pass-pld'] = 'Mật khẩu không đúng định dạng';
    }
    if(empty($_POST['pass-new'])) $data['error']['pass-new'] = 'Mật khẩu không được để trống';
    else {
        is_password($_POST['pass-new'])? :$data['error']['pass-new'] = 'Mật khẩu không đúng định dạng';
    }
    if(empty($_POST['confirm-pass'])) $data['error']['confirm-pass'] = 'Mật khẩu không được để trống';
    else {
        is_password($_POST['confirm-pass'])? :$data['error']['confirm-pass'] = 'Mật khẩu không đúng định dạng';
    }
    if(empty($data['error'])){
        if($data['admin_if']['password']!=md5($_POST['pass-old'])) $data['error']['pass-old'] = 'Mật khẩu cũ không chính xác';
        else{
            if ($_POST['pass-new']!=$_POST['confirm-pass']) {
                $data['error']['confirm-pass'] = "Mật khẩu mới và xác nhận mật khẩu không trùng nhau";
            }
            else{
            db_query("UPDATE users set password ='".md5($_POST['pass-new'])."' where user_id = {$data['admin_if']['user_id']}");
            phpAlert("Cập nhập mật khẩu thành công");
            // direct_to(base_url("?mod=inforadmin"));
            // ob_end_flush();
            }
        }
    }
    
}
?>
<div id="main-content-wp" class="change-pass-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?mod=inforadmin&action=addNewAdmin" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Đổi mật khẩu </h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <div id="sidebar" class="fl-left">
            <ul id="list-cat">
                <li>
                    <a href="?mod=inforadmin" title="">Thông tin tài khoản</a>
                </li>
                <li>
                    <a href="?mod=inforadmin&action=logoutAdmin" title="">Thoát</a>
                </li>
            </ul>
        </div>
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="old-pass">Mật khẩu cũ</label>
                        <input type="password" name="pass-old" id="pass-old">
                        <?php form_error('pass-old'); ?>
                        <label for="new-pass">Mật khẩu mới</label>
                        <input type="password" name="pass-new" id="pass-new">
                        <?php form_error('pass-new'); ?>
                        <label for="confirm-pass">Xác nhận mật khẩu</label>
                        <input type="password" name="confirm-pass" id="confirm-pass">
                        <?php form_error('confirm-pass'); ?>
                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>