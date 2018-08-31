<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use auth\Auth;
class Common extends Controller
{
  public $config;

  public function _initialize(){
    if(!session('uname')){
            $this->error('请先登录系统！','Login/index');
        }
     $request=Request::instance();
     $module=$request->module();
     $con=$request->controller();
     $action=$request->action();
     $name=$module.'/'.$con.'/'.$action;//组合规则name
     $this->assign([
      'con'=>$con,
      'name'=>$name,
      ]);
     $this->getConf();
     // $auth=new Auth();
     // // 菜单
     // $group=$auth->getGroups(session('id'));
     // $rules=explode(',', $group[0]['rules']);
     // $menu=array();
     // $map['pid']=['=',0];
     // $map['show']=['=',1];
     // $map['id']=['in',$rules];
     // $_map['id']=['in',$rules];
     // $menu=db('authRule')->where($map)->select();
     // foreach ($menu as $k => $v) {
     //   $menu[$k]['children']=db('authRule')->where($_map)->where(array('pid'=>$v['id'],'show'=>1))->select();
     //   foreach ($menu[$k]['children'] as $k1 => $v1) {
     //     $menu[$k]['children'][$k1]['children']=db('authRule')->where($_map)->where(array('pid'=>$v1['id'],'show'=>1))->select();
     //   }
     // }
     // // print_r($menu); die;
     // $this->assign([
     //  'menu'=>$menu,
     //  ]);
     // end菜单
     // if(!$auth->check($name,session('id'))){
     //  $this->error('没有该操作权限！');
     // }
     // dump($this->config); die;
  }


  public function getConf(){
  	$confRes=array();
  	$_confRes=db('conf')->field('ename,value')->select();
  	foreach ($_confRes as $v) {
  		$confRes[$v['ename']]=$v['value'];
  	}
  	$this->config=$confRes;
  }

	
}
