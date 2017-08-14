<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Session;

class Base extends Controller
{


    public function _initialize()
    {
        self::isLogin();
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
    }


    //登录验证
    public function isLogin()
    {

          $session_user =  Session::has('session_user')? Session::get('session_user'):'';
          if(!$session_user){
                $this->redirect('login/index');
          }

          return $session_user;

    }

    
}
