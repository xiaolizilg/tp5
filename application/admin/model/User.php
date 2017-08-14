<?php

namespace app\admin\model;

use think\Model;
use think\Validate;

class User extends Model
{
	//指定主键
    protected $pk = 'user_id';

    // 指定数据表
    protected $table = 't_users';


    /**
     * 用户登录
     *  
     *@param array $post  用户数据
     *
     */
    public function login($post)
    {

    	$validate = new Validate($rules);



    }
}
