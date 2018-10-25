<?php
// +---------------------------------------------------------------------+
// | OneBase    | [ WE CAN DO IT JUST THINK ]                            |
// +---------------------------------------------------------------------+
// | Licensed   | http://www.apache.org/licenses/LICENSE-2.0 )           |
// +---------------------------------------------------------------------+
// | Author     | Bigotry <3162875@qq.com>                               |
// +---------------------------------------------------------------------+
// | Repository | https://gitee.com/Bigotry/OneBase                      |
// +---------------------------------------------------------------------+

namespace app\admin\controller;
use think\Db;
use app\admin\logic\Member;
/**
 * 文章控制器
 */
class Shopadmin extends AdminBase
{
    
    /**
     * 文章列表
     */
    public function shopList()
    {
        
        $where = $this->logicShop->getWhere($this->param);
       
        $this->assign('list', $this->logicShop->getShopList($where, 'a.*,m.nickname,c.name as category_name', 'a.create_time desc'));
        
        return $this->fetch('shop_list');
    }
    
    /**
     * 文章添加
     */
    public function shopAdd()
    {
        
        $this->shopCommon();
        
        return $this->fetch('shop_edit');
    }
    
    /**
     * 文章编辑
     */
    public function shopEdit()
    {
        
        $this->shopCommon();
        
        $info = $this->logicShop->getShopInfo(['a.id' => $this->param['id']], 'a.*,m.nickname,c.name as category_name');
        
        !empty($info) && $info['img_ids_array'] = str2arr($info['img_ids']);
        
        $this->assign('info', $info);
        
        return $this->fetch('shop_edit');
    }
    
    /**
     * 文章添加与编辑通用方法
     */
    public function shopCommon()
    {
        
        IS_POST && $this->jump($this->logicShop->shopEdit($this->param));
        
        $this->assign('shop_category_list', $this->logicShop->getShopCategoryList([], 'id,name', '', false));
    }
    
    /**
     * 文章分类添加
     */
    public function shopCategoryAdd()
    {
        
        IS_POST && $this->jump($this->logicShop->shopCategoryEdit($this->param));
        
        return $this->fetch('shop_category_edit');
    }
    
    /**
     * 文章分类编辑
     */
    public function shopCategoryEdit()
    {
        
        IS_POST && $this->jump($this->logicShop->shopCategoryEdit($this->param));
        
        $info = $this->logicShop->getShopCategoryInfo(['id' => $this->param['id']]);
        
        $this->assign('info', $info);
        
        return $this->fetch('shop_category_edit');
    }
    
    /**
     * 文章分类列表
     */
    public function shopCategoryList()
    {
        
        $this->assign('list', $this->logicShop->getShopCategoryList());
       
        return $this->fetch('shop_category_list');
    }
    
    /**
     * 文章分类删除
     */
    public function shopCategoryDel($id = 0)
    {
        
        $this->jump($this->logicShop->ShopCategoryDel(['id' => $id]));
    }
    
    /**
     * 数据状态设置
     */
    public function setStatus()
    {
        
        $this->jump($this->logicAdminBase->setStatus('Shop', $this->param));
    }


