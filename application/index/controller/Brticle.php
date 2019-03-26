<?php

namespace app\index\controller;

use think\Controller;

class Brticle extends Controller
{
    //
    public function index(){
        return '我是Brticle的index方法';
    }

    public function add(){
        return view();
        return '我是brticle的add方法';
    }

}
