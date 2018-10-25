<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:75:"/home/wwwroot/default/hejiang/addons/hc_step/app/index/view/index/show.html";i:1540368882;s:71:"/home/wwwroot/default/hejiang/addons/hc_step/app/index/view/layout.html";i:1540368882;s:75:"/home/wwwroot/default/hejiang/addons/hc_step/app/index/view/layout/top.html";i:1540368882;s:78:"/home/wwwroot/default/hejiang/addons/hc_step/app/index/view/layout/header.html";i:1540368882;s:78:"/home/wwwroot/default/hejiang/addons/hc_step/app/index/view/layout/footer.html";i:1540368882;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Access-Control-Allow-Origin" content="https://demo.onebase.org" />
    <?php echo parse_string_val($seo_info, get_defined_vars()) ?>
    <link href="__STATIC__/module/common/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="__STATIC__/module/common/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="__STATIC__/module/index/css/docs.css" rel="stylesheet">
    <link href="__STATIC__/module/index/css/onebase.css" rel="stylesheet">
    
    <script type="text/javascript" src="__STATIC__/module/common/jquery/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.min.js"></script>
    <script type="text/javascript" src="__STATIC__/module/common/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="__STATIC__/module/index/js/common.js"></script>
     <!-- /.content-wrapper -->
 <link rel="stylesheet" href="/s8726/public/static/module/common/toastr/toastr.min.css">
<script src="__STATIC__/module/common/toastr/toastr.min.js"></script>
<script src="__STATIC__/module/admin/ext/btnloading/dist/spin.min.js"></script>
<script src="__STATIC__/module/admin/ext/btnloading/dist/ladda.min.js"></script>
<script src="__STATIC__/module/admin/ext/adminlte/plugins/iCheck/icheck.min.js"></script>
<script src="__STATIC__/module/admin/js/onebase.js"></script>
<link rel="stylesheet" href="__STATIC__/module/admin/css/ob_skin.css">
</head>

<!-- <form  method="post" class="form_single"><input type="hidden" name="id" />

<button  type="submit" class="btn ladda-button ajax-post" target-form="form_single">
</button> -->

<body>
<style type="text/css">

