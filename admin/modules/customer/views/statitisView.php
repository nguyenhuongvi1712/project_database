<?php 
get_header();
?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thống kê top 10 khách hàng thân thiết</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?mod=customer&action=user">Tất cả (user) <span class="count mr-4">(<?php echo $data['userCount'] ?>)</span></a></li>
                            <li class="all"><a href="?mod=customer">Đã có đơn hàng (customer) <span class="count">(<?php echo $data['customerCount'] ?>)</span></a></li>
                        </ul>
                        <form method="GET" class="form-s fl-right autoSearch" id="userSearch">
                            <input type="text" name="s" id="s" placeholder="Tìm kiếm theo id hoặc email,sdt">
                            <div id="searchList">
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <?php if(!empty($data['listCustomer'])){ ?>
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">ID</span></td>
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">Số điện thoại</span></td>
                                    <td><span class="thead-text">Email</span></td>
                                    <td><span class="thead-text">Địa chỉ</span></td>
                                    <td><span class="thead-text">Giới tính</span></td>
                                    <td><span class="thead-text">Tổng chi tiêu</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($data['listCustomer'] as $val){ ?>
                                <tr>
                                <td><span class="tbody-text"><a href="?mod=customer&action=detail&id=<?php echo $val['user_id']?>"><?php echo $val['user_id'] ?></a></span></td>
                                    <td><span class="tbody-text"><?php echo $val['username'] ?></span>
                                    <td><span class="tbody-text"><?php echo $val['tel_number'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $val['email'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $val['address'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $val['gender'] ?></span></td>
                                    <td><span class="tbody-text" style="color: red;"><?php echo currency_format($val['sum'],"đ") ?></span></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
get_footer();
?>