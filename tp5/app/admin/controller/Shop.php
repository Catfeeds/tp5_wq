<?php
namespace app\admin\controller;
use think\Db;
use app\common\model\ShopCategory;
use app\admin\service\GoodsService;
class Shop extends AdminBase{

  // 首页
    public function index($cid = 0)
    {
       
     
        $this->assign('category', M('ShopCategory')->where('status=0')->select());
        if($this->request->param()['category_id']<=0){
        $where = $this->logicShop->getWhere($this->param);}else{
        $where['category_id']=$this->request->param()['category_id'];}
        $params['selling'] = 1;

        $list= $this->logicShop->getShopList($where, 'a.*,m.nickname,c.name as category_name', 'a.create_time desc',6);
        $this->assign('list', $list);
        return $this->fetch('index');
    }
    
 public function show(){
        $info = $this->logicShop->getShopInfo(['a.id' => $this->param['id']], 'a.*,m.nickname,c.name as category_name');
        !empty($info) && $info['img_ids_array'] = str2arr($info['img_ids']);

        $ordernum[0]=0;
        session('member_info') &&$ordernum[0]=M('shop_car')->where('uid='.session('member_info')['id'])->count();
        $this->assign('info', $info);
        $this->assign('ordernum',$ordernum);
        return $this->fetch();
    }

//购物车处理
  public function car_list(){
    !session('member_info') && $this->redirect('admin/login/login');
       
       if($this->param['num']){ $this->logicShop->car_add($this->param);}
       
        $where=['g.selling'=>['=',1]];
        $where=['c.uid'=>['=',session('member_info')->id]];
        //var_dump($this->logicShop->car_list($where)[0]);
        $this->assign('lists', $this->logicShop->car_list($where));
        $info=M('member')->where('id='.session('member_info')['id'])->find();
        $info['address_d']=explode('|', $info['address']);
        $this->assign('info',$info );
       // $this->assign('list_address', ShopAddress::select());
        // 获取配送区域
        $map['uid']=$this->user['id'];
        $map['status']=1;
        $addressid  = input('address_id');
        if($addressid){
            $map['id']=$addressid;
        }
        $ordersAddressInfo = Db::name('address')->where($map)->find();
       $this->assign('ordersAddressInfo',$ordersAddressInfo);
        return $this->fetch();

    }
    
public function car_delete(){
        $params = $this->request->param();
        if (!isset($params['ids']) || !is_array($params['ids']) || count($params['ids']) == 0) {
            return $this->error('至少选择一个商品！');
        }
         $where=['uid'=>['=',session('member_info')->id]];
         $where['goods_id'] =array('in',$params['ids']);
        if (M('shop_car')->where($where)->count() == 0) {
            return $this->error('商品不存在！！');
        }
        M('shop_car')->where($where)->delete();
        return $this->success('删除成功！', 'car_list');

    }




//订单处理

 public function order_add(){

         $params = $this->request->param();

        // if(!$params['address']||!$params['mobile']||!$params['name']){ 
        //     $this->error('不能空地址');
        //     }
        //     
        $gnum=M('shop_order')->where('uid='.$this->user['id'].' and goods_id=54')->sum('num');  


          if($gnum+$params['num']>$this->feeratio['max_ad'][0]){ 
            $this->error('最多买五个');
            }
         if(!$params['ids']){
          $this->error('提交订单失败');
         }
        if(!$params['goods_price']){
          $this->error('提交订单失败');
         }

         foreach ($params['ids'] as  $value) {
            $params['ids']=$value;
             $this->logicShop->order_add($params);
         }
         $where=['uid'=>['=',session('member_info')->id]];
         $where['goods_id'] =array('in',$params['ids']);
          M('shop_car')->where($where)->delete();
          return $this->success('提交订单成功！','order_list');
        }

public function order_list(){
        $param=$this->request->param();
        $where['uid']= $this->user['id'];
        $list=$this->logicShop->order_list($where,$param);
        $this->assign('man', $this->user);
        $this->assign('list',$list);
        return $this->fetch('order_list');
    }



  public function order_show(){

        $params = $this->request->param();
        foreach(  $params as $k=>$v){   if( !$v )   unset($params[$k] ); }
//var_dump($params);die;
        if($params['address']){
             $a=M('shop_order')->where('code="'.$params['code'].'"')->update($params);
           if($a) {
            $this->success('修改成功');
           }else{
            $this->error('修改失败');
           }
         }


        $c['code']=$params['code'];
        $order=$this->logicShop->order_show($c);

        if (!$order  || ($order['uid'] != session('member_info')['id']&&session('member_info')['id']>1)) {
            return $this->error('订单不存在！');
        }
  
        $this->assign('order', $order);
        $this->assign('man', $this->user);
        return $this->fetch();
    }