 public function charge(){

        $user = input('get.user');
        $type = input('type');
        $status = input('status');
        $pageParam=['query'=>[]];
        $where='';

        if(is_numeric($type)){
            $pageParam['query']['type']=$type;
            if($where){
                $where .= " type = '$type'";
            }else{
                $where .= " type = '$type'";
            }
        }

        if(is_numeric($status)){
            $pageParam['query']['status']=$status;
            if($where){
                $where .= " status = '$status'";
            }else{
                $where .= " status = '$status'";
            }
        }

        if($user){
            $uid=Db::name('member')->where('username',$user)->value('id');
            if(!$uid){
                $this->error($user.'没有记录');
            }
            $pageParam['query']['user']=$user;
            if($where){
                $where .= " and uid = $uid";
            }else{
                $where = " uid = $uid";
            }
        }

        $re_id=session('member_info')['id'];
        $variable=M('member')->where("re_id=".$re_id)->select();
        foreach ($variable as $key => $value) {
            $b_re_id[$key]=$value[id];
        }
         $where['uid']=['>',0];
         $where['action_type']=['=',50];
        $list=$this->logicshop->history($where,5);
       $this->assign('type_arr',$this->feeratio['type_name']); 
        $rel = [];
        foreach($list as $v){

            $v['afternum']=$v['epoints'];
            $v['ctime']=date('Y-m-d H:i:s',$v['pdt']);
            $v['username']=$v['user_id'];
            $v['name']=$v['user_id'];
            $v['num']=$v['epoints'];
            
            $rel[] = $v;
        }

        $this->assign('page',$list);
        $this->assign('data',$rel);
        return $this->fetch('shopadmin/charge');
    }




 public function charge_insert(){

    $params = $this->request->param();
    $id =input('id');
    $status = input('status');
    $text = input('text');

    if($params['type']){
     M('history')->where("id=".$id)->setInc('status',2);
     M('history')->where("id=".$id)->setField('text', $text);
    $this->success('驳回成功');
    }

   if(!$params['type']){
    M('history')->where("id=".$id)->setInc('status',1);
    $his=M('history')->where("id=".$id)->find();
    M('member')->where("id=".$his['uid'])->setInc('b0',$his['epoints']);
    $this->success('通过成功');
    }
 }



     public function drawal(){

        $user = input('get.user');
        $type = input('type');
        $status = input('status');
        $pageParam=['query'=>[]];
        $where='';

        if(is_numeric($type)){
            $pageParam['query']['type']=$type;
            if($where){
                $where .= " type = '$type'";
            }else{
                $where .= " type = '$type'";
            }
        }

        if(is_numeric($status)){
            $pageParam['query']['status']=$status;
            if($where){
                $where .= " status = '$status'";
            }else{
                $where .= " status = '$status'";
            }
        }

        if($user){
            $uid=Db::name('member')->where('username',$user)->value('id');
            if(!$uid){
                $this->error($user.'没有记录');
            }
            $pageParam['query']['user']=$user;
            if($where){
                $where .= " and uid = $uid";
            }else{
                $where = " uid = $uid";
            }
        }



        $data = Db::name('draw')->where($where)->order('id desc')->paginate(20,false,$pageParam);

        $rel = [];
        foreach($data as $v){

            $v['afternum']=$v['num']*(1-$this->feeratio['poundage'][0]/100);
            $v['ctime']=date('Y-m-d H:i:s',$v['ctime']);
            $v['username']=Db::name('member')->where('id',$v['uid'])->value('username');
            // if($v['kaihu']=='快捷'){
                $v['bank']=$this->feeratio['bank'][$v['bank_name']];
            //}
            $rel[] = $v;
        }
//var_dump($this->feeratio['bank']);
        $this->assign('page',$data);
        $this->assign('data',$rel);
        return $this->fetch('shopadmin/drawal');
    }


public function insert(){

  $params = $this->request->param();
    $id =input('id');
    $status = input('status');
    $text = input('text');

    if($params['type']){
     M('draw')->where("id=".$id)->setInc('status',2);
     M('draw')->where("id=".$id)->setField('text', $text);
     $my_d=M('draw')->where("id=".$id)->find();
     $my=M('member')->where("id=".$my_d['uid'])->find();
     
    $menus=new Member($this->feeratio);
    $menus->rw_bonus_inc($my,66,$my_d['num'],$my);
   // var_dump($my['id'],66,$my_d['num'],$my['id']);
    $this->success('驳回成功');
    }
   if(!$params['type']){
    M('draw')->where("id=".$id)->setInc('status',1);
    $his=M('draw')->where("id=".$id)->find();
    //M('drawal')->where("id=".$his['uid'])->setInc('b0',$his['epoints']);
    $this->success('通过成功');
    }
 }















