<?php
namespace app\index\controller;
class Article extends Common
{
    public function index($aid)
    {
        $articleid = $aid;
         if(file_exists(HTML_PATH.'article_'.$articleid.'.htm')){//file_exists检查文件是否存在 if(time()-filemtime(HTML_PATH.'realindex.html')<=600)//filemtime() 函数返回文件内容上次的修改时间。
            /*if (time()-filemtime(HTML_PATH.'article_'.$articleid.'.htm')<600) {
                return $this->fetch(HTML_PATH.'article_'.$articleid.'.htm');
            } else {
                return $this->createIndex($articleid);
            }*/
            return $this->fetch(HTML_PATH.'article_'.$articleid.'.htm');
        }else{
            return $this->createIndex($articleid);//调用(将首页生成为一个静态页面)的函数
        }
    	
    }

     public function createIndex($aid)
    {
        $arts=db('archives')->find($aid);
        //var_dump($arts);
        $cid=$arts['cate_id'];
        $cates=db('cate')->find($cid);
        //获取对应的附加表的名称
        $models=db('model')->field('table_name')->find($cates['model_id']);
        $addTableName=$models['table_name'];
        $arts=db('archives')->alias('a')->join("$addTableName b",'a.id=b.aid')->find($aid);
        $artTmp=$cates['article_tmp'];
        $tempSrc=$this->confTemp.'/'.$artTmp;
        // echo $tempSrc; di
        // e;
        //顶级栏目id获取
        $topcid=model('cate')->getTopId($cid);
        $topCates=db('cate')->find($topcid);//顶级栏目信息
        //查询二级栏目
        $sonCateRes=db('cate')->where(array('pid'=>$topcid))->where(array('status'=>1))->select();//根据主栏目id获取当前主栏目下所有二级栏目
        //面包屑
        $pos=model('cate')->position($cid);


        //查找上一篇下一篇
        /*
         查找出全部id，组合一个数组，根据索引去判断上一个或下一个是否存在
         */
        $where['cate_id'] = $cid; //查询条件之所属栏目
        //$where['pass'] = 'yes';    //查询条件之是否显示
        $all_id = db('archives')->field('id')->where($where)->order('time desc')->select();
         
        $id_array = array();

        foreach ($all_id as $key => $value) {
            if($value['id'] == $aid){
                //定位当前
                //获取下一篇
                if(isset($all_id[$key+1])){
                    $next_id = $all_id[$key+1]['id'];
                }else{
                    $next_id = '';
                }
                //获取上一篇
                if(isset($all_id[$key-1])){
                    $pre_id = $all_id[$key-1]['id'];
                }else{
                    $pre_id = '';
                }
            }
        }
         
        if(isset($next_id)){
            $next_info = db('archives')->field('id,title')->where('id',$next_id)->find();
        }else{
            $next_info = '';
        }
         
        if( isset($pre_id)){
            $pre_info = db('archives')->field('id,title')->where('id',$pre_id)->find();
        }else{
            $pre_info = '';
        }

        $this->assign("next_info",$next_info);
        $this->assign("pre_info",$pre_info);
         /*
         相关新闻列表内容
          */
        $xiangguan = db('archives')->field(array('title','id','litpic'))->where('cate_id',$cid)->order('time desc')->select();
        
        $this->assign("xiangguan",$xiangguan);

        $this->assign([
            'arts'=>$arts,
            'topcid'=>$topcid,
            'cid'=>$cid,
            'topCates'=>$topCates,
            'sonCateRes'=>$sonCateRes,
            'curCates'=>$cates,
            'pos'=>$pos,
            'xiangguan',$xiangguan,
            ]);
        $this->buildHtml("article_".$aid.".htm",HTML_PATH,$tempSrc);
        return $this->fetch($tempSrc);
    }
}
