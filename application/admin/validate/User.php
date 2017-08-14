<?php
namespace app\admin\validate;

use think\Validate;

class User extends Validate
{
    protected $rule =   [
      	'user_name'  =>  'require |max:25|token',
        'password'   =>  'require |max:25', 
    ];
    
    protected $message  =   [
        'name.require' => '用户名不能为空',
        'name.max'     => '名称最多不能超过25个字符',
        'password.require'   => '密码不能为空',
        'password.max'  => '密码不能大于25个字符',   
    ];
    
}