    public function detail(){

        $id =input('id');
        $data = Db::name('draw')->where(['id'=>$id])->find();
        $data['username']=Db::name('member')->where('id',$data['uid'])->value('username');
        $data['ctime']=date('Y-m-d H:i:s',$data['ctime']);

       // $bankinfo = DB::name('banks')->where('uid',$data['uid'])->order('id desc')->find();

        // $bankArrTemp=array('01020000'=>'中国工商银行','01030000'=>'中国农业银行','01040000'=>'中国银行','01050000'=>'中国建设银行','03010000'=>'中国交通银行','03020000'=>'中信银行','03030000'=>'光大银行','03040000'=>'华夏银行','03050000'=>'民生银行','03060000'=>'广发银行','03080000'=>'招商银行','03090000'=>'兴业银行','03100000'=>'上海浦东发展银行','03130011'=>'北京银行','03130031'=>'上海银行','03134402'=>'平安银行','03150000'=>'恒丰银行','04030000'=>'中国邮政储蓄银行');

        // if($data['type']==1){
        //     $data['bank']=$bankArrTemp[$data['bank']];
        //     $data['afternum']=(intval(floor(($data['num'] * 100) * 0.8015))-300)/100;
        // }else{
        //     $data['afternum']=$data['num']*0.8;
        // }

        // $data['custid']=$bankinfo['custid'];
        // if($bankinfo['isjb']==0&&$bankinfo['status']==1){
        //     $data['bk']='已绑卡';
        // }else{
        //     $data['bk']='未绑卡';
        // }

        $this->assign('data',$data);
        return $this->fetch();
    }



























    // public function insert(){

    // 	$id =input('id');
    //     $status = input('status');
    //     $text = input('text');


    //     $drawal = Db::name('draw')->field('uid,num')->where(['id'=>$id,'status'=>0])->find();

    //     if(!$drawal){
    //         return $this->error('修改失败');
    //     }else{

    //         $uid=$drawal['uid'];
    //         $num=$drawal['num'];

    //         $gdsx = $num * 0.1;
    //         $gdfx = $num * 0.1;
    //         $gddb = $num * 0.05;
    //         $gdtx = $num * 0.8;
    //         $gddbmax = 0; 

    //         if($status == 2){
             
    //             // 启动事务
    //             Db::startTrans();
    //             try{

    //                 $data=[];
    //                 $data['status'] = $status;
    //                 $data['content'] = $text;
    //                 Db::name('draw')->where("id",$id)->update($data);

    //                 Db::name('member')->where("id",$uid)->setInc('b0',$drawal['num']);


    //                 // //插入记录
    //                 // $data=[];
    //                 // $data['rmb'] = $drawal['num'];
    //                 // $data['uid'] = $drawal['uid'];
    //                 // $data['type'] = 22;
    //                 // $data['typeStr'] = '提现驳回';
    //                 // $data['ctime'] = time();
    //                 // $data['status'] = 2;
    //                 // $bill = Db::name('bill')->insert($data);


    //                 // 提交事务
    //                 Db::commit();    

    //                 return json(['data'=>'','code'=>1,'msg'=>'驳回成功']);

    //             } catch (\Exception $e) {
    //                 // 回滚事务
    //                 Db::rollback();

    //                 return json(['data'=>'','code'=>0,'msg'=>'驳回失败']);
    //             }
            

    //         }elseif($status == 1){

    //             // 启动事务
    //             Db::startTrans();
    //             try{

    //                 Db::name('drawal')->where("id",$id)->setField('status',1);

    //                 Db::name('mini_users')->where("id",$uid)->setInc('gdfx',$gdfx);


    //                 //插入记录
    //                 $data=[];
    //                 $data['rmb'] = $gdtx;
    //                 $data['uid'] = $drawal['uid'];
    //                 $data['type'] = 21;
    //                 $data['typeStr'] = '提现通过';
    //                 $data['ctime'] = time();
    //                 $data['status'] = 1;
    //                 $bill = Db::name('bill')->insert($data);


