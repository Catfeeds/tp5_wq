<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:71:"/home/wwwroot/default/hejiang/addons/hc_step/app/index/view/layout.html";i:1540368882;s:75:"/home/wwwroot/default/hejiang/addons/hc_step/app/index/view/layout/top.html";i:1540368882;s:78:"/home/wwwroot/default/hejiang/addons/hc_step/app/index/view/layout/header.html";i:1540368882;s:78:"/home/wwwroot/default/hejiang/addons/hc_step/app/index/view/layout/footer.html";i:1540368882;}*/ ?>
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