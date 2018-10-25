<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:76:"/home/wwwroot/default/hejiang/addons/hc_step/app/index/view/index/index.html";i:1540370483;s:71:"/home/wwwroot/default/hejiang/addons/hc_step/app/index/view/layout.html";i:1540368882;s:75:"/home/wwwroot/default/hejiang/addons/hc_step/app/index/view/layout/top.html";i:1540368882;s:78:"/home/wwwroot/default/hejiang/addons/hc_step/app/index/view/layout/header.html";i:1540368882;s:78:"/home/wwwroot/default/hejiang/addons/hc_step/app/index/view/layout/footer.html";i:1540368882;}*/ ?>
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

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title><?php echo $title; ?>【官网】共享传媒商城APP</title>
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/mui.min.css"/>
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/own.css"/>
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/iconfont.css"/>
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/jquery.hiSlider.min.css"/>
    <script src="__STATIC__/js/mui.min.js" charset="UTF-8"></script>
    <script src="__STATIC__/js/jquery.hiSlider.min.js" charset="UTF-8"></script>
    <script src="__STATIC__/js/flexible.js" charset="UTF-8"></script>

    <style type="text/css">
        .mui-active .mui-icon,.mui-active .mui-tab-label {
            color: #7FBF26;
        }

            .mui-table-view:after {
                height: 0px;
            }
            /*图片显示的时候设置为自动 因为 从服务器来的图片大小相同*/
            .mui-table-view.mui-grid-view .mui-table-view-cell .mui-media-object {
                line-height: auto;
                max-width: auto;
                height: auto;
                /*border-top-right-radius: 4px;
                border-top-left-radius: 4px;*/
            }

            .mui-table-view-cell {
                margin-bottom: 0px;
            }

            .bgDiv {
                /*border: 1px solid rgba(204, 204, 204, 0.7);*/
                /*border-radius: 5px;*/
                background-color: white;
                width: 100%;
            }

            .mui-table-view.mui-grid-view .mui-table-view-cell .mui-media-body {
                margin-top: 2px;
                margin-bottom: 5px;
                height: auto;
                padding:0 3px;
            }

            .mui-table-view.mui-grid-view .mui-table-view-cell .mui-media-body p {
                white-space: pre;
                color: black;
            }

            .mui-table-view.mui-grid-view .mui-table-view-cell .mui-media-body p.mui-ellipsis-2 {
                line-height: 1.2;
                margin-left: 3%;
                text-align: left;
                max-height: 35px;
            }

            .mui-table-view.mui-grid-view .mui-table-view-cell .mui-media-body .price-one {
                margin-top: 5px;
                float: left;
                font-size: 1em;
                margin-left: 3%;
                color: red;
                margin-bottom: 10px;
            }
            .own-title{
                border-left: 5px solid #7ebf25;
                color: #7ebf25;
                line-height: 1em;
                margin-bottom: 10px;
                margin-top: 10px;
                padding-left: 10px;
            }
            .mui-table-view.mui-grid-view .mui-table-view-cell .mui-media-body .price-two {
                margin-top: 12px;
                float: right;
                font-size: 1.1em;
                margin-right: 7%;
                text-decoration: line-through;
            }
            .own-home-pro dl{
                overflow: hidden;
            }
            .own-home-pro dl dt, .own-home-pro dl dd {
                box-sizing: border-box;
                display: block;
                float: left;
                overflow: hidden;
                width: 50%;
                margin:0;
                border-top: 1px solid #eee;
            }
            .own-home-pro dl a {
                display: block;
                height: 100%;
                width: 100%;
            }
            .own-home-pro dl img {
                height: auto;
                width: 100%;
            }
            .own-home-pro dl dd {
                border-left: 1px solid #eee;
            }


            .area{
                padding:15px 10px 0 10px;
                height: 45px;
            }
            .area span{
                color: #fff;
                background-color: #9BCB5A;
                border: 1px solid #9BCB5A;
                text-align: center;
                padding: 3px 16px;
                border-radius: 15px;
                font-size: 15px;
            }
            .area a{
                text-align: center;
            }
            .mui-table-view::before{
                background-color: #F8F8F8;
            }


            .foot {
            background-color:#fff;
            color:#999;
            clear:both;
            text-align:center;
            padding:2%;
            line-height: 1.8;
            margin-top: 3%;
            font-size: 14px;
            }
            @media(max-width: 767px){
                 #main-container{ margin: 0 -20px; }
                  body > .navbar{ margin-bottom: 0; }
            }
        ul{ margin: 0; }
        .mui-bar-nav.mui-bar .mui-icon{ margin-right: 10px;color: white }



    </style>





