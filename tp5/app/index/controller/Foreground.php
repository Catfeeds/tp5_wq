<?php

namespace app\index\controller;
use think\Db;
/**
 * 前端首页控制器
 */
class Foreground extends IndexBase
{
// 首页
    public function goods_detail()
    {  

       global $_GPC, $_W;    
        $user = pdo_get('hcstep_users',array('uniacid'=>$_GPC['i'],'user_id'=>$_GPC['user_id']));
        if($_GPC['index'] == 1){
            $goods = pdo_get('hcstep_goods',array('id'=>$_GPC['goods_id'],'uniacid'=>$_GPC['i']));
            if($goods['selltype'] == 1){
               $shop = pdo_get('hcstep_shop',array('id'=>$goods['shop_id']));
               $goods['sheng'] = $shop['sheng'];
               $goods['shi'] = $shop['shi'];
               $goods['qu'] = $shop['qu'];
               $goods['address'] = $shop['address'];
               $goods['tel'] = $shop['tel'];
               $goods['starttime'] = $shop['starttime'];
               $goods['endtime'] = $shop['endtime'];
            }
            //兑换记录
            $goodslog = pdo_getall('hcstep_orders', array('uniacid'=>$_GPC['i'],'goods_id'=>$goods['id'],'status !=' => 2));
            $xuni = pdo_getall('hcstep_xuni', array('uniacid'=>$_GPC['i'],'goods_id'=>$goods['id']));
            foreach ($goodslog as $k => $v){
                $userinfo = pdo_get('hcstep_users',array('uniacid'=>$_GPC['i'],'user_id'=>$v['user_id']));
                $list1[$k]['nick_name'] = $userinfo['nick_name'];
                $list1[$k]['head_pic'] = $userinfo['head_pic'];
                $list1[$k]['time'] = date('Y-m-d H:i',$v['time']);
            }
            foreach ($xuni as $k => $v){
                $list2[$k]['nick_name'] = $v['nick_name'];
                $list2[$k]['head_pic'] = $_W['attachurl'].$v['head_pic'];
                $list2[$k]['time'] = $v['time'];
            }
            
            if(!empty($list1) and !empty($list2)){
                $list = array_merge($list1,$list2);
                $temp = array_column($list,'time');
                array_multisort($temp, SORT_DESC, $list);
            }elseif(!empty($list1) and empty($list2)){
                $list = $list1;
                $temp = array_column($list,'time');
                array_multisort($temp, SORT_DESC, $list); 
            }elseif(empty($list1) and !empty($list2)){
                $list = $list2; 
                $temp = array_column($list,'time');
                array_multisort($temp, SORT_DESC, $list);
            }else{
                $list = $list; 
            }
            //邀请记录
            $peoplelog = pdo_getall('hcstep_peoplelog', array('uniacid'=>$_GPC['i'],'user_id'=>$_GPC['user_id'],'goods_id'=>$_GPC['goods_id']));
            
            for ($i=0; $i<$goods['minpeople']; $i++)
            {
                if(empty($peoplelog[$i])){
                   $people[$i]['head_pic'] = '';
                   $people[$i]['nick_name'] = ''; 
                }else{
                   $user = pdo_get('hcstep_users',array('user_id'=>$peoplelog[$i]['son_id'],'uniacid'=>$_GPC['i']));
                   $people[$i]['head_pic'] = $user['head_pic'];
                   $people[$i]['nick_name'] = $user['nick_name'];
                }
            }

            $peoplesum = count($peoplelog);
            if($peoplesum >= $goods['minpeople']){
                $goods['is_duihuan'] = 1;  //满足邀请好友条件
            }else{
                $goods['is_duihuan'] = 0;  //未满足
            }

            $goods['goods_img'] = json_decode($goods['goods_img']);

            $goods['is_you'] = 1;
            if($goods['inventory'] <= 0){
                $goods['is_you'] = 0;
                //return $this->result(1, '已经抢光了',$goods);
            }
            if($goods['paytype'] == 1 and $goods['price2'] >$user['money']){
                $goods['is_rich'] = 0;//钱不够
            }elseif($goods['paytype'] == 0 and $goods['price'] >$user['money']){
                $goods['is_rich'] = 0;//钱不够
            }else{
                $goods['is_rich'] = 1;//钱够
            }

            if(!empty($goods['goods_img'])){
                foreach ($goods['goods_img'] as $k => $v) {
                   $goods['goods_img'][$k] = $_W['attachurl'].$v;
                }
            }
            
            $goods['usermoney'] = $user['money'];

            return $this->result(0, '商品详情',array('goods'=>$goods,'list'=>$list,'people'=>$people));
        }else{
            $goods = pdo_get('hcstep_awards',array('id'=>$_GPC['goods_id'],'uniacid'=>$_GPC['i']));
            $goods['goods_img'] = json_decode($goods['goods_img']);

            if($goods['inventory'] <= 0){
                return $this->result(1, '已经抢光了',$goods);
            }
            if(!empty($goods['goods_img'])){
                foreach ($goods['goods_img'] as $k => $v) {
                   $goods['goods_img'][$k] = $_W['attachurl'].$v;
                }
            }          
            $goods['usermoney'] = $user['money'];
            return $this->result(0, '商品详情',$goods);
        }
    }




public function result($errno, $message, $data = '') {

    exit(json_encode(array(

      'errno' => $errno,

      'message' => $message,

      'data' => $data,

    )));

  }
}
?>