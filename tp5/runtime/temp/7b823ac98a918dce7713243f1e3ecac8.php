<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:79:"/home/wwwroot/default/hejiang/addons/hc_step/tp5/app/index/view/index/kefu.html";i:1540455210;s:75:"/home/wwwroot/default/hejiang/addons/hc_step/tp5/app/index/view/layout.html";i:1540381647;}*/ ?>






<div class="clearfix">				

<ul class="nav nav-tabs">

	<li class="active"><a href="<?php echo $this->createWebUrl('kefu')?>">客服消息列表</a></li>

	<li><a href="<?php echo $this->createWebUrl('kefuu_post');?>">添加客服消息</a></li>

</ul>

<div class="main panel panel-default">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="width:20%;">ID</th>
					<th style="width:20%;">关键词</th>
					<th style="width:20%;">关注图文标题</th>					
					<th style="width:20%;">备注</th>
					<th style="width:20%;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
					<tr>
						<td><?php echo $item['id']; ?></td>
						<td><?php echo $item['kefu_keyword']; ?></td>
						<td><?php echo $item['kefu_title']; ?></td>
						<td><?php echo $item['beizhu']; ?></td>
						<td class="text-right">
							<a href="<?php echo $this->createWebUrl('kefuu_post',array('id'=>$item['id']));?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="修改"><i class="fa fa-edit"></i></a>
							<a href="<?php echo $this->createWebUrl('kefuu_post',array('act'=>'del','id'=>$item['id']));?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="删除"><i class="fa fa-times"></i></a>
						</td>
					</tr>
				<?php endforeach; endif; else: echo "" ;endif; if(empty($list)): ?>
                <tr ng-if="!wechats">
                <td colspan="9" class="text-center">暂无数据</td>
                </tr>
                <?php endif; ?>
				<tr>
					<td colspan="9" style="text-align:right"><?php echo $list->render(); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

</div>

