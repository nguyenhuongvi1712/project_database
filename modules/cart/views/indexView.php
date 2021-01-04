<?php
get_header();
?>
<script type="text/javascript">
$(document).ready(function() {
   
    $('.num-order').change(function() {  
        
        var id =  $(this).attr('num-order-id');
        var qty = $(this).val(); 
        var price = $(this).attr('price');
        data = { id: id, qty: qty,price: price};
        $.ajax({
            url: '?mod=cart&action=update',
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function(data) {
              $('#sub_total'+id).text(data['sub_total']);
              $('#total-price span').text(data['total_price']);
              $('#btn-cart span#num').text(data['num']);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            },
        })        
    });
})
</script>
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <h3 class="title">Giỏ hàng</h3>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <?php 
        if (!empty($data['cart'])) {
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
                            <td colspan="2">Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($data['cart'] as $val) {
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
                                <input num-order-id="<?php echo $val['product_id']; ?>" price="<?php echo $val['selling_price']; ?>" type="number" max="10" min="1" class="num-order" name="num-order" value="<?php echo $val['quantity']; ?>" class="num-order">
                            </td>
                            <td class="sub_total" id="sub_total<?php echo $val['product_id']; ?>"><?php echo number_format($val['sub_total']); ?></td>
                            <td>
                                <a href="?mod=cart&action=del&id=<?php echo $val['product_id']; ?>" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        <?php
                            } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Tổng giá: <span><?php echo number_format($data['price_total']); ?></span></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <div class="fl-right">
                                        <!-- <a href="" title="" id="update-cart">Cập nhật giỏ hàng</a> -->
                                        <a href="?mod=cart&action=checkout" title="" id="checkout-cart">Thanh toán</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <p class="title"> Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                <a href="?mod=cart&action=delall" title="" id="delete-cart">Xóa giỏ hàng</a><br/>
            </div>
        </div>
        <?php
        }
        else{
            echo '<p>Không có sản phẩm nào trong giỏ hàng!</p>';
        }
        ?>
         <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <a href="?" title="" id="buy-more">Mua tiếp</a><br/>
                <a href="?mod=order" title="" id="delete-cart">Đơn hàng</a>
            </div>
        </div>
    </div>
    
</div>

<?php 
get_footer();
?>