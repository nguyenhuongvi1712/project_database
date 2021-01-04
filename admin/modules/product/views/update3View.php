<?php
get_header();
if(isset($_POST['btn-submit'])){
    if (!empty($_POST['selling_price'])) {
        is_price($_POST['selling_price'])? :$data['error']['selling_price'] = 'Giá bán không đúng định dạng';
    }
    if (!empty($_POST['purchased_price'])) {
        is_price($_POST['purchased_price'])? :$data['error']['purchased_price'] = 'Giá nhập không đúng định dạng';
    }
    if(empty($data['error'])) {
        $pd =array(
            'product_name' => $_POST['product_name'],
            'link_thump' => $_POST['link_thump'],
            'selling_price' => $_POST['selling_price'],
            'purchased_price' => $_POST['purchased_price'],
            'description' => $_POST['description']);
        $dt =array(
            'screen' => $_POST['screen'],
            'battery_capacity' => $_POST['battery_capacity'],
            'rear_camera' => $_POST['rear_camera'],
            'front_camera' => $_POST['front_camera'],
            'damthoai' => $_POST['damthoai'],
            'ram' => $_POST['ram'],
            'rom' => $_POST['rom'],
            'hdh' => $_POST['hdh'],
            'cpu' => $_POST['cpu'],
            'weight' => $_POST['weight'],
            'brand' => $_POST['brand']
        );
        if($pd){
            foreach($pd as $key => $val){
               if(empty($val)) unset($pd[$key]);
            }
        }
        if($dt){
            foreach($dt as $key => $val){
                if(empty($val)) unset($dt[$key]);
             }
        }
        update($pd,$dt,$data['product']['product_id'],$data['product']['type']);
        addToManipulation($data['id'],$data['product']['product_id'],'update');
        phpAlert("Chỉnh sửa thành công");
        // direct_to(base_url("?mod=product&action=update&id={$data['product']['product_id']}&type=1"));
        // ob_get_flush();
    }
}
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Chỉnh sửa sản phẩm</h3>
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
                        <input type="text" name="screen" id="screen" <?php set_value("screen")?> placeholder="<?php echo $data['product']['screen'] ?>">
                        <label for="battery_capacity">Dung lượng pin</label>
                        <input type="text" name="battery_capacity" id="battery_capacity" <?php set_value("battery_capacity")?> placeholder="<?php echo $data['product']['battery_capacity'] ?>">
                        <label for="rear_camera">Camera sau</label>
                        <input type="text" name="rear_camera" id="rear_camera" <?php set_value("rear_camera")?> placeholder="<?php echo $data['product']['rear_camera'] ?>">
                        <label for="front_camera">Camera trước</label>
                        <input type="text" name="front_camera" id="front_camera" <?php set_value("front_camera")?> placeholder="<?php echo $data['product']['front_camera'] ?>">
                        <label for="damthoai">Đàm thoại</label>
                        <input type="text" name="damthoai" id="damthoai" <?php set_value("damthoai")?> placeholder="<?php echo $data['product']['damthoai'] ?>">
                        <label for="RAM">RAM</label>
                        <input type="text" name="ram" id="RAM" <?php set_value("ram")?> placeholder="<?php echo $data['product']['ram'] ?>">
                        <label for="ROM">ROM</label>
                        <input type="text" name="rom" id="ROM" <?php set_value("rom")?> placeholder="<?php echo $data['product']['rom'] ?>">
                        <label for="hdh">Hệ điều hành</label>
                        <input type="text" name="hdh" id="hdh" <?php set_value("hdh")?> placeholder="<?php echo $data['product']['hdh'] ?>">
                        <label for="cpu">CPU</label>
                        <input type="text" name="cpu" id="cpu" <?php set_value("cpu")?> placeholder="<?php echo $data['product']['cpu'] ?>"> 
                        <label for="weight">Trọng lượng</label>
                        <input type="text" name="weight" id="weight" <?php echo set_value("weight")?> placeholder="<?php echo $data['product']['weight'] ?>">
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