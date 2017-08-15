<?php
namespace app\admin\logic;

use think\controller;
use app\admin\model\User;
use think\Cache;
use think\Session;
use think\Validate;

Class UserLogin extends controller
{

    /**
     * 登录验证
     * @param array $data 请求数据
     * 
     */
    public   function  loginVerify($data)
    {
 
        //验证数据
        $validata = $this->validates($data);
        if($validata){
            return $validata;
        }   
        if (!$this->verifyLoginTime($data['user_name'])) {

            return json(['status'=>1,'msg'=>lang('lang_login_time')]);
        }
        
        //查看账号
        $user  =  $this->getUser($data['user_name']);
        if(!$user){
            return json(['status'=>1,'msg'=>lang('lang_account_disabled')]);
        }

        //验证密码
        if (!password_verify($data['password'],$user['password']) ){
            //增加失败次数
            Cache::set('login_name',$data['user_name'],3600*12);
            Cache::inc('login_time',1);
            return json(['status'=>1,'msg'=>lang('lang_account_error')]);
        }

        //清除登录失败信息并存入session
        Cache::rm('login_time'); 
        Cache::rm('login_name');
        Session::set('session_user',$user);

        return json(['status'=>0,'msg'=>lang('lang_login_success')]);

    }

    //验证数据
    public function validates ($data)
    {
    
        $rule = [
            'user_name'  => 'require|max:25|token',
            'password'   => 'require|max:18',
        ];
        $field = [
            'user_name'  => '账户',
            'password'   => '密码',     
        ];
        $validate = new Validate($rule);
        $result   = $validate->check($data);
        if(!$result){
           return json(['status'=>1,'msg'=>$validate->getError()]);
        }
        return false;

    }


    /**
     * 获取用户信息
     * 
     * @param string $user_name  用户名
     */
    public function getUser($user_name)
    {
        return User::where(['user_name'=>$user_name,'status'=>1])->find(); 
    }


    /**
     * 验证失败次数
     * 
     *@param string $user_name 用户名;
     */
    public function  verifyLoginTime ($user_name) 
    {

        if(Cache::get('login_user') == $user_name && Cache::get('login_time') == 5){
            User::where('user_name',$user_name)->update(['status'=>0]);
            return  false;
        }
        return true;
    }




}



