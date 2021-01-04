<?php 
get_header();
if(isset($_POST['sm-sort'])){
    if($_POST['select']){
        direct_to(base_url("?sort={$_POST['select']}"));
    }
}

?>

<div id="main-content-wp" class="home-page">
    <div class="wp-inner clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <form method="POST" action="" class="mt-4">
                <select name="select" style="padding: 7px;">
                    <option value="0">Sắp xếp</option>
                    <option value="1">Mới nhất đển cũ nhất</option>
                    <option value="2">Cũ nhất đến mới nhất</option>
                    <option value="3">Giá cao xuống thấp</option>
                    <option value="4">Giá thấp lên cao</option>
                </select>
             <button type="submit" class="btn btn-danger" name="sm-sort">Lọc</button>
            </form>
            <?php if(!empty($data['bestSellers'])){ ?>
                <div class="section-head">
                    <h3 class="section-title"> Sản phẩm bán chạy</h3>
                </div>
            <div class="owl-carousel owl-theme mt-2 mb-2">
            <?php foreach($data['bestSellers'] as $val){ ?>
                <div class="item list-item clearfix">
                        <a href="?mod=product&action=detail&id=<?php echo $val['product_id']; ?>" title="" class="thumb-slider">
                            <img src="<?php echo $val['thump_link'];?>" alt="">
                        </a>
                        <a href="?mod=product&action=detail&id=<?php echo $val['product_id']; ?>" title="" class="title"><?php echo $val['product_name']; ?></a>
                        <p class="price"><?php echo number_format($val['selling_price']) ;?></p>
                </div>
            <?php }?>
            </div>
            <?php } ?>
            <?php foreach($data['type'] as $value){
            ?>
            <div class="section list-cat">
                <div class="section-head">
                    <h3 class="section-title"> <?php echo get_list_categories($value) ?></h3>
                </div>
                <div class="section-detail">
                <?php $list_item = isset($_GET['sort'])?get_list_product_by_categories_id($value,$data['sort']) : get_list_product_by_categories_id($value);
                    if (!empty($list_item)) {?>
                    <ul class="list-item clearfix">
                    <?php
                        foreach ($list_item as $item) {
                    ?>
                        <li>
                            <a href="?mod=product&action=detail&id=<?php echo $item['product_id']; ?>" title="" class="thumb">
                                <img src="<?php echo $item['thump_link'];?>" alt="">
                            </a>
                            <a href="?mod=product&action=detail&id=<?php echo $item['product_id']; ?>" title="" class="title"><?php echo $item['product_name']; ?></a>
                            <p class="price"><?php echo number_format($item['selling_price']) ;?></p>
                        </li>
                    <?php };?>
                    </ul>
                        <?php } ?>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>

<?php 
get_footer();
?>