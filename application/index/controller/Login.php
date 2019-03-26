<?php

namespace app\Index\controller;

use think\captcha\Captcha;
use think\Controller;
use think\facade\Cache;
use think\Request;
use think\Validate;

class Login extends Controller
{
    //

    public function create(){
//        halt(Cache::get('name'));
        return view();
    }

    public function post(Request $request){
        $post=$request->post();
        $validate=Validate::make([
            'username'=>'require|min:3|max:30',
            'password'=>'require',
            'code'=>'require|captcha'
        ]);
        $status=$validate->check($post);
        if ($status){
            $user=db('users')->where('username',$post['username'])->where('password',md5($post['password']))->find();
//            halt($user);
            if ($user){
                session('uid',$user['id']);
                session('username',$user['username']);
                return $this->success('登录成功','/');
            }else{
                return $this->error('账号或密码错误');
            }
        }else{
            return $this->error($validate->getError());
        }
    }

    public function logout(){
        session(null);
        return $this->success('退出成功','/');
    }

    public function code(){
        $captcha=new Captcha();
//        $captcha->useZh=true;
        $captcha->codeSet='1234567890';
        $captcha->length=4;
        return $captcha->entry();
    }

}
