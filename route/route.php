<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//halt('123');

Route::get('think', function () {
    return 'hello,aaaThinkPHP5!';
});

Route::get('hello/:name', 'index/hello');

Route::get('add','index/brticle/add');
Route::resource('article','index/Article');

return [

];
