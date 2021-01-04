<?php
get_header();
if (isset($_POST['btn-submit'])) {
    if (!empty($_POST['selling_price'])) {
        is_price($_POST['selling_price'])? :$data['error']['selling_price'] = 'Giá bán không đúng định dạng';
    }
    if (!empty($_POST['purchased_price'])) {
        is_price($_POST['purchased_price'])? :$data['error']['purchased_price'] = 'Giá nhập không đúng định dạng';
    }
    if (empty($data['error'])) {
        $pd =array(
            'product_name' => $_POST['product_name'],
            'link_thump' => $_POST['link_thump'],
            'selling_price' => $_POST['selling_price'],
            'purchased_price' => $_POST['purchased_price'],
            'description' => $_POST['description']);
        $dt =array(
            'screen' => $_POST['screen'],
            'graphic_card' => $_POST['graphic_card'],
            'cpu' => $_POST['cpu'],
            'ram' => $_POST['ram'],
            'hard_drive' => $_POST['hard_drive'],
            'connector' => $_POST['connector'],
            'operating_system' => $_POST['operating_system'],
            'design' => $_POST['design'],
            'size' => $_POST['size'],
            'time_of_launch' => $_POST['time_of_launch'],
            'brand' => $_POST['brand']
        );
        if ($pd) {
            foreach ($pd as $key => $val) {
                if (empty($val)) {
                    unset($pd[$key]);
                }
            }
        }
        if ($dt) {
            foreach ($dt as $key => $val) {
                if (empty($val)) {
                    unset($dt[$key]);
                }
            }
        }
        update($pd, $dt, $data['product']['product_id'], $data['product']['type']);
        addToManipulation($data['id'], $data['product']['product_id'], 'update');
        phpAlert("Chỉnh sửa thành công");
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
                <?php if(!empty($data['updateInfor'])){?>
                <p>Sửa đổi lần cuối bởi : <strong><?php echo $data['updateInfor']['username']?></strong> ngày : <?php echo $data['updateInfor']['manipulation_date']?></p>
                <?php } ?>
                <?php if(!empty($data['product'])) {?>
                <form method="POST">
                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product_name" id="product-name" <?php  set_value("product_name")?> placeholder="<?php echo $data['product']['product_name'] ?>">
                        <label for="product-code">Mã sản phẩm</label>
                        <input type="text" name="product-code" id="product-code" disabled="disabled" value="<?php echo $data['product']['product_id'] ?>">
                        <label for="link_thump">Link ảnh sản phẩm</label>
                        <input type="text" name="link_thump" id="link_thump" <?php set_value("link_thump")?> placeholder="<?php echo $data['product']['thump_link'] ?>">
                        <label for="selling_price">Giá bán</label>
                        <input type="text" name="selling_price" id="selling_price" <?php set_value("selling_price")?> placeholder="<?php echo currency_format($data['product']['selling_price'])?>">
                        <?php form_error('selling_price'); ?>
                        <label for="purchased_price">Giá nhập</label>
                        <input type="text" name="purchased_price" id="purchased_price" <?php set_value("purchased_price")?> placeholder="<?php echo currency_format($data['product']['purchased_price'])?>">
                        <?php form_error('purchased_price'); ?>
                        <label for="screen">Màn hình</label>
                        <input type="text" name="screen" id="screen" <?php echo set_value("screen")?> placeholder="<?php echo $data['product']['screen'] ?>">
                        <label for="graphic_card">Card đồ họa</label>
                        <input type="text" name="graphic_card" id="graphic_card" <?php echo set_value("graphic_Card")?> placeholder="<?php echo $data['product']['graphic_card'] ?>">
                        <label for="cpu">CPU</label>
                        <input type="text" name="cpu" id="cpu" <?php echo set_value("cpu")?> placeholder="<?php echo $data['product']['cpu'] ?>">
                        <label for="ram">RAM</label>
                        <input type="text" name="ram" id="ram" <?php echo set_value("ram")?> placeholder="<?php echo $data['product']['ram'] ?>">
                        <label for="hard_drive">Ổ cứng</label>
                        <input type="text" name="hard_drive" id="hard_drive" <?php echo set_value("hard_drive")?> placeholder="<?php echo $data['product']['hard_drive'] ?>">
                        <label for="connector">Kết nối</label>
                        <input type="text" name="connector" id="connector" <?php echo set_value("connector")?> placeholder="<?php echo $data['product']['connector'] ?>">
                        <label for="operating_system">Hệ điều hành</label>
                        <input type="text" name="operating_system" id="operating_system" <?php echo set_value("operating_system")?> placeholder="<?php echo $data['product']['operating_system'] ?>">
                        <label for="design">Thiết kế</label>
                        <input type="text" name="design" id="design" <?php echo set_value("design")?> placeholder="<?php echo $data['product']['design'] ?>">
                        <label for="size">Kích thước</label>
                        <input type="text" name="size" id="size" <?php echo set_value("size")?> placeholder="<?php echo $data['product']['size'] ?>">
                        <label for="time_of_launch">Thời điểm ra mắt</label>
                        <input type="text" name="time_of_launch" id="time_of_launch" <?php echo set_value("time_of_launch")?> placeholder="<?php echo $data['product']['time_of_launch'] ?>"> 
                        <label for="brand">Brand</label>
                        <input type="text" name="brand" id="brand" <?php set_value("brand")?> placeholder="<?php echo $data['product']['brand'] ?>"> 
                        <label for="desc">Chi tiết</label>
                        <textarea name="description" id="desc" class="ckeditor"><?php if(!isset($_POST['btn-submit'])){echo $data['product']['description'];} else{set_value_textarea("description"); } ?> </textarea>
                        <button type="submit" name="btn-submit" id="btn-submit">Update</button>
                    </form>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer()?>