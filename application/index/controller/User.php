<?php

namespace app\Index\controller;

use app\common\model\Users;
use think\Controller;
use think\Request;

class User extends Controller
{
    //
    public function index(){
        $user=Users::find(3);
        $articles=$user->article;
        halt($articles);
    }


    public function delete(Request $request){
        $id=$request->param('id');
//        halt($id);
        $user=Users::find($id);
//        halt($user->article()->delete());
        $user->article()->delete();
        $user->delete();
        return $this->success('用户和文章删除成功','/article');
    }

}
