<?php
namespace app\admin\logic;

use think\controller;
use app\admin\model\User as Users;
use think\Cache;
use think\Session;

Class User extends controller
{

	/**
	 * 登录验证
	 * @param $data array  请求数据
	 *
	 */
	public   function  loginVerify($data)
	{
		//Cache::rm('login_time'); 
		//验证数据
		$this->validates($data);
		if (!$this->verifyLoginTime($data['user_name'])) {

			echo '您登录失败次数太多账号已被禁用';	die;
		}
		
		//查看账号
		$user  =  $this->getUser($data['user_name']);
		if(!$user){
			echo '该用户不存在或被禁用'; die;
		}

		//验证密码
		if (!password_verify($data['password'],$user['password']) ){

			echo '用户名或密码错误'; die;
		}

		//清除登录失败次数
		Cache::rm('login_time'); 
		Session::set('session_user',$user);

		return true; die;

	}

	//验证数据
	public function validates ($data)
	{
		//dd($data);
		$validate = new \think\Validate([
		    'user_name'  => 'require|max:25',
		    'password' => 'require|max:25'
		]);
		if (!$validate->check($data)) {
		    echo  $validate->getError(); die;
		}

	}



	//获取用户
	public function getUser($user_name)
	{

		return Users::where(['user_name'=>$user_name,'status'=>1])->find(); 

	}


	/**
	 * 验证失败次数
	 * 
	 *@param string $user_name 用户名;
	 */

	public function  verifyLoginTime ($user_name) 
	{

		if(Cache::get('login_time') == 5){
			Users::where('user_name',$user_name)->update(['status'=>0]);
			return  false; die;
		}

		Cache::inc('login_time',1);
		return true;  die;
	}




}