    //                 //插入记录
    //                 $data=[];
    //                 $data['rmb'] = $gdfx;
    //                 $data['uid'] = $drawal['uid'];
    //                 $data['type'] = 13;
    //                 $data['typeStr'] = '消费钱包';
    //                 $data['ctime'] = time();
    //                 $data['status'] = 1;
    //                 $bill = Db::name('bill')->insert($data);


    //                 //插入记录
    //                 $data=[];
    //                 $data['rmb'] = $gdsx;
    //                 $data['uid'] = $drawal['uid'];
    //                 $data['type'] = 23;
    //                 $data['typeStr'] = '提现手续费';
    //                 $data['ctime'] = time();
    //                 $data['status'] = 1;
    //                 $bill = Db::name('bill')->insert($data);

    //                 $user=Db::name('member')->where("id",$uid)->field('idcard,txdb,jdtime')->find();


    //                 //区域奖励
    //                 if(!empty($user['idcard'])&&500>$user['txdb']){


    //                     $cardsheng  =substr($user['idcard'],0,2);
    //                     $cardshi    =substr($user['idcard'],0,4);
    //                     $cardxian   =substr($user['idcard'],0,6);

    //                     $gdsheng  =0;
    //                     $gdshi    =0;
    //                     $gdxian   =0;


    //                     //县
    //                     $map=[];
    //                     $map['code']=$cardxian;
    //                     $map['status']=1;
    //                     $map['iskd']=1;
    //                     $map['kdtime']=['<',$user['jdtime']];
    //                     $xian=Db::name('quyu')->where($map)->field('id,status,istj')->find();
    //                     if($xian){
    //                         $gdxian=300;
    //                         $gddbmax=300;
    //                     }

    //                     //市
    //                     $map=[];
    //                     $map['code']=$cardshi;
    //                     $map['status']=1;
    //                     $map['iskd']=1;
    //                     $map['kdtime']=['<',$user['jdtime']];
    //                     $shi=Db::name('quyu')->where($map)->field('id,status,istj')->find();
    //                     if($shi){
    //                         $gdshi=450-$gdxian;
    //                         $gddbmax=450;
    //                     }

    //                     //省
    //                     $map=[];
    //                     $map['code']=$cardsheng;
    //                     $map['status']=1;
    //                     $map['iskd']=1;
    //                     $map['kdtime']=['<',$user['jdtime']];
    //                     $sheng=Db::name('quyu')->where($map)->field('id,status,istj')->find();
    //                     if($sheng){
    //                         $gdsheng=500-$gdshi-$gdxian;
    //                         $gddbmax=500;
    //                     }


    //                     if($gddbmax>0&&$gddbmax>$user['txdb']){

    //                         if($gddbmax<($user['txdb']+$gddb)){
    //                             $gddb=$gddbmax-$user['txdb'];
    //                         }

    //                         //会员
    //                         Db::name('mini_users')->where('id',$uid)->setInc('txdb',$gddb);
                            
    //                         if($xian){

    //                             //比例
    //                             $bixian=$gdxian/$gddbmax;

    //                             //
    //                             $gdqy=intval(floor($gddb*100*$bixian))/100;

    //                             Db::name('quyu')->where('id',$xian['id'])->setInc('gddb',$gdqy);

    //                             //插入记录
    //                             $data=[];
    //                             $data['rmb'] = $gdqy;
    //                             $data['uid'] = $xian['id'];
    //                             $data['type'] = 16;
    //                             $data['typeStr'] = '店铺租金';
    //                             $data['ctime'] = time();
    //                             $data['status'] = 1;
    //                             $bill = Db::table('bill')->insert($data);


    //                         }

    //                         if($shi){

    //                             //比例
    //                             $bishi=$gdshi/$gddbmax;

    //                             $gdqy=intval(floor($gddb*100*$bishi))/100;