@media(max-width: 979px){
    .navbar-inverse .nav-collapse .nav > li > a, .navbar-inverse .nav-collapse .dropdown-menu a{ color: #fff; border-bottom: 1px dashed rgba(255,255,255,0.2); }
    
}

</style>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="<?php echo url('index/index'); ?>">共享传媒</a>
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="nav-collapse collapse">
                <ul class="nav">
                       <!--  <li>
                            <a href="<?php echo url('index/index'); ?>" >商城首页</a>
                        </li>

                       <li>
                            <a target="_blank" href="<?php echo url('user/car_list'); ?>">购物车</a>
                        </li>
                
                        <li>
                            <a  href="<?php echo url('user/inde'); ?>">我的主页</a>
                        </li>
                        <?php if(\think\Session::get('member_info.u_level') > 0): ?>
                        <li>
                            <a  href="<?php echo url('vip/vip'); ?>">超级会员</a>
                        </li>
                        <?php endif; if(\think\Session::get('agent') > 0): ?>
                        <li>
                            <a  href="<?php echo url('vip/vip'); ?>">超级会员</a>
                        </li>
                        <?php endif; ?> -->
                        <?php if(\think\Session::get('member_info.id') == '1'): ?>
                        <li>
                            <a href="<?php echo url('admin/index/index'); ?>">
                           后台管理 </a>
                        </li>
                      <?php endif; ?>
                       <!--  <li>
                            <a target="_blank" href="<?php echo url('api/index/index'); ?>">接口文档</a>
                        </li> -->
                        <!-- <li>
                            <a target="_blank" href="http://document.onebase.org">开发文档</a> -->
                            <!--<a target="_blank" href="https://www.kancloud.cn/onebase/ob/484179">开发文档</a>-->
                      <!--   </li> -->
                        
                        <!-- <li>
                            <a target="_blank" href="https://gitee.com/Bigotry/OneBase">源码下载</a>
                        </li> -->
                </ul>
            </div>
        </div>
    </div>
</div>
<layout name="public/layout" />

<div class="container" style="width: 100%">
    <!-- <div class="row" style="background:#fff;margin-top:15px;">
        <div class="col-lg-12 tab_title">
            <h1>商品详情 &nbsp;&nbsp;[<a style="color: #DBEF3C;" href="<?php echo url('Shop/index'); ?>">返回商城首页</a>]</h1>
        </div>
        <div class="col-lg-12 writting">
            <div><h1><?php echo $goods['name']; ?></h1></div>
             <img  src="<?php echo get_picture_url($info['cover_id']); ?>" class="shopimg"/>
            <div class="info price">￥<?php echo $info['price']; ?><b>库存数量：<?php echo $info['num']; ?>  <ob_link><a href="<?php echo url('car_add', array('id' => $info['id'],'num' =>1)); ?>"
             target="_blank"
                class="btn "></i>加入购物车</a></ob_link></b>
           <input id='num' name='num' value="1">
            </div>
            <div class="info des"><b>商品详情：</b><?php echo htmlspecialchars_decode($info['content']); ?></div>
        </div>
    </div>
 -->




    <head>
        <meta charset="utf-8">
        <title><?php echo $goods['name']; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="__STATIC__/css/mui.min.css"/>
        <link rel="stylesheet" type="text/css" href="__STATIC__/css/own.css"/>
        <link rel="stylesheet" type="text/css" href="__STATIC__/css/iconfont.css"/>
        <link rel="stylesheet" type="text/css" href="__STATIC__/css/goods_detail.css"/>
        <link rel="stylesheet" type="text/css" href="__STATIC__/css/car.css"/>
 <style>
.table {
    width: 100%;
}
h1{ text-align: center; border-bottom: 1px solid #ddd;}
.shopimg{border:1px solid #ccc;margin-top:10px;  width: 500px; max-height: 500px; display: block; margin:15px auto;}
.info{ width: 500px; margin:5px auto; }
.info.price{ color: red; font-size: 18px; border-bottom: 1px solid #ddd; padding-bottom: 10px;}
.info.price b{ float: right; font-weight: normal; font-size: 16px; }
.info.des b{ display: block; margin-bottom:10px; }


</style>
<style>

            .but_add{
                color: #fff;
                line-height: 50px;
                background-color: #F1302F;
                cursor: pointer;
            }
            .num-content {
                margin-top: 10px;
                font-size: 0.8em;
                color: #999;
            }

            .num-content .mui-numbox {
                width: 100px;
                border-radius: 0;
                height: 30px;
                padding: 0 30px;
            }

            .num-content .mui-numbox [class*=numbox-btn] {
                border-radius: 0;
                width: 30px;
            }

            .num-content .mui-numbox .mui-numbox-input {
                color: #333;
            }
            .buy-all {
                font-size: 13px;
                float: left;
                padding-top:18px;
            }
            .buy-all label{
                float: left;
            }
            .main{ margin-top:0; }
            @media(max-width: 767px){
                body > .navbar{ margin-bottom: 0 }
            }
            .gwcbtn{ background-color: transparent; background-image: none; color: #fff; border: none; box-shadow: none; height: 50px; width: 100%;}
            .btn.active, .btn:activ{ background-color: transparent; }

        </style>
        <style type="text/css">

@media (max-width: 979px) and (min-width: 768px){
    .row{  width: 98%; margin: 0 auto; }
}
@media (max-width: 979px){
  .navbar-fixed-top{ margin-bottom:0; }
}

h3{ font-size: 20px; }

.row{  width: 98%; margin: 0 auto; }
header{ position: fixed; }

.own-main-background-color {
    background-color: #FBFBFB;
    /* box-shadow: 0 0 0 0 #1F1F1F; */
    /* border-bottom: 1px solid #EEEEEE; */
}
.mui-bar-nav {
    top: 0px;
    -webkit-box-shadow: 0 1px 6px #ccc;
    box-shadow: 0 1px 6px #ccc;
}
.mui-bar {
    border-top: 0px solid #eee;
    position: fixed;
    z-index: 10;
    right: 0;
    left: 0;
    height: 44px;
    
    border-bottom: 0;
    background-color: #fff;
    -webkit-box-shadow: 0 0 1px rgba(0, 0, 0, .85);
    box-shadow: 0 0 1px rgba(0, 0, 0, .85);
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
}
.mui-bar .mui-icon:active {
    opacity: .3;
}

.mui-bar-nav.mui-bar .mui-icon {
    margin-right: -10px;
    margin-left: -10px;
    padding-right: 10px;
    padding-left: 10px;
    line-height: 50px;
}
.mui-bar .mui-icon {
    font-size: 24px;
    position: relative;
    z-index: 20;
    padding-top: 10px;
    padding-bottom: 10px;
    
    text-decoration: none;

}

.mui-bar .mui-title {
    right: 40px;
    left: 40px;
    display: inline-block;
    overflow: hidden;
    width: auto;
    margin: 0;
    text-overflow: ellipsis;
    line-height: 50px;
}

.mui-title {
    font-size: 17px;
    font-weight: 500;
    line-height: 44px;
    position: absolute;
    display: block;
    width: 100%;
    margin: 0 -10px;
    padding: 0;
    text-align: center;
    white-space: nowrap;
    /*color: #000;*/
     color: white;
}
.mui-bar-tab{ display: none }

.mui-bar .mui-icon.shouye,.mui-bar .mui-icon.gouwuche{ float: left;  width: 50%; font-size: 14px;}
.shouye:before,.gouwuche:before{ display: block; font-size: 22px}


</style>

        <script src="__STATIC__/js/mui.js"></script>
        <script src="__STATIC__/js/jquery.min.js"></script>
        <script src="//cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>  
    </head>
    <body>
    <header class="mui-bar mui-bar-nav own-main-background-color" style="height: 49px;background-color: #1D82D2;">
     <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="line-height: 30px; color: white; text-decoration: none;"></a>
      <h1 class="mui-title">商品信息</h1>
    </header>
        <div class="main" style="margin-top:80px;">
            <form id="tf" method="post" action="<?php echo url('index/user/car_list'); ?>" >
            <!-- <?php if(empty($data['photo_path_1']) || (($data['photo_path_1'] instanceof \think\Collection || $data['photo_path_1'] instanceof \think\Paginator ) && $data['photo_path_1']->isEmpty())): ?>
                <img src="/public/images/nopic.jpg" style="width:100%;" alt="">
            <?php else: ?>
                <img src="<?php echo $data['photo_path_1']; ?>" style="width:100%;" alt="">
            <?php endif; ?> -->
             <img style="width: 100%" src="<?php echo get_picture_url($info['cover_id']); ?>" class="shopimg"/>
            <div style="padding:4px 8px">
           <input  name="id"  type="hidden"  value="<?php echo $info['id']; ?>" />
          <!--   <input  name="price" value="<?php echo $info['price']; ?>" type="hidden" >
            <input  name="cover_id" value="<?php echo $info['cover_id']; ?>" type="hidden" > -->
                <div class="goods_title" name="name"><?php echo $info['name']; ?></div>
                <!-- <div class="goods_stand">规格:<?php echo $data['standard']; ?></div> -->
            </div>
            <div class="goods_info">
                <span>:<span style="color:red;">￥<b><?php echo $info['price']; ?></b></span></span>
            </div>
            
                <div class="good_num num-content" id="num-content" >
                    <span>数量：</span>
                    <div class="mui-numbox" data-numbox-step='1' data-numbox-min='1' data-numbox-max='<?php echo $info['num']; ?>'>
                        <button class="mui-btn mui-numbox-btn-minus" type="button">-</button>
                        <input class="mui-numbox-input"  name="num"  type="number" id="buy-num" style="vertical-align: top;" />
                        <button class="mui-btn mui-numbox-btn-plus" type="button">+</button>
                    </div>
                    &nbsp;剩余：<span id="goods-num"><?php echo $info['num']; ?></span>件
                </div>
                <input class="mui-numbox-input" type="hidden" id="buy-id" value="<?php echo $data['id']; ?>" />
            <div style="width:100%;height:10px;background:#F0F0F0; margin-top: 10px;">
            </div>
            <div class="comment-detail">
          <div>
       <span id="ds_detail" class="active">商品详情</span></div>
            </div>
            <div style="clear:both"></div>
            <div class="detail-wap">
              <?php echo htmlspecialchars_decode($info['content']); ?>
            </div>
 
        </div>


        <?php if(!(empty($info['num']) || (($info['num'] instanceof \think\Collection || $info['num'] instanceof \think\Paginator ) && $info['num']->isEmpty()))): ?>
        <nav class="mui-bar" style="width:100%;padding: 0;height:50px;box-shadow: none;text-align:center;bottom:0px;">
            <div class="mui-row car1">
                <div class="mui-media mui-col-xs-4">
                  <a href="<?php echo url('index/index/index'); ?>" class="mui-icon iconfont icon-home shouye">首页</a>
                  <a href="<?php echo url('index/user/car_list'); ?>" class="mui-icon iconfont icon-cart gouwuche">购物车</a>
                </div>
                <div class="mui-media mui-col-xs-4">
                  
                    <div class="but_add" id="buy-now" style="background-color: #FFB144;"> 
                    <button   type="submit"  class="gwcbtn">加入购物车</button></div>
                </div>

                <div class="mui-media mui-col-xs-4">
                  
                    <div class="but_add" id="buy-now"> 
                    <button   type="submit"  class="gwcbtn">购买套餐</button></div>
                </div>
            </div>
        </nav>

        <?php endif; ?>
</form> 
 
    
    </body>
</div>
<style type="text/css">
[class^="icon-"], [class*=" icon-"]{background-image: none;}
a:link{ text-decoration: none; }
@media(max-width: 768px){
	.navbar-fixed-top{ display: none }
	.mui-bar-nav~.mui-content{ padding-top:50px; }
	
}

</style>

<nav class="mui-bar mui-bar-tab">
		<a class="mui-tab-item2" href="<?php echo url('index/user/inde2'); ?>" id="inde2" >
			<span class="mui-icon iconfont icon-home"></span>
			<span class="mui-tab-label">首页</span>
		</a>
		<!-- <a class="mui-tab-item2" href="<?php echo url('index/user/car_list'); ?>" id="car_list" >
			<span class="mui-icon iconfont icon-cart"></span>
			<span class="mui-tab-label">购物车</span>
		</a> -->


	
		<a class="mui-tab-item2" href="<?php echo url('index/user/inde'); ?>" id="inde" >
			<span class="mui-icon iconfont icon-xinyuandan"></span>
			<span class="mui-tab-label">任务专区</span>  
		</a>

		<a class="mui-tab-item2" href="<?php echo url('index/vip/vip'); ?>" id="vip">
			<span class="mui-icon iconfont icon-wode"></span>
			<span class="mui-tab-label">个人中心</span>
		</a>
	</nav>



 <script type="text/javascript">

var url = window.location.href;
var map = url.split("/");
var str = map[map.length-1];
if(str == 'inde2.html'){
	str = 'inde2';
	$('body').css('padding-top','0')
}
if(str == 'car_list.html'){
	str = 'car_list';
}
if(str == 'vip.html'){
	str = 'vip';
}
if(str == 'inde.html'){
	str = 'inde';
}

$('#' + str).addClass('mui-active')


 </script>