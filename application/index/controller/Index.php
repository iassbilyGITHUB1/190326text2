<?php
namespace app\index\controller;

use app\common\model\Users;
use think\Db;
use think\facade\Cache;
use think\facade\Session;



class Index
{
    public function index()
    {
        Session::set('name','我是name的session值');
        Session::set('name2','我是name2的session值');
        Session::set('name3','我是name3的session值');
//        Session::delete('name3');
//        Session::clear();
//        Session::pull('name2');
//        session('name',null);
//        session(null);
//        halt(Session::get()) ;

//        Cache::set('name','我是name的cache值');
        \cache('name2','我是name2的cache值');
//        \cache('name2','我是name2的cache值',5);
//        \cache('name2',null);
//        \cache(null);这个方法不好使根本就清不掉
//        Cache::clear();
//        Cache::set('name','我是name的cache值',5);
//        Cache::rm('name');
//        Cache::pull('name');
//        halt(Cache::get('name2'));
//        halt(\cache('name2'));

//        var_dump(session('uid'));
//        $user=[
//            [
//            'id'=>1,
//            'name'=>'tp1',
//            'niname'=>'tpnickname'
//            ],
//            [
//            'id'=>2,
//            'name'=>'tp2',
//            'niname'=>'tpnickname'
//            ],
//            [
//            'id'=>3,
//            'name'=>'tp3',
//            'niname'=>'tpnickname'
//            ]
//        ];
//        $user=Users::select();
//        $user=Users::find(1);
//        $user=Users::where('nick','=','nick1')->select();
//        $user=Db::table('users')->select();
//        助手函数
        $user=\db('users')->select();
//        halt($user);

//        halt(compact('user'));
        return view('',compact('user'));
//        halt('我是abc');
        echo '<a href="/index/brticle/index">跳转</a>';
        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p> ThinkPHP V5.1<br/><span style="font-size:30px">12载初心不改（2006-2018） - 你值得信赖的PHP框架</span></p></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="eab4b9f840753f8e7"></think>';
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }

    public function nee(){
        halt('我是nee方法');
    }

}
