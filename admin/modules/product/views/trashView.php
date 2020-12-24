<?php ob_start(); 
get_header() ;

if(isset($_POST['sm_action'])){
    if($_POST['actions'] != 0)direct_to(base_url("?mod=product&action=trashDetail&id={$_POST['actions']}")); ob_end_flush();
}
?>
<script type="text/javascript">
$(document).ready(function() {
    $('#testbutton').click(function(){
        $('#dialog1').show();
        // alert('ok');
        // $('#dialog1').modal('show');
    })
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
                        <form method="GET" class="form-s fl-right">
                            <input type="tealert(id);xt" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
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
                                            <div class="modal fade" id="dialog1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <!-- <h5 class="modal-title"></h5> -->
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                        </div>

                                                        <div class="modal-body">
                                                           Bạn có chắc chắn xóa sản phẩm này ?
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                            <a type="button" class="btn btn-success" href="?mod=product&action=del&id=<?php echo $val['product_id']?>">Xóa</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <li><a title="Hồi phục" class="edit" val="<?php echo $val['product_id']?>"><i class="fas fa-trash-restore" aria-hidden="true"></i></a></li>
                                            <li><a  data-toggle="modal" data-target="#dialog1" title="Xóa" class="delete" ><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo convert_type_catalogy($val['type']) ?></span></td>
                                    <td><span class="tbody-text"><?php echo currency_format($val['selling_price'])?></span></td>
                                    <td><span class="tbody-text"><?php echo currency_format($val['purchased_price'])?></span></td>
                                    <td><span class="tbody-text">Admin</span></td>
                                    <td><span class="tbody-text">12-07-2016</span></td>
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
<!-- <script  src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script  src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script> -->
<?php get_footer() ?>