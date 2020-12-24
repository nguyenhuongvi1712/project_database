<?php get_header() ?>
<div id="main-content-wp" class="cart-page">
<div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <h3 class="title">Đơn hàng</h3>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
            <?php if(!empty($data['list_order'])){ ?>
                <table class="table">
                    <thead>
                        <tr>
                            <td>Mã đơn hàng</td>
                            <td>Thành tiền</td>
                            <td>Ngày tạo</td>
                            <td>Hình thức thanh toán</td>
                            <td>Trạng thái</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data['list_order'] as $val){ ?>
                        <tr>
                            <td>
                               <a href="?mod=order&action=detail&id=<?php echo $val['invoice_id']; ?>"><?php echo $val['invoice_id']?></a>
                            </td>
                            <td><?php echo $val['total_price']?></td>
                            <td><?php echo $val['date_create']?></td>
                            <td><?php echo $val['payment_type']?></td>
                            <td>
                            <?php
                            if($val['status'] == 0) echo "Chờ xác nhận";
                            else if($val['status'] == 1) echo "Đã xác nhận";
                            else if($val['status'] == 2) echo "Đã hoàn thành";
                            else echo "Không xác định";
                            ?>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <div class="fl-right">
                                        <p>Click vào mã đơn hàng để xem thông tin chi tiết</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            <?php }?>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>