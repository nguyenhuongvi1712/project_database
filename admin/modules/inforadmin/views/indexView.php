<?php get_header()?>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?mod=inforadmin&action=addNewAdmin" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Thông tin tài khoản</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <div id="sidebar" class="fl-left">
            <ul id="list-cat">
                <li>
                    <a href="?mod=inforadmin&action=changePassword" title="">Đổi mật khẩu</a>
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
                        <label for="user_name">Tên hiển thị</label>
                        <input type="text" name="user_name" id="user_name" placeholder="<?php echo $data['admin_if']['username']?>" disabled="disabled">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="<?php echo $data['admin_if']['email']?>" disabled="disabled">
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="tel" id="tel" placeholder="<?php echo $data['admin_if']['tel_number']?>" disabled="disabled">
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address" placeholder="<?php echo $data['admin_if']['address']?>" disabled="disabled"></textarea>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>