<?php ob_start();
get_header();
if(isset($_POST['sm_action'])){
    direct_to(base_url("?mod=statistic&action=revenue&from={$_POST['from']}&to={$_POST['to']}"));
    ob_end_flush();
}

?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thống kê doanh số</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="actions">
                        <form method="POST" class="form-actions">
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
                                    <td><span class="thead-text">Doanh thu</span></td>
                                    <td><span class="thead-text">Giá vốn hàng bán</span></td>
                                    <td><span class="thead-text">Lợi nhuận gộp</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="tbody-text"><?php echo currency_format($data['list']['revenue']," VND")?></td>
                                    <td><span class="tbody-text"><?php echo currency_format($data['list']['cost_of_goods_sold']," VND")?></span></td>
                                    <td><span class="tbody-text"><?php echo currency_format($data['list']['gross_revenue']," VND")?></span></td>
                                    <td><span class="tbody-text"><?php echo $data['date']?></span></td>
                                </tr>
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