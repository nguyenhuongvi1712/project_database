<?php ob_start(); 
get_header() ;

if(isset($_POST['sm_action'])){
    if($_POST['actions'] != 0)direct_to(base_url("?mod=product&action=trashDetail&id={$_POST['actions']}")); ob_end_flush();
}
?>
<script type="text/javascript">
$(document).ready(function() {
    $('.edit').click(function() {  
        var id =  $(this).attr('val');
        data = { id: id};
        $.ajax({
            url: '?mod=product&action=restore',
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function(data) {
              $('#'+id).addClass('d-none');
              $('#count-product').text(data['count']),
              $('#count-trash').text(data['trashCount'])
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            },
        })
          
    });
})
</script>
<div id="main-content-wp" class="list-product-page">

    <div class="wrap clearfix">
       <?php get_sidebar() ?> 
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thùng rác</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?">Tất cả (<span class="count" id="count-product"><?php echo $data['count']?></span>)</a> |</li>
                            <li class="pending"><a href="?mod=product&action=trash">Thùng rác (<span class="count" id="count-trash"alert(id);><?php echo $data['trashCount']?></span>)</a></li>
                        </ul>
                    </div>
                    <div class="actions">
                        <form method="POST" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Điện thoại</option>
                                <option value="2">Laptop</option>
                                <option value="3">Máy tính bảng</option>
                            </select>
                            <input type="submit" name="sm_action" value="Chọn">
                        </form>
                    </div>
                    <div class="table-responsive">
                    <?php if(!empty($data['list_product'])){?>
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">Mã sản phẩm</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
                                    <td><span class="thead-text">Giá bán</span></td>
                                    <td><span class="thead-text">Giá nhập</span></td>
                                    <td><span class="thead-text">Người xóa</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($data['list_product'] as $val){ ?>
                                <tr id="<?php echo $val['product_id']?>">
                                    <td><span class="tbody-text"><?php echo $val['product_id']?></h3></span>
                                    <td>
                                        <div class="tbody-thumb">
                                            <img src="<?php echo $val['thump_link']?>" alt="">
                                        </div>
                                    </td>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title=""><?php echo $val['product_name']?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a title="Hồi phục" class="edit" val="<?php echo $val['product_id']?>"><i class="fas fa-trash-restore" aria-hidden="true"></i></a></li>
                                            <li><a title="Xóa" class="delete" href="?mod=product&action=del&id=<?php echo $val['product_id']?>"><i class="fa fa-trash" aria-hidden="true" ></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo convert_type_catalogy($val['type']) ?></span></td>
                                    <td><span class="tbody-text"><?php echo currency_format($val['selling_price'])?></span></td>
                                    <td><span class="tbody-text"><?php echo currency_format($val['purchased_price'])?></span></td>
                                    <td><span class="tbody-text"><?php echo $val['username'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $val['manipulation_date']?></span></td>
                                </tr>
                            <?php }?>
                            </tbody>
                           
                        </table>
                    </div>
                    <?php } else
                    echo "Danh sách sản phẩm trống";
                     
                    ?>
                   
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>