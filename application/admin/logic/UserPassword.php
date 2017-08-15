<?php
namespace app\admin\logic;

use think\controller;
use app\admin\model\User;
use think\Validate;
use app\admin\logic\UserLogin;

Class UserPassword  extends controller
{
    /**
     * 修改密码
     *
     * @param array  $data;
     */
    function  savePassword($data)
    {
        $user_name =  session('session_user.user_name');
        if(!$user_name) $this->redirect('Login/index');

        $vlidate  =  $this->validates($data);
        if ($vlidate) return $vlidate;

        $user_login = new UserLogin();
        $user = $user_login->getUser($user_name);
        if (!password_verify ($data['old_password'],$user['password'])) {
             return  json(['status'=>1,'msg'=>lang('lang_old_password_error')]);
        }

        $user->password =  password_hash($data['password'], PASSWORD_DEFAULT);    
        if(!$user->save()){

            return  json(['status'=>1,'msg'=>lang('lang_operation_defeated')]);
        }

        return  json(['status'=>0,'msg'=>lang('lang_operation_success')]);
    }



    //验证数据
    public function validates ($data)
    {
    
        $rule = [
            'password'  => 'require|confirm:password|max:25|token',
        ];
        $field = [
            'password'   => '密码',     
        ];
        $validate = new Validate($rule);
        $result   = $validate->check($data);
        if(!$result){
           return json(['status'=>1,'msg'=>$validate->getError()]);
        }
        return false;

    }


}