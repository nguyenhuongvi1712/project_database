<?php get_header();
if(isset($_POST['btn-submit'])){
    if (empty($_POST['product-name'])) {
        $data['error']['product-name'] = 'Tên sản phẩm không được để trống';
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
        $data['error']['link_thump'] = 'Tên sản phẩm không được để trống';
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
    if (empty($_POST['battery_capacity'])) {
        $data['error']['battery_capacity'] = 'Dung lượng pin không được để trống';
    }
    if (empty($_POST['rear_camera'])) {
        $data['error']['rear_camera'] = 'Camera sau không được để trống';
    }
    if (empty($_POST['front_camera'])) {
        $data['error']['front_camera'] = 'Camera trước không được để trống';
    }
    if (empty($_POST['damthoai'])) {
        $data['error']['damthoai'] = 'Đàm thoại không được để trống';
    }
    if (empty($_POST['RAM'])) {
        $data['error']['RAM'] = 'RAM không được để trống';
    }
    if (empty($_POST['ROM'])) {
        $data['error']['ROM'] = 'ROM  không được để trống';
    }
    if (empty($_POST['hdh'])) {
        $data['error']['hdh'] = 'Hệ điều hành không được để trống';
    }
    if (empty($_POST['cpu'])) {
        $data['error']['cpu'] = 'CPU không được để trống';
    }
    if (empty($_POST['weight'])) {
        $data['error']['weight'] = 'Cân nặng không được để trống';
    }
    if (empty($_POST['brand'])) {
        $data['error']['brand'] = 'Thương hiệu không được để trống';
    }
    if(empty($data['error'])) {
        add_to_product($_POST['product-code'],3,$_POST['selling_price'],$_POST['purchased_price'],$_POST['link_thump'],$_POST['product-name'],$_POST['desc']);
        add_to_tablet($_POST['product-code'],$_POST['screen'],$_POST['battery_capacity'],$_POST['rear_camera'],$_POST['front_camera'],$_POST['damthoai'],$_POST['RAM'],$_POST['ROM'],$_POST['hdh'],$_POST['cpu'],$_POST['weight'],$_POST['brand']);
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
                        <label for="battery_capacity">Dung lượng pin</label>
                        <input type="text" name="battery_capacity" id="battery_capacity" <?php echo set_value("battery_capacity")?>>
                        <?php form_error('battery_capacity'); ?>
                        <label for="rear_camera">Camera sau</label>
                        <input type="text" name="rear_camera" id="rear_camera" <?php echo set_value("rear_camera")?>>
                        <?php form_error('rear_camera'); ?>
                        <label for="front_camera">Camera trước</label>
                        <input type="text" name="front_camera" id="front_camera" <?php echo set_value("front_camera")?>>
                        <?php form_error('front_camera'); ?>
                        <label for="damthoai">Đàm thoại</label>
                        <input type="text" name="damthoai" id="damthoai" <?php echo set_value("damthoai")?>>
                        <?php form_error('damthoai'); ?>
                        <label for="RAM">RAM</label>
                        <input type="text" name="RAM" id="RAM" <?php echo set_value("RAM")?>>
                        <?php form_error('RAM'); ?>
                        <label for="ROM">ROM</label>
                        <input type="text" name="ROM" id="ROM" <?php echo set_value("ROM")?>>
                        <?php form_error('ROM'); ?>
                        <label for="hdh">Hệ điều hành</label>
                        <input type="text" name="hdh" id="hdh" <?php echo set_value("hdh")?>>
                        <?php form_error('hdh'); ?>
                        <label for="cpu">CPU</label>
                        <input type="text" name="cpu" id="cpu" <?php echo set_value("cpu")?>> 
                        <?php form_error('cpu'); ?> 
                        <label for="weight">Trọng lượng</label>
                        <input type="text" name="weight" id="weight" <?php echo set_value("weight")?>>
                        <?php form_error('weight'); ?>
                        <label for="brand">Brand</label>
                        <input type="text" name="brand" id="brand" <?php  set_value("brand")?>> 
                        <?php form_error('brand'); ?> 
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