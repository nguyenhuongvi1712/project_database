<?php get_header() ;
if(isset($_POST['checkout'])){
    $address= empty($_POST['address'])?$data['user_if']['address']:addcslashes($_POST['address'],"<>;'");
    $sql = "INSERT into invoices(user_id,total_price,address,note,date_create,payment_type,total_purchased_price) values({$data['user_if']['user_id']},{$data['price_total']},'{$address}','{$_POST['note']}',now(),'{$_POST['payment-method']}',{$data['sum']})";
    db_query($sql);
    direct_to(base_url("?mod=order"));
}
?>
<div id="main-content-wp" class="checkout-page ">
    <div class="wp-inner clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="checkout-wp">
                <div class="section-head">
                    <h3 class="section-title">Thanh toán</h3>
                </div>
                <div class="section-detail">
                    <div class="wrap clearfix">
                        <form method="POST">
                            <div id="custom-info-wp" class="fl-left">
                                <h3 class="title">Thông tin khách hàng</h3>
                                <div class="detail">
                                    <div class="field-wp">
                                        <label>Họ tên</label>
                                        <input type="text" name="fullname" id="fullname" placeholder="<?php echo $data['user_if']['username']?>" disabled="disabled">
                                    </div>
                                    <div class="field-wp">
                                        <label>Email</label>
                                        <input type="email" name="email" id="email" placeholder="<?php echo $data['user_if']['email']?>" disabled="disabled">
                                    </div>
                                    <div class="field-wp">
                                        <label>Địa chỉ nhận hàng</label>
                                        <input type="text" name="address" id="address" placeholder="<?php echo $data['user_if']['address']?>">
                                    </div>
                                    <div class="field-wp">
                                        <label>Số điện thoại</label>
                                        <input type="tel" name="tel" id="tel" placeholder="<?php echo $data['user_if']['tel_number']?>" disabled="disabled" >
                                    </div>
                                    <div class="field-full-wp">
                                        <label>Ghi chú</label>
                                        <textarea name="note"></textarea>
                                    </div>

                                </div>
                            </div>
                            <div id="order-review-wp" class="fl-right">
                                <h3 class="title">Thông tin đơn hàng</h3>
                                <div class="detail">
                                    <table class="shop-table">
                                        <thead>
                                            <tr>
                                                <td>Sản phẩm(1)</td>
                                                <td>Tổng</td>
                                            </tr>
                                        </thead>
                                        <?php if(!empty($data['cart'])){ ?>
                                        <tbody>
                                            <?php foreach($data['cart'] as $val){?>
                                            <tr class="cart-item">
                                                <td class="product-name"><?php echo $val['product_name']?><strong class="product-quantity">x <?php echo $val['quantity']?></strong></td>
                                                <td class="product-total"><?php echo number_format($val['sub_total']); ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="order-total">
                                                <td>Tổng đơn hàng:</td>
                                                <td><strong class="total-price"><?php echo number_format($data['price_total'])?></strong></td>
                                            </tr>
                                        </tfoot>
                                        <?php } ?>
                                    </table>
                                    <div id="payment-checkout-wp">
                                        <ul id="payment_methods">
                                            <li>
                                                <input type="radio" checked="checked" id="direct-payment" name="payment-method" value="direct-payment">
                                                <label for="direct-payment">Thanh toán tại cửa hàng</label>
                                            </li>
                                            <li>
                                                <input type="radio" id="payment-home" name="payment-method" value="payment-home">
                                                <label for="payment-home">Thanh toán tại nhà</label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="place-order-wp clearfix">
                                        <button type="submit" name="checkout">Đặt hàng</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>