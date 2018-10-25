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

namespace app\admin\validate;

/**
 * 会员验证器
 */
class Member extends AdminBase
{
    
    // 验证规则
    protected $rule =   [
        
        'username'  => 'require|unique:member',
        'password'  => 'require|confirm|length:6,20',
        'password2' => 'require|confirm|length:6,20',
      //  'email'   => 'require|email|unique:member',
        'nickname'  => 'require',
        //'mobile'  => 'unique:member',
         'agent_uid'=> 'require|agent_uid',
         're_uid'   => 'require|re_uid',
        'father_uid'=> 'require|father_uid',
         'verify'   => 'require|captcha',

  
    ];
    
    // 验证提示
    protected $message  =   [
        
        'username.require'    => '用户名不能为空',
        'username.unique'     => '用户名已存在',
        'nickname.require'    => '昵称不能为空',
        'password.require'    => '密码不能为空',
        'password.confirm'    => '两次密码不一致',
        'password.length'     => '密码长度为6-20字符',
        'password2.require'    => '安全密码不能为空',
        'password2.confirm'    => '两次安全密码不一致',
        'password2.length'     => '安全密码长度为6-20字符',
        'agent_uid.require'      =>  '报单中心不能为空',
        'father_uid.require'   =>  '接点人不能为空',
        're_uid.require'      =>  '推荐人不能为空',
        'email.require'       => '邮箱不能为空',
        'email.email'         => '邮箱格式不正确',
        'email.unique'        => '邮箱已存在',
        'mobile.unique'       => '手机号已存在'
    ];

    // 应用场景
    protected $scene = [
        
      //  'add'   =>  ['username','password','password2','agent_uid','re_uid','father_uid','verify'],
       // 'edit'  =>  ['username','nickname','email','mobile'],
    ];

 protected function father_uid($value, $rule, $data = []){
    $father_uid=M('member')->where('father_uid="'.$data['father_uid'].'" and treeplace='.$data['TPL'])->find();
     $father_id=M('member')->where('user_id="'.$data['father_uid'].'"')->find();
     //var_dump($father_id);
        if($father_uid){
          return '该区已有会员';
        }
        if($father_id['is_pay']<=0){
          return '接点人不存在或未激活';
        }
       return true;
    }

 protected function re_uid($value, $rule, $data = []){
    $re_uid=M('member')->where('user_id="'.$data['re_uid'].'"')->find();
        if($re_uid['is_pay']<=0){
          return '推荐人不存在或未激活';
        }
       return true;
    }

protected function agent_uid($value, $rule, $data = []){
    $agent_uid=M('member')->where('user_id="'.$data['agent_uid'].'"')->find();
        if($agent_uid['is_pay']<=0){
          return '报单中心不存在或未激活';
        }
        if($agent_uid['is_agent']<=1){
          return '不是报单中心';
        }
       return true;
    }














}
