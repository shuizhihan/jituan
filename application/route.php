<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// think\Route::rule('路由表达式','路由地址','请求类型','路由参数（数组）','变量规则（数组）');
// think\Route::rule('demo/:name/:age/[:language]/:adress','index/Index/demo','GET',['ext'=>'html'],['name'=>'\w+','age'=>'\w{1,2}']);
// think\Route::rule('demo2','index/Index/demo2');
// think\Route::get('demo3','http://www.tongpankt.com');
// think\Route::get('demo3','index/Index/demo3');
// think\Route::get('/',function(){ echo '临时维护，谢谢支持，晚上10点正常访问！'; });
    
    think\Route::group('demo',[
            ':num'=>'demo1',
            ':str'=>'demo2',
            ':bool'=>'demo3',
        ],[
        'method'=>'get',
        'prefix'=>'index/Index/'
        ],[
        'num'=>'\d{2,4}',
        'str'=>'[a-zA-Z]+','bool'=>'0|1'
        ]);

    // think\Route::group('demo',function(){
    //     think\Route::get(':num','index/Index/demo1',[],['num'=>'\d{2,4}']);
    //     think\Route::get(':str','index/Index/demo2',[],['str'=>'[a-zA-Z]+']);
    //     think\Route::get(':bool','index/Index/demo3',[],['str'=>'0|1']);
    // });

    think\Route::alias('user','index/User',['ext'=>'html','except'=>'add,del']);
return [
    // '__pattern__' => [
    //     'name' => '\d+',
    // ],
    // '[hello]'     => [
    //     ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
    //     ':name' => ['index/hello', ['method' => 'post']],
    // ],
	
	// 'demo2'=>'index/Index/demo2',
	// 'demo4/:name/:age'=>['index/Index/demo4',['method'=>'get','ext'=>'asp'],['age'=>'\d+']],
	// 'demo5/:name/:height'=>['index/Index/demo5',['method'=>'get','ext'=>'asp'],['height'=>'\d+']],
	// 'demo6/:name'=>['index/Index/demo6',['method'=>'get','ext'=>'asp'],['age'=>'\d+']],

    // 'demo/:num'=>['index/Index/demo1',['method'=>'get'],['num'=>'\d{2,4}']],
    // 'demo/:str'=>['index/Index/demo2',['method'=>'get'],['str'=>'[a-zA-Z]+']],
    // 'demo/:bool'=>['index/Index/demo3',['method'=>'get'],['str'=>'0|1']],

    // '[demo]'=>[
    //     ':num'=>['index/Index/demo1',['method'=>'get'],['num'=>'\d{2,4}']],
    //     ':str'=>['index/Index/demo2',['method'=>'get'],['str'=>'[a-zA-Z]+']],
    //     ':bool'=>['index/Index/demo3',['method'=>'get'],['str'=>'0|1']],
    // ],

    // 'add'=>['index/User/add',['method'=>'get']],
    // '__alias__'=>[
    //     'user'=>'index/User',
    // ],

];