    //                             Db::name('quyu')->where('id',$shi['id'])->setInc('gddb',$gdqy);

    //                             //插入记录
    //                             $data=[];
    //                             $data['rmb'] = $gdqy;
    //                             $data['uid'] = $shi['id'];
    //                             $data['type'] = 16;
    //                             $data['typeStr'] = '店铺租金';
    //                             $data['ctime'] = time();
    //                             $data['status'] = 1;
    //                             $bill = Db::table('bill')->insert($data);

    //                         }

    //                         if($sheng){

    //                             //比例
    //                             $bisheng=$gdsheng/$gddbmax;

    //                             $gdqy=intval(floor($gddb*100*$bisheng))/100;

    //                             Db::name('quyu')->where('id',$sheng['id'])->setInc('gddb',$gdqy);

    //                             //插入记录
    //                             $data=[];
    //                             $data['rmb'] = $gdqy;
    //                             $data['uid'] = $sheng['id'];
    //                             $data['type'] = 16;
    //                             $data['typeStr'] = '店铺租金';
    //                             $data['ctime'] = time();
    //                             $data['status'] = 1;
    //                             $bill = Db::table('bill')->insert($data);

    //                         }


    //                     }

    //                 }

    //                 // 提交事务
    //                 Db::commit();    

    //                 return json(['data'=>'','code'=>1,'msg'=>'提现成功']);

    //             } catch (\Exception $e) {
    //                 // 回滚事务
    //                 Db::rollback();

    //                 return json(['data'=>'','code'=>0,'msg'=>'提现失败']);
    //             }


    //         }
            
    //     }
    // }



