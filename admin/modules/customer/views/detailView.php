<?php get_header() ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix ">
                    <h3 id="index" class="fl-left">Thông tin chi tiết khách hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <?php if($data['userInfo']){ ?>
                <div class="section-detail">
                    <ul id="list-item-user">
                        <li>
                            <strong>Mã khách hàng : </strong>
                            <span><?php echo $data['userInfo']['user_id'] ?></span>
                        </li>
                        <li>
                            <strong>Username : </strong>
                            <span><?php echo $data['userInfo']['username'] ?></span>
                        </li>
                        <li>
                            <strong>Số điện thoại : </strong>
                            <span><?php echo $data['userInfo']['tel_number'] ?></span>
                        </li>
                        <li>
                            <strong>Email : </strong>
                            <span><?php echo $data['userInfo']['email'] ?></span>
                        </li>
                        <li>
                            <strong>Địa chỉ : </strong>
                            <p class="detail"><?php echo $data['userInfo']['address'] ?></p>
                        </li>
                        <li>
                            <strong>Tổng chi tiêu : </strong>
                            <span style="color: red;"><?php if($data['totalPrice']) echo currency_format($data['totalPrice']," VNĐ"); else echo "0"; ?></span>
                        </li>
                    </ul>
                    <?php if($data['invoiceList']){ ?>
                    <div class="table-responsive">
                        <div class="clearfix text-center">
                             <h3 id="index" class="">Danh sách đơn hàng</h3>
                         </div>
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã đơn hàng</span></td>
                                    <td><span class="thead-text">Tổng giá</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Thời gian tạo</span></td>
                                    <td><span class="thead-text">Thời gian hoàn thành</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;
                                 foreach($data['invoiceList'] as $val){ ?>
                                <tr>
                                    <td><span class="tbody-text"><?php echo $i++ ?></h3></span>
                                    <td>
                                        <a href="?mod=invoice&action=detail&id=<?php echo $val['invoice_id']?>"><?php echo $val['invoice_id'] ?></a>
                                    </td>
                                    <td><span class="thead-text"><?php echo $val['total_price'] ?></span></td>
                                    <td><span class="thead-text"><?php
                                        if($val['status']==0) echo "Chờ xác nhận";
                                        else if($val['status']==1) echo "Đã xác nhận";
                                        else if($val['status']==2) echo "Đã hoàn thành";
                                    ?></span></td>
                                    <td><span class="thead-text"><?php echo $val['date_create']?></span></td>
                                    <td><span class="thead-text"><?php echo $val['delivered_time']?></span></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php }?>
                </div>
                <?php }
                else "Không tồn tại khách hàng !";
                ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>