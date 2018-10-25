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

namespace app\index\controller;
use app\common\model\ShopCategory;
use app\admin\logic\Member;
use think\Db;
/**
 * 前端首页控制器
 */
class Index extends IndexBase
{
    
 // 首页
    public function kefu($cid = 0)
    {
        global $_W, $_GPC;
        // var_dump($_W);die;
        $where['uniacid'] = $_W['uniacid'];
        $list=Db::name('hcstep_kefu')->where($where)->order('id asc')->paginate(5);
       $this->assign('list',$list);
       return $this->fetch('kefu');
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
       return $this->fetch('kefu_post');
    }










    // 首页
    public function index($cid = 0)
    {


       // $this->success('d');
        // $this->assign('category', M('ShopCategory')->where('status=0')->select());
        // if($this->request->param()['category_id']<=0){
        // $where = $this->logicShop->getWhere($this->param);}else{
        // $where['category_id']=$this->request->param()['category_id'];}
        // $params['selling'] = 1;

        // $list= $this->logicShop->getShopList($where, 'a.*,m.nickname,c.name as category_name', 'a.create_time desc',6);
        // $this->assign('list', $list);
       //return $this->fetch('show');
    }
    



 public function show(){
        // $info = $this->logicShop->getShopInfo(['a.id' => $this->param['id']], 'a.*,m.nickname,c.name as category_name');
        // !empty($info) && $info['img_ids_array'] = str2arr($info['img_ids']);

        // $ordernum[0]=0;
        // session('member_info') &&$ordernum[0]=M('shop_car')->where('uid='.session('member_info')['id'])->count();
        // $this->assign('info', $info);
        // $this->assign('ordernum',$ordernum);
        return $this->display();
    }

 public function cart_add(){
     !session('member_info') && $this->redirect('admin/login/login');
    $this->jump($this->logicShop->car_add($this->param));
    }
/**
     * 会员添加
     */
    public function member_add()
    {
        
        $menus=new  Member;

        $index=100;//前台标记
    


        IS_POST && $this->jump($menus->memberAdd($this->param),$index);
        $this->assign('cpzj',$this->feeratio['cpzj']);
        $this->assign('treeplace',$this->feeratio['treeplace']);
        
            $re_id=(int)input('param.RID');
            $father_id=(int)input('param.FID');
            $treeplace=(int)input('param.TPL');
            for($i=0;$i<5;$i++){
                $TPL[$i] = '';
            }
            $TPL[$treeplace] = 'selected="selected"';
         
        $re_uid=M('member')->where('id='.$re_id)->find();
        $father_uid=M('member')->where('id='.$father_id)->find();
      
        $this->assign('father_uid',$father_uid['user_id']);
        $this->assign('re_uid',$re_uid['user_id']);
        $this->assign('TPL',$TPL);
        $this->assign('rand',rand(1,2099998889));
        return $this->fetch('member_add');
    }


  //首页产品
    public function indexjson(){

        //var_dump();
       $data =$this->logicShop->getShopList($where, 'a.*,m.nickname,c.name as category_name', 'a.create_time desc',$this->request->param()[page]);
        if($data){
            foreach($data as $v){
                    $v['url']='/index/index/show/id/'.$v['id'].'.html';
                    $v['cover']=M('picture')->where('id='.$v['cover_id'])->find()['path'];
                $rel[] = $v;
            }
            return json(['data'=>$rel,'code'=>1,'msg'=>'success']);
        }else{
            return json(['data'=>'','code'=>0,'msg'=>'没有数据']);
        }

    }

























    // 详情
    public function details($id = 0)
    {
        
        $where = [];
        
        !empty((int)$id) && $where['a.id'] = $id;
        
        $data = $this->logicArticle->getArticleInfo($where);
        
        $data['content'] = html_entity_decode($data['content']);
        
        $this->assign('article_info', $data);
        
        $this->assign('category_list', $this->logicArticle->getArticleCategoryList([], true, 'create_time asc', false));
        
        return $this->fetch('details');
    }
}
