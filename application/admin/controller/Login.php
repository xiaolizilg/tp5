<?php

namespace app\admin\controller;

use think\Request;
use app\admin\controller\Base;
use app\admin\logic\UserLogin;
use app\admin\logic\UserPassword;

class Login extends Base
{


    protected $userMel;

    //初始化操作
    public function _initialize()
    {
        $this->userMel = model('user');
    }


    public function index(){
        
        return view('login');

    }


    // 登录
    public function login()
    {
       
        if (!Request::instance()->isPost()){
            return json(['msg'=>lang('lang_request_error'),'status'=>'1']);
        }
        $user_login  = new UserLogin();
        return  $user_login->loginVerify(input('post.'));
    }

    //退出登录
    public function logout()
    {
        session(null);
        $this->redirect('login/index');   
    }


    //修改密码
    public   function  password ()
    {   
        if(!Request::instance()->isPost()){
            return json(['msg'=>lang('lang_request_error'),'status'=>'1']);  
        }

        $user_password  = new UserPassword();
        return  $user_password->savePassword(input('post.'));
    }

   
}
