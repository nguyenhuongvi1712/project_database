
<div id="sidebar" class="fl-left">
            <div id="main-menu-wp">
                <ul class="list-item">
                    <li <?php if(!$_GET) echo "class='active'"  ?>>
                        <a href="?" title="Trang chủ">Trang chủ</a>
                    </li>
                    <li <?php if(isset($_GET['mod'])&&$_GET['mod']=='page'&&isset($_GET['action'])&&$_GET['action']=='aboutUs') echo "class='active'" ?>>
                        <a href="?mod=page&action=aboutUs" title="Giới thiệu">Giới thiệu</a>
                    </li>
                    <?php
                    for($i=1;$i<=3;$i++){
                            ?>
                    <li <?php if(isset($_GET['mod'])&&$_GET['mod']=='product'&&isset($_GET['id'])&&$_GET['id']==$i) echo "class='active'" ?>>
                        <a href="?mod=product&id=<?php echo $i?>" title=""><?php echo get_list_categories($i) ?></a>
                    </li>
                    <?php
                        }
                    ?>
                   
                    <li <?php if(isset($_GET['mod'])&&$_GET['mod']=='page'&&isset($_GET['action'])&&$_GET['action']=='contact') echo "class='active'" ?>>
                        <a href="?mod=page&action=contact" title="Liên hệ">Liên hệ</a>
                    </li>
                </ul>
            </div>
        </div>