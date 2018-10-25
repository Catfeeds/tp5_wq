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

use app\common\controller\ControllerBase;

/**
 * 登录控制器
 */
class Login extends ControllerBase
{
    
    /**
     * 登录
     */
    public function login()
    {
        
        is_login() && $this->jump(RESULT_REDIRECT, '已登录则跳过登录页', url('index/index'));
        
        // 关闭布局
        $this->view->engine->layout(false);
        
        return $this->fetch('login');
    }
    
/**
     * 会员添加
     */
       public function member_add()
    {
        
        IS_POST && $this->jump($this->logicMember->memberAdd($this->param));
        $this->assign('cpzj',$this->feeratio['cpzj']);
        $this->assign('treeplace',$this->feeratio['treeplace']);

        
            $re_id=(int)input('param.RID');
            if(!(int)input('param.RID')){$re_id=1;}
            //$agent_uid=(int)input('param.agent_uid');
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
        $this->assign('rand',rand(1,999999));
        $this->assign('list',M('shop')->where('status>0 ')->select());
        $this->view->engine->layout(false);
        return $this->fetch();
    }
    



    /**
     * 登录处理
     */
    public function loginHandle($username = '', $password = '', $verify = '')
    {
        
        $this->jump($this->logicLogin->loginHandle($username, $password, $verify));
    }
    
    /**
     * 注销登录
     */
    public function logout()
    {
        
        $this->jump($this->logicLogin->logout());
    }
    
    /**
     * 清理缓存
     */
    public function clearCache()
    {
        
        $this->jump($this->logicLogin->clearCache());
    }
    
}
