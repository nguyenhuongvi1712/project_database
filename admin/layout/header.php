<!DOCTYPE html>
<html>
    <head>
        <title>Quản lý ISMART</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/style.css" rel="stylesheet" type="text/css"/>
        <link href="public/responsive.css" rel="stylesheet" type="text/css"/>
        <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script> -->
        <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script> -->
        <script src="public/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script src="public/js/main.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/ff478191b6.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div class="wp-inner clearfix">
                        <a href="?" title="" id="logo" class="fl-left">ADMIN</a>
                        <ul id="main-menu" class="fl-left">
                            <li>
                                <a href="?page=list_product" title="">Sản phẩm</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="#" title="">Thêm mới</a> 
                                        <ul class="sub-menu2">
                                            <li>
                                                <a href="?mod=product&action=addnew&id=1" title="">Điện thoại</a> 
                                            </li>
                                            <li>
                                                <a href="?mod=product&action=addnew&id=2" title="">Laptop</a> 
                                            </li>
                                            <li>
                                                <a href="?mod=product&action=addnew&id=3" title="">Máy tính bảng</a> 
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="?" title="">Danh sách sản phẩm</a> 
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" title="">Bán hàng  <?php if(getCountInvoice()) echo "<i class=\"fas fa-bell\"></i>"?> </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?mod=invoice" title="">Danh sách đơn hàng</a> 
                                    </li>
                                    <li>
                                        <a href="?mod=customer" title="">Danh sách khách hàng</a> 
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" title="">Thống kê</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?mod=statistic" title="">Sản phẩm</a> 
                                    </li>
                                    <li>
                                        <a href="?page=list_order" title="">Doanh số, doanh thu</a> 
                                        <ul class="sub-menu2">
                                            <li>
                                                <a href="?mod=statistic&action=turnOver" title="">Doanh số</a> 
                                            </li>
                                            <li>
                                                <a href="?mod=statistic&action=revenue" title="">Doanh thu</a> 
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="?mod=offlinePayment" title="">Thanh toán</a>
                                <!-- <ul class="sub-menu">
                                    <li>
                                        <a href="?mod=invoice" title=""></a> 
                                    </li>
                                    <li>
                                        <a href="?mod=customer" title="">Danh sách khách hàng</a> 
                                    </li>
                                </ul> -->
                            </li>
                           
                        </ul>
                        <div id="dropdown-user" class="dropdown dropdown-extended fl-right">
                            <button class="dropdown-toggle clearfix" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <div id="thumb-circle" class="fl-left">
                                    <img src="public/images/img-admin.png">
                                </div>
                                <h3 id="account" class="fl-right">Admin</h3>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="?mod=inforadmin" title="Thông tin cá nhân">Thông tin tài khoản</a></li>
                                <li><a href="?mod=inforadmin&action=logoutAdmin" title="Thoát">Thoát</a></li>
                            </ul>
                        </div>
                    </div>
                </div>