<div id="main-container" class="container" style="width: 100%;position: absolute; padding-top: 44px; ">

    <header class="mui-bar mui-bar-nav own-main-background-color" style="box-shadow: none;">
        <a class="mui-icon iconfont icon-tianjia1 mui-pull-left" href="/weixin/saoma.php"></a>
        <a class="mui-icon iconfont icon-cart mui-pull-right" href="<?php echo url('index/user/car_list'); ?>"></a>
        <h1 id="nav-title" class="mui-title">共享传媒</h1>
    </header>

<ul class="hiSlider hiSlider3">
    <li class="hiSlider-item"><a href=""><img src="__STATIC__/images/ban1.jpg"></a></li>
    <li class="hiSlider-item"><a href=""><img src="__STATIC__/images/ban2.jpg"></a></li>
    <li class="hiSlider-item"><a href=""><img src="__STATIC__/images/ban3.jpg"></a></li>
</ul>

        <div class="mui-content"  style="padding-top: 0; padding-bottom: 50px;">
            <div id="homeDiv">
                <div id="productSlider" class="mui-slider">
                    <div class="mui-slider-group mui-slider-loop">
                    </div>
                </div>
                <div>
                    <div class="mui-row area">
                    <?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <a href="<?php echo url('index', ['category_id' => $vo->id]); ?>" value="<?php echo $vo['id']; ?>"  class="mui-col-xs-4"><span><?php echo $vo['name']; ?></span></a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div><!-- href="<?php echo url('Shop/order_list'); ?>"  -->
                   
                    <ul id="recommend" class="mui-table-view mui-grid-view own-gray-color">
                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <li class="mui-table-view-cell mui-media mui-col-xs-6"><a href="<?php echo url('index/show', ['id' => $v->id]); ?>">
                            <div class= "bgDiv">
                                 <img class="admin-list-img-size" src="<?php echo get_picture_url($v['cover_id']); ?>" style="width: 4.8rem; height: 4.45rem;width: 100%" />
                                <div class="mui-media-body">
                                    <p class="mui-ellipsis-2"><?php echo $v['name']; ?></p>
                                    <p class="price-one">¥<?php echo $v['price']; ?></p>
                                </div>
                            </div>
                        </a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            <div id="more">
                <button id="moreBtn" type="button" data-page="1" class="mui-btn mui-btn-link">加载更多</button>
            </div>
            </div>
        </div>
    
   

</div>

 <script type="text/javascript">



/*轮播图*/
$('.hiSlider3').hiSlider({
        isFlexible: true,
        isSupportTouch: true,
        });
        
    $('.hiSlider3').mouseenter(function(){
        $('.hiSlider-btn-prev').css('display','block')
        $('.hiSlider-btn-next').css('display','block')
    })
    $('.hiSlider3').mouseleave(function(){
        $('.hiSlider-btn-prev').css('display','none')
        $('.hiSlider-btn-next').css('display','none')
    })




        mui.init({
            swipeBack:false
        });

        // mui.alert("为庆祝5月15日共享传媒app隆重上线，公司决定额外赠送已成为爱心健康大使的会员，和马上注册成为爱心健康大使的人，每人一支辣木植物牙膏体验，此活动时间截止到5月31日。","好消息");

        var navTitle;
        var mainWebview;
        var curBarItemWebview;

        var barItemWebviewArray = [];
        var barItemArray = ['/','/category.html','/cart.html','/my/'];

        mui('.mui-bar-tab').on('tap','.mui-tab-item',function(){
            var baritem = this;
            var baritemurl = baritem.getAttribute('href');
            location.href=baritemurl;
        });

        var more=document.getElementById('more');
        var moreBtn=document.getElementById('moreBtn');
        var detailcontent = document.getElementById('recommend');
        var page=parseInt(moreBtn.getAttribute("data-page"));

        //监听按钮返回获取数据
        moreBtn.addEventListener('tap', function() {
           // moreBtn.innerText='数据加载中'
            page++;
            mui.ajax('<?php echo url('index/indexjson'); ?>?page='+page+'',{
                dataType:'json',
                type:'get',
                timeout:10000,
                success:function(data){
                    if (data.code==1){
                        setHtml(data.data);
                    }else{
                        more.innerHTML='没有更多数据了';
                        moreBtn.style.display = 'none';
                    }
                },
                error:function(){
                    console.log('网络超时');
                }
            })

        });
