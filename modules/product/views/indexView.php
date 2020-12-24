<?php 
get_header();
?>

<div id="main-content-wp" class="category-product-page">
    <div class="wp-inner clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
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
            <div class="section" id="pagenavi-wp">
                <div class="section-detail">
                    <ul id="list-pagenavi">
                        <li class="active">
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                    </ul>
                    <a href="" title="" class="next-page"><i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
get_footer();
?>