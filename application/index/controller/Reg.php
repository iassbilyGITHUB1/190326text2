<?php

namespace app\Index\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Validate;

class Reg extends Controller
{
    //

    public function create(){
        return view();
    }

    public function post(Request $request){
        $post=$request->post();
//        halt($post['username']);
        $validate=Validate::make([
            'username'=>'require|min:3|max:30',
            'nick'=>'require',
            'password'=>'require|confirm',
//            'password_confirm'=>'require',
        ]);
        $status=$validate->check($post);
        if ($status){
            $result=Db::table('users')->insert([
                'username'=>$post['username'],
                'nick'=>$post['nick'],
                'password'=>md5($post['password']),
            ]);
            if ($result){
                return $this->success('注册成功，请登录','/');
            }else{
                return $this->error('注册失败','/');
            }

//            halt($result);
        }else{
//            halt($validate->getError());
            return $this->error($validate->getError());
        }
//        halt($status);
    }

}
