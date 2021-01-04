<!DOCTYPE html>
<html>
    <head>
        <title>Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <!-- <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/> -->
        <link href="public/style.css" rel="stylesheet" type="text/css"/>
        <link href="public/responsive.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="public/owlcarousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="public/owlcarousel/assets/owl.theme.default.min.css">
        <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="public/owlcarousel/owl.carousel.min.js"></script>
        <script src="public/js/main.js" type="text/javascript"></script>
        
        <script src="https://kit.fontawesome.com/ff478191b6.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp" class="clearfix">
                    <div class="wp-inner">
                        <a href="?" title="" id="logo" class="fl-left">STORE</a>
                        <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                        <div id="search-wp" class="fl-left">
                                <form method="POST" action="">
                                    <input type="text" name="s" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                    <div id="searchList"></div>
                                </form>
                        </div>
                        <div id="cart-wp" class="fl-right">
                            <a href="?mod=cart" title="" id="btn-cart">
                                <i class="fas fa-shopping-cart" id ="icon"></i>
                                <span id="num">
                                    <?php
                                    if(!empty(get_infor_carts())) echo get_infor_carts(); ?>
                                </span>
                            </a>
                        </div>   
                    </div>
                </div>
                <div class="container text-right mt-3">
                 <span >Xin chao </span> <?php get_current_username(); ?>
                 <?php
                    if(get_session('user')==false) echo "<a href=\"?mod=user\">Đăng nhập</a>";
                    else echo "<a href=\"?mod=user&action=logout\" class=\"mr-2\">Đăng xuất</a>";
                    if(get_session('user')==true and get_session('user')['type']==1) 
                        echo "<a href=\"http://localhost/php/project/is_mart/admin/\">Admin</a>";
                ?>
                </div>