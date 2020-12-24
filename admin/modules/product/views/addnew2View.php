<?php get_header();
if(isset($_POST['btn-submit'])){
    if (empty($_POST['product-name'])) {
        $data['error']['product-name'] = 'Tên đăng nhập không được để trống';
    }
    if (empty($_POST['product-code'])) {
        $data['error']['product-code'] = 'Mã sản phẩm không được để trống';
    } else {
        if(is_idproduct($_POST['product-code'])){
            if(check_product_id($_POST['product-code'])) $data['error']['product-code'] = "Mã sản phẩm đã tồn tại";
        }
        else{
            $data['error']['product-code'] = "Mã sản phẩm sai định dạng";
        }
    }
    if (empty($_POST['link_thump'])) {
        $data['error']['link_thump'] = 'Tên đăng nhập không được để trống';
    }
    if (empty($_POST['selling_price'])) {
        $data['error']['selling_price'] = 'Giá bán không được để trống';
    } else {
        is_price($_POST['selling_price'])? :$data['error']['selling_price'] = 'Giá bán không đúng định dạng';
    }
    if (empty($_POST['purchased_price'])) {
        $data['error']['purchased_price'] = 'Giá nhập không được để trống';
    } else {
        is_price($_POST['purchased_price'])? :$data['error']['purchased_price'] = 'Giá nhập không đúng định dạng';
    }
    if (empty($_POST['screen'])) {
        $data['error']['screen'] = 'Màn hình không được để trống';
    }
    if (empty($_POST['graphic_Card'])) {
        $data['error']['graphic_Card'] = 'Card đồ họa không được để trống';
    }
    if (empty($_POST['RAM'])) {
        $data['error']['RAM'] = 'RAM không được để trống';
    }
    if (empty($_POST['cpu'])) {
        $data['error']['cpu'] = 'CPU không được để trống';
    }
    if (empty($_POST['hdh'])) {
        $data['error']['hdh'] = 'Hệ điều hành không được để trống';
    }
    if (empty($_POST['hard_drive'])) {
        $data['error']['hard_drive'] = 'Ổ cứng không được để trống';
    }
    if (empty($_POST['connector'])) {
        $data['error']['connector'] = 'Kết nối không được để trống';
    }
    if (empty($_POST['design'])) {
        $data['error']['design'] = 'Thiết kế không được để trống';
    }
    if (empty($_POST['size'])) {
        $data['error']['size'] = 'Kích thước không được để trống';
    }
    if (empty($_POST['time_of_launch'])) {
        $data['error']['time_of_launch'] = 'Thời điểm ra mắt không được để trống';
    }
    if(empty($data['error'])) {
        add_to_product($_POST['product-code'],2,$_POST['selling_price'],$_POST['purchased_price'],$_POST['link_thump'],$_POST['product-name'],$_POST['desc']);
        add_to_laptop($_POST['product-code'],$_POST['cpu'],$_POST['RAM'],$_POST['hard_drive'],$_POST['screen'],$_POST['graphic_card'],$_POST['connector'],$_POST['operating_system'],$_POST['design'],$_POST['size'],$_POST['time_of_launch']);
        addToManipulation($data['id'],$_POST['product-code'],'create');
        phpAlert("Add thành công");
    }
    


}
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                    <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product-name" id="product-name" <?php echo set_value("product-name")?>>
                        <?php form_error('product-name'); ?>
                        <label for="product-code">Mã sản phẩm</label>
                        <input type="text" name="product-code" id="product-code" <?php echo set_value("product-code")?>>
                        <?php form_error('product-code'); ?>
                        <label for="link_thump">Link ảnh sản phẩm</label>
                        <input type="text" name="link_thump" id="link_thump" <?php echo set_value("link_thump")?>>
                        <?php form_error('link_thump'); ?>
                        <label for="selling_price">Giá bán</label>
                        <input type="text" name="selling_price" id="selling_price" <?php echo set_value("selling_price")?>>
                        <?php form_error('selling_price'); ?>
                        <label for="purchased_price">Giá nhập</label>
                        <input type="text" name="purchased_price" id="purchased_price" <?php echo set_value("purchased_price")?>>
                        <?php form_error('purchased_price'); ?>
                        <label for="screen">Màn hình</label>
                        <input type="text" name="screen" id="screen" <?php echo set_value("screen")?>>
                        <?php form_error('screen'); ?>
                        <label for="graphic_Card">Card đồ họa</label>
                        <input type="text" name="graphic_Card" id="graphic_Card" <?php echo set_value("graphic_Card")?>>
                        <?php form_error('graphic_Card'); ?>
                        <label for="cpu">CPU</label>
                        <input type="text" name="cpu" id="cpu" <?php echo set_value("cpu")?>>
                        <?php form_error('cpu'); ?>
                        <label for="RAM">RAM</label>
                        <input type="text" name="RAM" id="RAM" <?php echo set_value("RAM")?>>
                        <?php form_error('RAM'); ?>
                        <label for="hard_drive">Ổ cứng</label>
                        <input type="text" name="hard_drive" id="hard_drive" <?php echo set_value("hard_drive")?>>
                        <?php form_error('hard_drive'); ?>
                        <label for="connector">Kết nối</label>
                        <input type="text" name="connector" id="connector" <?php echo set_value("connector")?>>
                        <?php form_error('connector'); ?>
                        <label for="hdh">Hệ điều hành</label>
                        <input type="text" name="hdh" id="hdh" <?php echo set_value("hdh")?>>
                        <?php form_error('hdh'); ?>
                        <label for="design">Thiết kế</label>
                        <input type="text" name="design" id="design" <?php echo set_value("design")?>>
                        <?php form_error('design'); ?>
                        <label for="size">Kích thước</label>
                        <input type="text" name="size" id="size" <?php echo set_value("size")?>>
                        <?php form_error('sized'); ?>
                        <label for="time_of_launch">Thời điểm ra mắt</label>
                        <input type="text" name="time_of_launch" id="time_of_launch" <?php echo set_value("time_of_launch")?>> 
                        <?php form_error('time_of_launch'); ?> 
                        <label for="desc">Chi tiết</label>
                        <textarea name="desc" id="desc" class="ckeditor"><?php set_value_textarea("desc") ?></textarea>
                        <button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer()?>