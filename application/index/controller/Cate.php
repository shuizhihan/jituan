<?php
namespace app\index\controller;
class Cate extends Common
{
    public function index($cid)
    {
        $cateid = $cid;
         if(file_exists(HTML_PATH.'cate_'.$cateid.'.htm')){//file_exists检查文件是否存在 if(time()-filemtime(HTML_PATH.'realindex.html')<=600)//filemtime() 函数返回文件内容上次的修改时间。
            /*if (time()-filemtime(HTML_PATH.'cate_'.$cateid.'.htm')<600) {
                return $this->fetch(HTML_PATH.'cate_'.$cateid.'.htm');
            } else {
                return $this->createIndex($cateid);
            }*/
             return $this->fetch(HTML_PATH.'cate_'.$cateid.'.htm');
        }else{
            return $this->createIndex($cateid);//调用(将首页生成为一个静态页面)的函数
        }
    }
    public function search()
    {
        $cid = 5;
        $pare = input('post.q');
       
        $cates=db('cate')->find($cid);//查询当前栏目信息
        //判断指定栏目的跳转
        if(!$cates['jump_id']==0){
            $cid=$cates['jump_id'];
            $cates=db('cate')->find($cid);//查询跳转栏目信息
        }
        //获取对应的附加表的名称
        $models=db('model')->field('table_name')->find($cates['model_id']);
        $addTableName=$models['table_name'];
        //获取当前栏目以及其子栏目的id
        $sid=model('admin/cate')->childrenids($cid);
        $sid[]=intval($cid);
        $cateTmp='search.htm';//$cates['list_tmp'];
        $tempSrc=$this->confTemp.'/'.$cateTmp;
       // var_dump($cateTmp);
        //调用文章
        $map['cate_id']=array('in',$sid);

        if ($pare) {
             $map['title']=array('like','%'.$pare.'%');
        }
       
        //要求上级栏目和他对应的子栏目必须使用同一个模型
        $artRes=db('archives')->alias('a')->where($map)->join("$addTableName b",'a.id=b.aid')->order('a.id desc')->paginate(8);
        /*$list = $artRes->toArray();
        foreach ($list['data'] as $k => $v) {
            $img = $v['litpic'];
            $list['data'][$k]['litpic'] = str_replace('\\', '/', $img);
        }

        var_dump($list);*/
        //顶级栏目id获取
        $topcid=model('cate')->getTopId($cid);
        $topCates=db('cate')->find($topcid);//顶级栏目信息
        //var_dump($topCates);
        //查询二级栏目
        $sonCateRes=db('cate')->where(array('pid'=>$topcid))->where(array('status'=>1))->select();
        
        //根据主栏目id获取当前主栏目下所有二级栏目
        //面包屑
        $pos=model('cate')->position($cid);
        //var_dump($pos);
       
        $this->assign([
            'artRes'=>$artRes,
            'topcid'=>$topcid,
            'cid'=>$cid,
            'topCates'=>$topCates,
            'sonCateRes'=>$sonCateRes,
            'pos'=>$pos,
            'pare'=>$pare,
            ]);

        return $this->fetch($tempSrc);

    }

     public function createIndex($cid)
    {
        $cates=db('cate')->find($cid);//查询当前栏目信息
        //判断指定栏目的跳转
        if(!$cates['jump_id']==0){
            $cid=$cates['jump_id'];
            $cates=db('cate')->find($cid);//查询跳转栏目信息
        }
        //获取对应的附加表的名称
        $models=db('model')->field('table_name')->find($cates['model_id']);
        $addTableName=$models['table_name'];
        //获取当前栏目以及其子栏目的id
        $sid=model('admin/cate')->childrenids($cid);
        $sid[]=intval($cid);
        $cateTmp=$cates['list_tmp'];
        $tempSrc=$this->confTemp.'/'.$cateTmp;
        //调用文章
        $map['cate_id']=array('in',$sid);
        //要求上级栏目和他对应的子栏目必须使用同一个模型
        $artRes=db('archives')->alias('a')->where($map)->join("$addTableName b",'a.id=b.aid')->order('a.id desc')->paginate(8);
        //print_r($artRes);
        //顶级栏目id获取
        $topcid=model('cate')->getTopId($cid);
        $topCates=db('cate')->find($topcid);//顶级栏目信息
        //var_dump($topCates);
        //查询二级栏目
        $sonCateRes=db('cate')->where(array('pid'=>$topcid))->where(array('status'=>1))->select();
        //var_dump($sonCateRes);
        //根据主栏目id获取当前主栏目下所有二级栏目
        //面包屑
        $pos=model('cate')->position($cid);
        //var_dump($pos);
        
        $this->assign([
            'artRes'=>$artRes,
            'topcid'=>$topcid,
            'cid'=>$cid,
            'topCates'=>$topCates,
            'sonCateRes'=>$sonCateRes,
            'pos'=>$pos,
            ]);
        $this->buildHtml("cate_".$cid.".htm",HTML_PATH,$tempSrc);
        return $this->fetch($tempSrc);
    }
}
