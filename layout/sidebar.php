
<div id="sidebar" class="fl-left">
            <div id="main-menu-wp">
                <ul class="list-item">
                    <li class="active">
                        <a href="?" title="Trang chủ">Trang chủ</a>
                    </li>
                    <li>
                        <a href="?modules=page&action=detail&id=1" title="Giới thiệu">Giới thiệu</a>
                    </li>
                    <?php
                    for($i=1;$i<=3;$i++){
                            ?>
                    <li>
                        <a href="?mod=product&id=<?php echo $i?>" title=""><?php echo get_list_categories($i) ?></a>
                    </li>
                    <?php
                        }
                    ?>
                   
                    <li>
                        <a href="?modules=page&action=detail&id=2" title="Liên hệ">Liên hệ</a>
                    </li>
                </ul>
            </div>
        </div>