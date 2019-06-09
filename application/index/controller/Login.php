<?php


namespace app\index\controller;

use think\Controller;
use think\Db;

class Login extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
    public function loginCheck()
    {
        $name = input('post.username');
        $password = input('post.password');
        if (Db::table('admin')->where('admin_name',$name)->select())
        {
            if (Db::table('admin')->where('admin_name',$name)->where('admin_password',$password)->select())
            {
                $this->success('登陆成功','../index');
            }else
                {
                    $this->error('密码错误');
                }
        }else{
            $this->error('用户不存在');
        }
    }
}