<?php

namespace app\admin\controller;

use think\Request;
use app\admin\controller\Base;
use app\admin\logic\User;

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
            return json(['msg'=>'非法操作','code'=>'200']);
        }
        $user  = new User();
        $user->loginVerify(input('post.'));
        $this->success('登录成功', 'index/index');

    }

    //退出登录
    public function logout()
    {
        session(null);
        $this->redirect('login/index');   
    }

   
}
