<?php 
get_header();
?>

<div id="main-content-wp" class="category-product-page">
    <div class="wp-inner clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
        <div id = "input-option">
            <div id="option" class="d-inline mt-3">
                <button class="btn btn-outline-danger btn-sm mr-3">Bộ lọc</button>
                <?php if(isset($data['spanFilterBox'])) echo $data['spanFilterBox'] ?>
            </div>
            <?php if($_GET['id'] == 1) get_template_part("smartphone"); 
            else if($_GET['id'] == 2) get_template_part("laptop"); 
            else if($_GET['id'] == 3) get_template_part("tablet"); 
            ?>
        </div>
            <form method="POST" action="" class="mt-4">
                <select name="input" style="padding: 7px;">
                    <option value="0">Sắp xếp</option>
                    <option value="1">Mới nhất đển cũ nhất</option>
                    <option value="2">Cũ nhất đến mới nhất</option>
                    <option value="3">Giá cao xuống thấp</option>
                    <option value="4">Giá thấp lên cao</option>
                </select>
                <button type="submit" class="btn btn-danger" name="sm-sort">Lọc</button>
            </form>
            <div class="section list-cat">
                <div class="section-head">
                    <h3 class="section-title"><?php echo $data['category_name'];?></h3>
                    <p class="section-desc">Có <?php echo count($data['list_product']);?> sản phẩm trong mục này</p>
                </div>
                <?php if(!empty($data['list_product'])){ ?>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php foreach($data['list_product'] as $val){ ?>
                        <li>
                            <a href="?mod=product&action=detail&id=<?php echo $val['product_id']; ?>" title="" class="thumb">
                                <img src="<?php echo $val['thump_link'];?>" alt="">
                            </a>
                            <a href="?mod=product&action=detail&id=<?php echo $val['product_id']; ?>" title="" class="title"><?php echo $val['product_name']; ?></a>
                            <p class="price"><?php echo number_format($val['selling_price']) ;?></p>
                        </li>
                        <?php }?>
                    </ul>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php 
get_footer();
?>