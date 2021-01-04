<?php
ob_start();
get_header();
if(isset($_POST['sm_s'])){
    direct_to((base_url("?mod=statistic&action=search&id={$_POST['s']}")));
    ob_end_flush();
}
?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thống kê chi tiết theo sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix mb-4">
                        <form method="POST" action="" class="form-s fl-right">
                            <input type="text" name="s"  placeholder="Tìm kiếm theo mã sp">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="table-responsive">
                    <p>Có <?php echo length_of_array($data['list'])?> kết quả tìm kiếm</p>
                    <?php if(!empty($data['list'])){ ?>
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">Mã hóa đơn</span></td>
                                    <td><span class="thead-text">Mã sản phẩm</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Số lượng</span></td>
                                    <td><span class="thead-text">Giá nhập</span></td>
                                    <td><span class="thead-text">Giá bán</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($data['list'] as $val){ ?>
                                <tr>
                                    <td><span class="tbody-text"><?php echo $val['invoice_id']?></h3></span>
                                    <td><span class="tbody-text"><?php echo $val['product_id']?></h3></span>
                                    <td>
                                        <div class="tbody-thumb">
                                            <img src="<?php echo $val['thump_link']?>" alt="">
                                        </div>
                                    </td>
                                    <td class="clearfix"><a title=""><?php echo $val['product_name']?></a></td>
                                    <td><span class="tbody-text"><?php echo $val['quantity']?></td>
                                    <td><span class="tbody-text"><?php echo currency_format($val['purchased_price']," VND")?></span></td>
                                    <td><span class="tbody-text"><?php echo currency_format($val['selling_price']," VND")?></span></td>
                                    <td><span class="tbody-text"><?php echo $val['delivered_time']?></span></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>
<?php get_footer() ?>