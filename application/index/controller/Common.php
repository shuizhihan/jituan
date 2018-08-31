<?php
namespace app\index\controller;
use think\Controller;
class Common extends Controller
{
	public $confTemp;
    public $confs;
    public function _initialize(){
    	$tmpFloder=$this->getTemp();
    	$this->confTemp=config('template.view_path').$tmpFloder;//获取当前配置项的自定义模板文件夹名称
    	$temp_src=config('view_replace_str.temp_src').$tmpFloder;
        $cateRes=$this->getCate(false);//顶部导航
        $botCateRes=$this->getCate(true);//底部导航
        $this->confs=$this->getConf();
        // dump($cateRes); die;
        
    	$this->assign([
    		'temp'=>$this->confTemp,
    		'temp_src'=>$temp_src,
            'cateRes'=>$cateRes,
            'botCateRes'=>$botCateRes,
            'confs'=>$this->confs,
    		]);
    }
    public function getCate($bottom=false){
        if($bottom){//底部导航
          $cateRes=db('cate')->where(array('pid'=>0,'status'=>1,'bottom_nav'=>1))->select();  
        }else{//顶部导航
          $cateRes=db('cate')->where(array('pid'=>0,'status'=>1))->order('sort desc')->select();  
        }
        foreach ($cateRes as $k => $v) {
            $cateRes[$k]['children']=db('cate')->where(array('pid'=>$v['id'],'status'=>1))->order('sort desc')->select();
        }
        return $cateRes;
    }
    public function getTemp(){
    	$confTemp=db('conf')->field('value')->where(array('ename'=>'temp'))->find();
    	return $confTemp['value'];
    }
    //获取配置项并重新组装
    public function getConf(){
        $confRes=array();
        $_confRes=db('conf')->field('ename,value')->select();
        foreach ($_confRes as $k => $v) {
            $confRes[$v['ename']]=$v['value'];
        }
        return $confRes;
    }

    /**
    * 创建静态页面
    * @access protected
    * @htmlfile 生成的静态文件名称
    * @htmlpath 生成的静态文件路径
    * @param string $templateFile 指定要调用的模板文件
    * 默认为空 由系统自动定位模板文件
    * @return string
    *
    */
    public function buildHtml($htmlfile = '', $htmlpath = '', $templateFile = '')
    {
    $content = $this->fetch($templateFile);
    //$htmlpath = !empty($htmlpath) ? $htmlpath : './appTemplate/';
    $htmlfile = $htmlpath . $htmlfile;

    $File = new \think\template\driver\File();
    $File->write($htmlfile, $content);
    return $content;
    }
}
