<?php

namespace app\index\controller;

use app\common\model\Articles;
use app\common\model\Users;
use think\Controller;
use think\Request;

class Article extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
//        echo '我是index方法';
//        $articles=Articles::select();
        $articles=Articles::paginate(10);
//        halt($articles);
        return view('',compact('articles'));
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
//        echo '我是create方法';
        return view();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
//        halt(222);
        $post=$request->param();
//        $post['author']=session('username');
//        Articles::create($post);

        $uid=session('uid');
        $user=Users::find($uid);
        $user->article()->save($post);

        return $this->success('文章添加成功','/article');
//        halt($post);
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
        $article=Articles::find($id);
//        halt($id);
        return view('',compact('article'));
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
//        halt('369');
        $article=Articles::find($id);
//        $article->title=$request->param('title');
//        $article->content=$request->param('content');
//        $article->save();
//        Articles::where('id',$id)->update([
//            'title'=>$request->param('title'),
//            'content'=>$request->param('content'),
//        ]);
        $post=$request->param();
        $article->allowField(true)->save($post);
        return $this->success('文章编辑成功','/article');
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
//        halt($id);
//        Articles::find($id)->delete();
        Articles::destroy($id);
        return $this->success('删除成功','/article');
    }
}
