<?php ob_start(); 
get_header() ;

if(isset($_POST['sm_action'])){
    if($_POST['actions'] != 0)direct_to(base_url("?mod=home&action=detail&id={$_POST['actions']}")); ob_end_flush();
}
?>
<script type="text/javascript">
$(document).ready(function() {
    $('.delete').click(function() {  
        var id =  $(this).attr('val');
        data = { id: id};
        $.ajax({
            url: '?mod=product&action=moveToTrash',
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
                    <h3 id="index" class="fl-left">Danh sách sản phẩm</h3>
                    <?php if(isset($_GET['id'])) { ?>
                    <a href="?mod=product&action=addnew&id=<?php echo $_GET['id'] ?>" title="" id="add-new" class="fl-left">Thêm mới</a> <?php }?>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?">Tất cả (<span class="count" id="count-product"><?php echo $data['count']?></span>)</a> |</li>
                            <li class="pending"><a href="?mod=product&action=trash">Thùng rác (<span class="count" id="count-trash"><?php echo $data['trashCount']?></span>)</a></li>
                        </ul>
                        <form method="GET" class="form-s fl-right autoSearch" id="productSearch">
                            <input type="text" name="s" id="s" placeholder="Tìm kiếm theo id hoặc tên">
                            <div id="searchList">
                            </div>
                        </form>
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
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                    <td><span class="thead-text"></span></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($data['list_product'] as $val){ ?>
                                <tr id="<?php echo $val['product_id'] ?>" >
                                    <td><span class="tbody-text"><?php echo $val['product_id']?></h3></span>
                                    <td>
                                        <div class="tbody-thumb">
                                            <img src="<?php echo $val['thump_link']?>" alt="">
                                        </div>
                                    </td>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="?mod=product&action=update&id=<?php echo $val['product_id']?>&type=<?php echo $val['type']?>" title=""><?php echo $val['product_name']?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="?mod=product&action=update&id=<?php echo $val['product_id']?>&type=<?php echo $val['type']?>"  title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a val="<?php echo $val['product_id']?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo convert_type_catalogy($val['type']) ?></span></td>
                                    <td><span class="tbody-text"><?php echo currency_format($val['selling_price'])?></span></td>
                                    <td><span class="tbody-text"><?php echo currency_format($val['purchased_price'])?></span></td>
                                    <td><span class="tbody-text"><?php echo $val['username'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $val['manipulation_date']?></span></td>
                                    <td><a class="btn btn-success btn-sm" href="?mod=offlinePayment&action=addCart&id=<?php echo $val['product_id']?>">Add</a></td>
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
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <ul id="list-paging" class="fl-right">
                        <li>
                            <a href="" title=""><</a>
                        </li>
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                        <li>
                            <a href="" title="">></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>