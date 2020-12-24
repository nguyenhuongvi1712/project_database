<?php 
get_header();

?>

<div id="main-content-wp" class="home-page">
    <div class="wp-inner clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <?php foreach($data['type'] as $value){
            ?>
            <div class="section list-cat">
                <div class="section-head">
                    <h3 class="section-title"> <?php echo get_list_categories($value) ?></h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                    <?php
                    $list_item = get_list_product_by_categories_id($value);
                    if (!empty($list_item)) {
                        foreach ($list_item as $item) {
                            ?>
                        <li>
                            <a href="?mod=product&action=detail&id=<?php echo $item['product_id']; ?>" title="" class="thumb">
                                <img src="<?php echo $item['thump_link'];?>" alt="">
                            </a>
                            <a href="?mod=product&action=detail&id=<?php echo $item['product_id']; ?>" title="" class="title"><?php echo $item['product_name']; ?></a>
                            <p class="price"><?php echo number_format($item['selling_price']) ;?></p>
                        </li>
                        <?php
                        }
                    }?>
                    </ul>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>

<?php 
get_footer();
?>