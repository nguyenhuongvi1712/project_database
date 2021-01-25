<?php ob_start();
get_header();
if(isset($_POST['sm'])){
    if(empty($_POST['userId'])) $data['error']['userId'] = "Không được để trống Id ";
    if(empty($_POST['username'])) $data['error']['username'] = "Không được để trống tên khách hàng";
    if(!empty($_POST['email'])&&!is_email($_POST['email'])) $data['error']['email'] = "Email sai định dạng";
    if(!empty($_POST['tel_number'])&&!is_tel($_POST['tel_number'])) $data['error']['tel_number'] = "Số điện thoại sai định dạng";
    if(!$data['error']){
        if(!getInforAccount($_POST['userId'])){
            $sqlProperties = "user_id,username,gender,type";
            $sqlValues = "{$_POST['userId']},'{$_POST['username']}','{$_POST['gender']}',2";
            if (!empty($_POST['email'])) {
                $sqlProperties=$sqlProperties.",email";
                $sqlValues = $sqlValues.",'{$_POST['email']}'";
            }
            if (!empty($_POST['tel_number'])) {
                $sqlProperties=$sqlProperties.",tel_number";
                $sqlValues = $sqlValues.",'{$_POST['tel_number']}'";
            }
            db_query("INSERT INTO users({$sqlProperties}) VALUES({$sqlValues})");
            createInvoice($_POST['userId']);
            direct_to(base_url("?mod=invoice"));
            ob_end_flush();
        }
        else{
            createInvoice($_POST['userId']);
            direct_to(base_url("?mod=invoice"));
           ob_end_flush();
        }
    }
}
 ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix ">
                    <h3 id="index" class="fl-left">Thanh toán</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="table-responsive ml-3">
                        <div class="clearfix ">
                             <h3 id="index" >Nhập thông tin khách hàng</h3>
                        </div>
                        <form action="" method="post" id="infoCustomer">
                            <div class="input-group input-group-sm mb-3 col-md-6">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" id="inputGroup-sizing-sm" for="userId">ID khách hàng</label>
                                </div>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="userId" name="userId">
                                <?php form_error('userId'); ?>
                            </div>
                            <div class="input-group input-group-sm mb-3 col-md-6">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" id="inputGroup-sizing-sm" for="username">Tên khách hàng</label>
                                </div>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="username" name="username">
                            </div>
                            <?php form_error('username'); ?>
                            <div class="input-group input-group-sm mb-3 col-md-6">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" id="inputGroup-sizing-sm" for="tel_number">Số điện thoại</label>
                                </div>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="tel_number" name="tel_number">
                            </div>
                            <?php form_error('tel_number'); ?>
                            <div class="input-group input-group-sm mb-3 col-md-6">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" id="inputGroup-sizing-sm" for="email">Email</label>
                                </div>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="email" name="email">
                            </div>
                            <?php form_error('email'); ?>
                            <div class="input-group input-group-sm mb-3 col-md-6">
                                <div class="input-group-prepend mr-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Giới tính</span>
                                </div>
                                <div class="input-group-prepend">
                                    <label class="input-group-text" id="inputGroup-sizing-sm" for="male">Nam</label>
                                </div>
                                <input type="radio" class="form-control col-md-1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="male" name="gender" value="Male" checked="checked">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" id="inputGroup-sizing-sm" for="female">Nữ</label>
                                </div>
                                <input type="radio" class="form-control col-md-1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="female" name="gender" value="Female">
                            </div>
                            
                            <input type="submit" value="Submit" class="btn btn-outline-success btn-sm mt-3" name="sm">
                         </form>
                    </div>
                </div>
                <div class="section ml-3">
                    <div class="section-head">
                        <h3 class="section-title" id="index">Sản phẩm đơn hàng</h3>
                    </div>
                    <div class="table-responsive">
                    <?php if(!empty($data['listCart'])){ ?>
                        <table class="table info-exhibition" id="tabletCart">
                            <thead>
                                <tr>
                                    <td class="thead-text">STT</td>
                                    <td class="thead-text">Ảnh sản phẩm</td>
                                    <td class="thead-text">Tên sản phẩm</td>
                                    <td class="thead-text">Đơn giá</td>
                                    <td class="thead-text">Số lượng</td>
                                    <td class="thead-text">Thành tiền</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($data['listCart'] as $val){ 
                                $productCard = getProductById($val['id']);
                                ?>
                                <tr>
                                    <td class="thead-text"><?php echo $i++ ?></td>
                                    <td class="thead-text">
                                        <div class="thumb">
                                            <img src="<?php echo $productCard['thump_link']?>" alt="">
                                        </div>
                                    </td>
                                    <td class="thead-text"><?php echo $productCard['product_name']?></td>
                                    <td class="thead-text"><?php echo currency_format($productCard['selling_price']," VND")?></td>
                                    <td class="thead-text">
                                        <input num-order-id="<?php echo $val['id']; ?>" price="<?php echo $productCard['selling_price']; ?>" type="number" max="10" min="1" class="num-order" name="num-order" value="<?php echo $val['qty']; ?>" class="num-order">
                                    </td>
                                    <td class="thead-text" id="sub_total<?php echo $val['id']; ?>"><?php echo currency_format($val['qty']*$productCard['selling_price']," VND")?></td>
                                    <td>
                                        <a href="?mod=offlinePayment&action=delCart&id=<?php echo $val['id']; ?>" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <a href="?mod=offlinePayment&action=delAllCart" class="btn btn-outline-danger btn-sm mt-3">Xóa toàn bộ</a>
                    <?php } ?>
                    </div>
                </div>
                <?php if(!empty($data['listCart'])){?>
                <div class="section ml-3" id="infoCart">
                    <div class="section-head">
                        <h3 class="section-title" id="index">Giá trị đơn hàng</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            <li>
                                <span class="font-weight-bold">Tổng số lượng : </span>
                                <span class="total-fee" id="num"><?php echo getInfoCart()['num'] ?></span>
                            </li>
                            <li>
                                <span class="font-weight-bold">Tổng thành tiền</span>
                                <span style="color: red;" id="total-price"><?php echo currency_format(getInfoCart()['total']," VNĐ") ?></span>
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