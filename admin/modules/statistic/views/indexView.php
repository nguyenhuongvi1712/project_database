<?php ob_start();
get_header();
if(isset($_POST['sm_action'])){
    direct_to(base_url("?mod=statistic&option={$_POST['actions']}&from={$_POST['from']}&to={$_POST['to']}"));
    ob_end_flush();
}
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
                    <div class="actions">
                        <form method="POST" class="form-actions">
                            <select name="actions">
                                <option value="0">Bộ lọc</option>
                                <option value="1">Số lượng bán ra(desc)</option>
                                <option value="2">Số lượng bán ra(asc)</option>
                            </select>
                            <label for="from" class="ml-2">From : </label>
                            <input type="date" name="from" id="from">
                            <label for="to" class="ml-2">To : </label>
                            <input type="date" name="to" id="to">
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form>
                    </div>
                    <div class="table-responsive">
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