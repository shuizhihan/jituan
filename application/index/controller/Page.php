<?php
namespace app\index\controller;
class Page extends Common
{
    public function index($cid)
    {
        $pageid = $cid;
         if(file_exists(HTML_PATH.'page_'.$pageid.'.htm')){//file_exists检查文件是否存在 if(time()-filemtime(HTML_PATH.'realindex.html')<=600)//filemtime() 函数返回文件内容上次的修改时间。
           /* if (time()-filemtime(HTML_PATH.'page_'.$pageid.'.htm')<600) {
                return $this->fetch(HTML_PATH.'page_'.$pageid.'.htm');
            } else {
                return $this->createIndex($pageid);
            }*/
            return $this->fetch(HTML_PATH.'page_'.$pageid.'.htm');
        }else{
            return $this->createIndex($pageid);//调用(将首页生成为一个静态页面)的函数
        }
    	
    }
     public function createIndex($cid)
    {
        $cates=db('cate')->find($cid);//查询当前栏目信息
        //判断指定栏目的跳转
        if(!$cates['jump_id']==0){
            $cid=$cates['jump_id'];
            $cates=db('cate')->find($cid);//查询跳转栏目信息
        }
        $cateTmp=$cates['index_tmp'];//获取当前栏目加载的模板名称
        $tempSrc=$this->confTemp.'/'.$cateTmp;//组装模板路径方面下面加载
        //echo $tempSrc; die;
        $topcid=model('cate')->getTopId($cid);
        $topCates=db('cate')->find($topcid);//顶级栏目信息
        $sonCateRes=db('cate')->where(array('pid'=>$topcid))->where(array('status'=>1))->select();
        //var_dump($sonCateRes);
        //根据主栏目id获取当前主栏目下所有二级栏目
        //var_dump($cates);
        //面包屑
        $pos=model('cate')->position($cid);
        // dump($pos); die;
        $this->assign([
            'cates'=>$cates,
            'topcid'=>$topcid,//当前栏目顶级栏目的id，用户顶级栏目的高亮显示
            'cid'=>$cid,//当前栏目的id,用于判断当前左侧子栏目高亮
            'topCates'=>$topCates,
            'sonCateRes'=>$sonCateRes,
            'pos'=>$pos,
            ]);
        $this->buildHtml("page_".$cid.".htm",HTML_PATH,$tempSrc);
        return $this->fetch($tempSrc);
    }


}