// <img class="admin-list-img-size" src="<?php echo get_picture_url($v['cover_id']); ?>"/>
        //初始化数据并且设置html
        function setHtml(data) {
            for (var i = 0; i < data.length; i++ ) {
                 var url="<?php echo url('index/show', ['id' =>data.[i][id]]); ?>";
                if(!data[i].cover){
                	data[i].cover="__ROOT__/static/module/admin/img/onimg.png";
                }else{
                	data[i].cover='__ROOT__/upload/picture/'+data[i].cover;
                }

                li = document.createElement('li');
                li.className = 'mui-table-view-cell mui-media mui-col-xs-6';
                li.innerHTML = '<a href="' +'__ROOT__'+ data[i].url + '">\
                                <div class= "bgDiv">\
                                    <img style="width: 4.8rem; height: 4.45rem;width: 100%" class="admin-list-img-size" src="'+data[i].cover+'"/>\
                                    <div class="mui-media-body">\
                                        <p class="mui-ellipsis-2">' + data[i].name + '</p>\
                                        <p class="price-one">¥' + data[i].price + '</p>\
                                    </div>\
                                </div>\
                            </a>';
                detailcontent.appendChild(li);

            }
            moreBtn.setAttribute("data-page",page);
            if(data.length<20){
                more.innerHTML='没有更多数据了';
                moreBtn.style.display = 'none';
            }
        }


        var currentWebview;
        var marqueeArray = []; //跑马灯数据数组
        var recommendArray = []; //推荐商品数组
        // mui.plusReady(function() {
            // currentWebview = plus.webview.currentWebview();

            mui.ajax('<?php echo url('index/sliderjson'); ?>',{
                dataType:'json',
                type:'get',
                timeout:10000,
                success:function(data){
                    setMarquee(data.data);
                },
                error:function(){
                    console.log('网络超时');
                }
            })

            function setMarquee(data) {
                var sliderMarquee = document.getElementById('productSlider');
                var aurl="<?php echo url('Article/zhuanti'); ?>?id=";
                var sliderGroup='';
                var sliderIndicator='';
                var marqueeArray=data;

                sliderGroup=sliderGroup+'<div class="mui-slider-item mui-slider-item-duplicate">\
                    <a href="'+ aurl + marqueeArray[marqueeArray.length - 1].id + '">\
                        <img src="' + marqueeArray[marqueeArray.length - 1].img + '" />\
                    </a></div>';

                for (var i = 0; i < marqueeArray.length; i++) {
                    sliderGroup=sliderGroup+'<div class="mui-slider-item">\
                    <a href="'+ aurl + marqueeArray[i].id + '">\
                        <img src="' + marqueeArray[i].img + '" />\
                    </a></div>';

                    if (i == 0) {
                        sliderIndicator=sliderIndicator+'<div class="mui-indicator mui-active"></div>';
                    } else {
                        sliderIndicator=sliderIndicator+'<div class="mui-indicator"></div>';
                    }

                }

                sliderGroup=sliderGroup+'<div class="mui-slider-item mui-slider-item-duplicate">\
                    <a href="'+ aurl + marqueeArray[0].id + '">\
                        <img src="' + marqueeArray[0].img + '" />\
                    </a></div>';

                sliderMarquee.innerHTML='<div class="mui-slider-group mui-slider-loop">'+sliderGroup+'</div>\
                                        <div class="mui-slider-indicator">'+sliderIndicator +'</div>';
                var slider = mui('.mui-slider').slider({
                        interval:3000
                });
            }

        var muitab = document.querySelectorAll('.mui-tab-item');
        muitab[0].setAttribute('class',"mui-tab-item mui-active");
    </script>
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