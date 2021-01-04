<?php ob_start();
get_header(); 
if(isset($_POST['sm_status']) && $data['invoice']['status']!=2){
    if($data['invoice']['status']==0 && $_POST['status']==1){
        db_query("UPDATE invoices set status = 1 where invoice_id = {$data['invoice']['invoice_id']}");
        direct_to(base_url("?mod=invoice&action=detail&id={$data['invoice']['invoice_id']}"));
        ob_end_flush();
    }
    if($data['invoice']['status']==1 && $_POST['status']==2){
        db_query("UPDATE invoices set status = 2,delivered_time = now() where invoice_id = {$data['invoice']['invoice_id']}");
        direct_to(base_url("?mod=invoice&action=detail&id={$data['invoice']['invoice_id']}"));
        ob_end_flush();
    }
}
?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="detail-exhibition fl-right">
            <div class="section" id="info">
                <div class="section-head">
                    <h3 class="section-title">Thông tin đơn hàng</h3>
                </div>
                <?php if(!empty($data['invoice'])){?>
                <ul class="list-item">
                    <li>
                        <h5><i class="fas fa-file-alt"></i>  Mã đơn hàng</h5>
                        <span class="detail"><?php echo $data['invoice']['invoice_id']?></span>
                    </li>
                    <li>
                        <h5><i class="fas fa-map-marker-alt"></i>  Địa chỉ nhận hàng</h5>
                        <p class="detail"><?php echo $data['invoice']['address']?></p>
                    </li>
                    <li>
                        <h5><i class="fas fa-phone-square-alt"></i>  Số điện thoại</h5>
                        <span class="detail"><?php echo $data['invoice']['tel_number']?></span>
                    </li>
                    <li>
                        <h5><i class="fas fa-truck"></i>  Hình thức thanh toán</h5>
                        <span class="detail"><?php echo $data['invoice']['payment_type']?></span>
                    </li>
                    <li>
                        <h5><i class="fas fa-sticky-note"></i>  Note</h5>
                        <p class="detail"><?php echo $data['invoice']['note']?></p>
                    </li>
                    <form method="POST" action="">
                        <li>
                            <h5>Tình trạng đơn hàng</h5>
                            <select name="status">
                                <option <?php setSelectedInvoice($data['invoice']['status'],0)?> value='0' disabled="disabled">Chờ xác nhận</option>
                                <option <?php setSelectedInvoice($data['invoice']['status'],1); disableInvoice($data['invoice']['status'])?> value='1' >Đã xác nhận</option>
                                <option <?php setSelectedInvoice($data['invoice']['status'],2); disableInvoice($data['invoice']['status'])?> value='2'>Thành công</option>
                            </select>
                            <input type="submit" name="sm_status" value="Cập nhật đơn hàng">
                        </li>
                    </form>
                </ul>
                <?php }else echo "Không tồn tại đơn hàng";
                 ?>
            </div>
            <div class="section">
                <div class="section-head">
                    <h5 class="section-title">Sản phẩm đơn hàng</h5>
                </div>
                <div class="table-responsive">
                <?php if(!empty($data['detailInvoice'])){ ?>
                    <table class="table info-exhibition">
                        <thead>
                            <tr>
                                <td class="thead-text">STT</td>
                                <td class="thead-text">Ảnh sản phẩm</td>
                                <td class="thead-text">Tên sản phẩm</td>
                                <td class="thead-text">Giá nhập</td>
                                <td class="thead-text">Đơn giá</td>
                                <td class="thead-text">Số lượng</td>
                                <td class="thead-text">Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; foreach($data['detailInvoice'] as $val){ ?>
                            <tr>
                                <td class="thead-text"><?php echo $i++ ?></td>
                                <td class="thead-text">
                                    <div class="thumb">
                                        <img src="<?php echo $val['thump_link']?>" alt="">
                                    </div>
                                </td>
                                <td class="thead-text"><?php echo $val['product_name']?></td>
                                <td class="thead-text"><?php echo currency_format($val['purchased_price']," VND")?></td>
                                <td class="thead-text"><?php echo currency_format($val['selling_price']," VND")?></td>
                                <td class="thead-text"><?php echo $val['quantity']?></td>
                                <td class="thead-text"><?php echo currency_format($val['quantity']*$val['selling_price']," VND")?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php } ?>
                </div>
            </div>
            <?php if(!empty($data['invoice'])){?>
            <div class="section">
                <h5 class="section-title">Giá trị đơn hàng</h5>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <span class="total-fee">Tổng số lượng</span>
                            <span class="total">Tổng thành tiền</span>
                        </li>
                        <li>
                            <span class="total-fee"><?php echo length_of_array($data['detailInvoice']) ?></span>
                            <span class="total"><?php echo currency_format($data['invoice']['total_price']," VND") ?></span>
                        </li>
                    </ul>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
</div>
<?php get_footer() ?>