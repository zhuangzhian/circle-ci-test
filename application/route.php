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

use think\route;
Route::rule('admin','index/Index/index');
Route::rule('test','index/Index/test');
Route::rule('login','index/Login/index');
Route::rule('welcome','index/Welcome/welcome');
Route::rule('room','index/Room/index');
Route::rule('loginCheck','index/Login/loginCheck');


Route::any([
    'staff'=>'index/Staff/index',
    'staff_add'=>'index/Staff/staff_add',
    'staff_add_check'=>'index/Staff/staff_add_check',
    'staff_query/:id'=>'index/Staff/staff_query',
    'staff_delete'=>'index/Staff/staff_delete',
    'staff_query/:id'=>'index/Staff/staff_query',


]);