 public function order_show2(){

        $params = $this->request->param();
        

        foreach(  $params as $k=>$v){   if( !$v )   unset($params[$k] ); }
//var_dump($params);die;
        if($params['address']){
             $a=M('shop_order')->where('code="'.$params['code'].'"')->update($params);
           if($a) {
            $this->success('修改成功');
           }else{
            $this->error('修改失败');
           }
         }


        $c['code']=$params['code'];
        $order=$this->logicShop->order_show($c);

        if (!$order  || ($order['uid'] != session('member_info')['id']&&session('member_info')['id']>1)) {
            return $this->error('订单不存在！');
        }
        $this->assign('addr',M('address')->where('uid='.$order['uid'])->find());
        $this->assign('order', $order);
        $this->assign('man', $this->user);
        return $this->fetch();
    }
  public function order_comfirm_get(){
        $params = $this->request->param();
        $ord['get_time'] = session('member_auth')['update_time'];
        $ord['status']=$params['status'];
        $member=new  Member;

       
       if($this->user[b0]<$params['goods_cost']&&$params['pay_type']==0){

       // $url = url('vip/charge_member');
        $this->error('余额不足请充值'); 

        }
        if($this->user[b1]<$params['goods_cost']&&$params['pay_type']==1){ $this->error('静态钱包不足'); 
      
        }
        if($this->user[b2]<$params['goods_cost']&&$params['pay_type']==2){ $this->error('动态钱包不足');
        
         }
         $ord['status'] =3;
         M('shop_order')->where('code="'.$params['code'].'"')->save($ord);
         M('member')->where('id='.$this->user['id'])->setField('is_pay',1);
         $ad_bag= M('shop_order')->where('status=3 and goods_id=54 and uid="'.$this->user['id'].'"')->sum('num');
        M('member')->where("id=".$this->user['id'])->setfield('ad_bag',$ad_bag); 



       switch ($params['status']) {
                case 0:
                 $member->rw_bonus_dec($this->user,0,$params['goods_cost'],$this->user);
                  return $this->success('支付成功！');
                    break;
                case 1:
                 $member->rw_bonus_dec($this->user,1,$params['goods_cost'],$this->user);
                    return $this->success('支付成功！');
                    break;
                case 2:
                $member->rw_bonus_dec($this->user,2,$params['goods_cost'],$this->user); 
                     return $this->success('支付成功！');
                    break;
               }
    }



    public function order_list2(){
        $param=$this->request->param();

        $list=$this->logicShop->order_list($where,$param);
        $this->assign('man', session('member_info'));
        foreach ($list as $key => $value) {
          $man=M('member')->where('is_pay=0 and id='.$value['uid'])->find();
          if($man){
           unset($list[$key]);
          }
        }


        $this->assign('list',$list);
         if($param['code']){
           $where['code'] =$param['code'];
      if (M('shop_order')->where($where)->count() == 0) {
          return $this->error('订单不存在！！');
      }
      M('shop_order')->where($where)->delete();
      return $this->success('订单删除成功！', 'admin/shop/order_list');
        }
        return $this->fetch('order_list2');
    }


    public function order_list_b(){

        $status = $this->request->param('status');
        $start = $this->request->param('start');
        $end = $this->request->param('end');
        $word = $this->request->param('word');
        $status= $this->request->param('status');
      
        //$where = ['uid', '=', session('member_info')['id']];
        if(session('member_info')['id']<=1){
             $where=['uid'=>['>',0]];
        }else{
        $where=['uid'=>['=',session('member_info')['id']]];
        }

        if ($status && $status != '') {
          $where=['a.status'=>['=',$status]];
        }

        if ($start) {
            if ($end) {
                $end .= ' 23:59:59';
                $where=[ 'create_time'=>[['egt',strtotime($start)],['elt',strtotime($end)]],];

            }else{
               // $where[] = ['create_time', ['>=', strtotime($start)], ['<=', session('member_auth')['update_time']], 'and'];
                $where=[ 'create_time'=>[['egt',strtotime($start)],['elt',session('member_auth')['update_time']]],];

            }
        }else{
            if ($end) {
                $end .= ' 23:59:59';
                //$where[] = ['create_time', ['>=', 0], ['<=', strtotime($end)], 'and'];
                $where=[ 'create_time'=>[['egt',0],['elt',strtotime($end)]],];
            }
        }
        if ($word) {
            //$where[] = ['goods_name', 'like', '%'.$word.'%'];
             $where=['goods_name'=>['like','%'.$word.'%']];
        }
        $list=$this->logicShop->order_list($where);
        $this->assign('man', session('member_info'));
        $this->assign('list',$list);

        return $this->fetch('order_list');
    }

 
}
