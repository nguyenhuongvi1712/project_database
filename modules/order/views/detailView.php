<?php
get_header();
?>

<div id="main-content-wp" class="cart-page">
<?php
if (!empty($data['order_if'])) {
    ?>
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <h3 class="title">Đơn hàng: <strong><?php echo 1?></strong> </h3>
            </div>
        </div>
    </div>
    <div class="wp-inner clearfix">
        <p><strong>Địa chỉ : </strong><?php echo $data['order_if']['address']?></p>
        <p><strong>Ghi chú : </strong><?php echo $data['order_if']['note']?></p>
        <p><strong>Ngày tạo : </strong><?php echo $data['order_if']['date_create']?></p>
        <p><strong>Hình thức thanh toán : </strong><?php echo $data['order_if']['payment_type']?></p>
        <p><strong>Trạng thái : </strong>
        <?php
                            if($data['order_if']['status'] == 0) echo "Chờ xác nhận";
                            else if($data['order_if']['status'] == 1) echo "Đã xác nhận";
                            else if($data['order_if']['status'] == 2) echo "Đã hoàn thành";
                            else echo "Không xác định";
                            ?>
        </p>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <?php
        if (!empty($data['list_detail_order'])) {
            ?>
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Mã sản phẩm</td>
                            <td>Ảnh sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá sản phẩm</td>
                            <td>Số lượng</td>
                            <td>Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($data['list_detail_order'] as $val) {
                                ?>
                        <tr>
                            <td><?php echo $val['product_id']; ?></td>
                            <td>
                                <a href="?mod=product&action=detail&id=<?php echo $val['product_id']; ?>" title="" class="thumb">
                                    <img src="<?php echo $val['thump_link']; ?>" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="?mod=product&action=detail&id=<?php echo $val['product_id']; ?>" title="" class="name-product"><?php echo $val['product_name']; ?></a>
                            </td>
                            <td class="price"><?php echo number_format($val['selling_price']); ?></td>
                            <td>
                                <?php  echo $val['quantity']?>
                            </td>
                            <td class="sub_total" id="sub_total<?php echo $val['product_id']; ?>"><?php echo number_format($val['quantity']*$val['selling_price']); ?></td>
                        </tr>
                        <?php
                            } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Tổng giá: <span><?php echo number_format($data['order_if']['total_price']); ?></span></p>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <?php } ?>
    </div>
                        <?php }?>
    <a class="wp-inner clearfix" href="?mod=order">Quay lại đơn hàng</a>
</div>
<?php
get_footer();
?>