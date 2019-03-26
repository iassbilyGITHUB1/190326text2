<?php

use think\migration\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {

        db('users')->insert(['username'=>'yonghu1','password'=>md5('admin888'),'nick'=>'nickyonghu1']);
        db('users')->insert(['username'=>'yonghu2','password'=>md5('admin888')]);
    }
}