    public function kuaijie(){

        $id =input('id');
        $status = input('status');
        $text = input('text');


        $drawal = Db::name('drawal')->field('id,uid,num,kaihu')->where(['id'=>$id,'status'=>0])->find();

        if(!$drawal){
            return $this->error('修改失败');
        }else{

            $uid=$drawal['uid'];
            $num=$drawal['num'];

            $yhsx = 5;
            $gdsx = $num * 0.1;
            $gdfx = $num * 0.1;
            $gddb = $num * 0.05;
            $gdtx = $num * 0.8-5;
            $sjtx = (intval(floor(($num * 100) * 0.8015))-300)/100;
            $gddbmax = 0;

            if($status == 2){
             
                // 启动事务
                Db::startTrans();
                try{

                    $data=[];
                    $data['status'] = $status;
                    $data['content'] = $text;
                    Db::name('drawal')->where("id",$id)->update($data);

                    Db::name('mini_users')->where("id",$uid)->setInc('keti',$drawal['num']);


                    //插入记录
                    $data=[];
                    $data['rmb'] = $drawal['num'];
                    $data['uid'] = $drawal['uid'];
                    $data['type'] = 22;
                    $data['typeStr'] = '提现驳回';
                    $data['ctime'] = time();
                    $data['status'] = 2;
                    $bill = Db::name('bill')->insert($data);


                    // 提交事务
                    Db::commit();    

                    return json(['data'=>'','code'=>1,'msg'=>'驳回成功']);

                } catch (\Exception $e) {
                    // 回滚事务
                    Db::rollback();

                    return json(['data'=>'','code'=>0,'msg'=>'驳回失败']);
                }
            

            }elseif($status == 1){


                if($drawal['kaihu']!='快捷'){

                    return json(['data'=>'','code'=>1,'msg'=>'非快捷支付']);
                    exit;

                }


                // 启动事务
                Db::startTrans();
                try{


                    $bankinfo = DB::name('banks')->where('uid',$drawal['uid'])->find();

                    if($bankinfo['status']==1&&(!empty($bankinfo['custid']))){

                        $kaihuinfo = DB::name('kaihu')->where('custid',$bankinfo['custid'])->find();
                        if($kaihuinfo){

                            Db::name('drawal')->where("id",$id)->setField('issq',1);

                        }else{

                            return json(['data'=>'','code'=>0,'msg'=>'开户错误']);
                            exit;

                        }

                    }else{

                        return json(['data'=>'','code'=>0,'msg'=>'绑定银行卡错误']);
                        exit;

                    }

                    // 提交事务
                    Db::commit();    


                    //转账

                    $order_id='40'.date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);

                    $pay = new \chinaPnrPay\ChinaPnrPay();
                    $res = $pay->transfer($order_id, \chinaPnrPay\requests\TransferRequest::TRANSFER_TYPE_MER_TO_USER, '6666000004375171', '4618810', $kaihuinfo['custid'], $kaihuinfo['acctid'], $sjtx, $drawal['id'], null, 'https://www.psctmall.com/index/Cay/zhuannoyify');

                    if($res['success']==1){

                        Db::name('drawal')->where("id",$id)->setField('order_id',$order_id);

                    }else{

                        return json(['data'=>$res['data'],'code'=>0,'msg'=>$res['message']]);
                        exit;

                    }


                    //取现
                    $order_id='50'.date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);

                    $pay = new \chinaPnrPay\ChinaPnrPay();
                    $res = $pay->withdraw($bankinfo['custid'], $order_id, $sjtx, $bankinfo['card'], \chinaPnrPay\requests\WithdrawRequest::CASH_DEDUCT_TYPE_IN, null, null, \chinaPnrPay\requests\WithdrawRequest::FEE_OBJ_USER, null, \chinaPnrPay\requests\WithdrawRequest::CASH_TYPE_TO, $drawal['id'], null, 'https://www.psctmall.com/index/Cay/quxiannoyify');

                    if($res['success']==1){

                        Db::name('drawal')->where("id",$id)->setField('order_id',$order_id);

                    }else{

                        return json(['data'=>$res['data'],'code'=>0,'msg'=>$res['message']]);
                        exit;

                    }


                    return json(['data'=>'','code'=>1,'msg'=>'提现成功']);

                } catch (\Exception $e) {
                    // 回滚事务
                    Db::rollback();

                    return json(['data'=>'','code'=>0,'msg'=>'提现失败']);
                }


            }
            
        }
    }




    public function buqian(){

        $id=input("id");
        $drawal = Db::name('drawal')->field('id,uid,num,kaihu')->where(['id'=>$id])->find();

            $uid=$drawal['uid'];
            $num=$drawal['num'];


            $sjtx = (intval(floor(($num * 100) * 0.8015))-300)/100;

            // //转账

            $bankinfo = DB::name('banks')->where('uid',$drawal['uid'])->find();

            // $pay = new \chinaPnrPay\ChinaPnrPay();
            // $res = $pay->transfer(time(), \chinaPnrPay\requests\TransferRequest::TRANSFER_TYPE_MER_TO_USER, '6666000004375171', '4618810', $bankinfo['custid'], $bankinfo['acctid'], $sjtx, '12', null, 'https://www.psctmall.com/index/Cay/zhuannoyify');

            // if($res['success']==1){

            //     echo 'ok';


            // }else{

            //     return json(['data'=>$res['data'],'code'=>0,'msg'=>$res['message']]);
            //     exit;

            // }


            //取现

            $pay = new \chinaPnrPay\ChinaPnrPay();
            $res = $pay->withdraw($bankinfo['custid'], time(), $sjtx, $bankinfo['card'], \chinaPnrPay\requests\WithdrawRequest::CASH_DEDUCT_TYPE_IN, null, null, \chinaPnrPay\requests\WithdrawRequest::FEE_OBJ_USER, null, \chinaPnrPay\requests\WithdrawRequest::CASH_TYPE_TO, $drawal['id'], null, 'https://www.psctmall.com/index/Cay/quxiannoyify');


            if($res['success']==1){

                echo 'ok';


            }else{

                return json(['data'=>$res['data'],'code'=>0,'msg'=>$res['message']]);
                exit;

            }

    }



}
