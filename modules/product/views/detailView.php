<?php
get_header(); 


?>
<div id="main-content-wp" class="detail-product-page clearfix">
    <div class="wp-inner clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
        <?php if(!empty($data['product'])&&!empty($data['detail_product'])){ ?>
            <div class="section" id="info-product-wp">
                <div class="section-detail clearfix">
                    <div class="thumb fl-left">
                        <img src="<?php echo $data['product']['thump_link'];?>" alt="">
                    </div>
                    <div class="detail fl-right">
                        <h3 class="title"><?php echo $data['product']['product_name']; ?></h3>
                        <p class="price"><?php echo number_format($data['product']['selling_price']); ?></p>
                        <p class="product-code">Mã sản phẩm: <span><?php echo $data['product']['product_id'];?></span></p>
                        <div class="desc-short">
                            <h5>Mô tả sản phẩm:</h5>
                            <ul>
                            <?php 
                                foreach($data['detail_product'] as $key => $value){
                                    ?>
                                    <li><strong><?php echo $key.": "?></strong><?php echo $value?></li>
                            <?php }
                            ?>
                            </ul>
                        </div>
                        <div class="num-order-wp">
                            <a href="?mod=cart&action=add&id=<?php echo $data['product']['product_id'];?>" title="" class="add-to-cart">Thêm giỏ hàng</a>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="desc-wp">
                <div class="section-head">
                    <h3 class="section-title">Chi tiết sản phẩm</h3>
                </div>
                <div class="section-detail">
                    <?php echo $data['product']['description']?>
                </div>
            </div>
        </div>
        <?php }  else echo "Không tồn tại sản phẩm !"?>
    </div>
</div>
<?php get_footer(); ?>