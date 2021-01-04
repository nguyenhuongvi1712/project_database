<?php 
ob_start();
get_header();
if(isset($_POST['sm_s'])){
    direct_to(base_url("?mod=invoice&action=detail&id={$_POST['s']}"));
    ob_end_flush();
}
 ?>

</style>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách đơn hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?mod=invoice">Tất cả <span class="count">(<?php echo $data['count']['countAll']?>)</span></a> |</li>
                            <li class="publish"><a href="?mod=invoice&action=status&id=2">Đã hoàn thành <span class="count">(<?php echo $data['count']['count2'] ?>)</span></a> |</li>
                            <li class="pending"><a href="?mod=invoice&action=status&id=1">Chờ giao hàng<span class="count">(<?php echo $data['count']['count1']?>)</span> </a> |</li>
                            <li class="pending"><a href="?mod=invoice&action=status&id=0">Chờ xét duyệt<span class="count">(<?php echo $data['count']['count0']?>)</span></a></li>
                        </ul>
                        <form method="POST" class="form-s fl-right">
                            <input type="text" name="s" placeholder="Tìm kiếm đơn hàng theo id">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="table-responsive">
                    <?php if(!empty($data['invoice'])){ ?>
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã đơn hàng</span></td>
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">Tổng giá</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Thời gian tạo</span></td>
                                    <td><span class="thead-text">Thời gian hoàn thành</span></td>
                                    <td><span class="thead-text">Chi tiết</span></td>
                                    <td><span class="thead-text"></span></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($data['invoice'] as $val){ ?>
                                <tr>
                                    <td><span class="tbody-text"><?php echo $i++ ?></h3></span>
                                    <td><span class="tbody-text"><?php echo $val['invoice_id']?></h3></span>
                                    <td><a href="" title="" class="tbody-text"><?php echo $val['username']?></a></td>
                                    <td><span class="tbody-text"><?php echo currency_format($val['total_price'])?></span></td>
                                    <td><span class="tbody-text">
                                    <?php
                                        if($val['status']==0) echo "Chờ xác nhận";
                                        else if($val['status']==1) echo "Đã xác nhận";
                                        else if($val['status']==2) echo "Đã hoàn thành";
                                    ?></span></td>
                                    <td><span class="tbody-text"><?php echo $val['date_create']?></span></td>
                                    <td><span class="tbody-text"><?php echo $val['delivered_time']?></span></td>
                                    <td><a href="?mod=invoice&action=detail&id=<?php echo $val['invoice_id']?>" title="" class="tbody-text">Chi tiết</a></td>
                                    <td>
                                        <?php if($val['status']!=2){ ?>
                                        <ul class="list-operation">
                                            <li ><a href="?mod=invoice&action=del&id=<?php echo $val['invoice_id'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                        <?php }?>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    <?php }
                    else echo "Không có đơn hàng nào";
                    ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php get_footer(); ?>