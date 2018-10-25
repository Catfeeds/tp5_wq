<?php

namespace app\index\controller;
use think\Db;
/**
 * 前端首页控制器
 */
class Backstage extends IndexBase
{
// 首页
    public function kefu($cid = 0)
    {   global $_W, $_GPC;
        $where['uniacid'] = $_W['uniacid'];
        $list=Db::name('hcstep_kefu')->where($where)->order('id asc')->paginate(5);
       $this->assign('list',$list);
       return $this->fetch('./backstage/kefu');
    }

    public function kefu_post()
    {
         global $_W,$_GPC;
         $id = $_GPC['id'];
         $_GPC['uniacid'] = $_GPC['__uniacid'];
         if($id){
        $info = M('hcstep_kefu')->where('id='.$id)->find();
        if(Db::name('hcstep_kefu')->where('id='.$id)->strict(false)->save($_GPC)){
        $this->success('修改成功');}
         }
         if($_GPC['act']=='add'){
         Db::name('hcstep_kefu')->strict(false)->save($_GPC);
         $this->success('添加成功'); }
          if($_GPC['act']=='del'){
         Db::name('hcstep_kefu')->where('id='.$id)->delete(); 
         return $this->kefu();
           }
       $this->assign('info',$info);
       return $this->fetch('./backstage/kefu_post');
    }



}
?>