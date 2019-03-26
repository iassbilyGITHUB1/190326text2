<?php

namespace app\common\model;

use think\Model;

class Users extends Model
{
    //
    public function article(){
        return $this->hasMany(Articles::class,'author','username');
    }
}
