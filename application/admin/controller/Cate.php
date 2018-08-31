<?php
namespace app\admin\controller;
class Cate extends Common
{
	

    public function lst()
    {   
        //获取前缀
        $prefix=config('database.prefix');
        $modelName=$prefix.'model';
        //连表查询
        //获取栏目
        $_cateRes=db('cate')->alias('a')->field('a.*,b.model_name')->join("$modelName b",'a.model_id = b.id')->order('sort desc')->select();
        $cateRes=model('cate')->catetree($_cateRes);

        $this->assign('cateRes',$cateRes);
        return view();
    }
    //
    public function ajaxlst(){
        if(request()->isAjax()){
        $cateid=input('cateid');
        $sonids=model('cate')->childrenids($cateid);
        echo json_encode($sonids);
        }else{
            $this->error('非法操作！');
        }
    }

    public function add()
    {
        //echo 'tianjianlanmuzhong';
        $data=input('post.');
        //var_dump($data);
    	if(request()->isPost()){
    		$data=input('post.');
            //var_dump($data);
            $validate=validate('cate');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }
    		$add=db('cate')->insert($data);
    		if($add){
    			$this->success('添加栏目成功！',url('lst'));
    		}else{
    			$this->error('添加栏目失败！');
    		}
    		return;
    	}

        //获取栏目
        $_cateRes=db('cate')->select();
        $cateRes=model('cate')->catetree($_cateRes);
        //接受栏目id
        $cateid=input('cateid');
        //模型信息
        $modelRes=db('model')->field('id,model_name')->select();
        $this->assign(array(
            'cateRes'=>$cateRes,
            'cateid'=>$cateid,
            'modelRes'=>$modelRes,
            ));
        return view();
    }

    //编辑栏目
    public function edit(){
        if(request()->isPost()){
            $data=input('post.');
            //判断是否隐藏栏目
            $_data=array();
            foreach ($data as $k => $v) {
                $_data[]=$k;
            }
            if(!in_array('status', $_data)){
                $data['status']=1;
            }
            //验证
            $validate=validate('cate');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }
            //执行栏目修改操作
            $save=db('cate')->update($data);
            if($save!==false){
                $this->success('修改栏目成功！',url('lst'));
            }else{
                $this->error('修改栏目失败！');
            }
            return;
        }
        //获取栏目
        $_cateRes=db('cate')->select();
        $cateRes=model('cate')->catetree($_cateRes);
        //接受栏目id
        $cateid=input('cateid');
        $cates=db('cate')->find($cateid);
        //模型信息
        $modelRes=db('model')->field('id,model_name')->select();
        $this->assign(array(
            'cateRes'=>$cateRes,
            'cates'=>$cates,
            'modelRes'=>$modelRes,
            ));
        return view();
    }

    public function upimg(){
    	$file = request()->file('img');
    	$info = $file->move(ROOT_PATH . 'public/static/admin/uploads/cateimg');
    	if($info){
	        // 成功上传后 获取上传信息
	        echo $info->getSaveName();
	    }else{
	        // 上传失败获取错误信息
	        echo $file->getError();
	    }
    }

    //ajax异步修改栏目显示状态
    public function changestatus(){
        if(request()->isAjax()){
            $cateid=input('cateid');
            $status=db('cate')->field('status')->where('id',$cateid)->find();
            $status=$status['status'];
            if($status==1){
                db('cate')->where('id',$cateid)->update(['status'=>0]);
                echo 1;//由显示改为隐藏
            }else{
                db('cate')->where('id',$cateid)->update(['status'=>1]);
                echo 2;//由隐藏改为显示
            }  
        }else{
            $this->error("非法操作！");
        }
    }

    public function del_sort(){
        $data=input('post.');
        //dump($data); 
        foreach ($data['sort'] as $k => $v) {
            db('cate')->where('id',$k)->update(['sort'=>$v]);
        }
        if($data['itm']){

        model('cate')->pdel($data['itm']);
     }
        
        $this->success('数据处理成功！',url('lst'));
    }

    public function del(){
        $cateid=input('cateid');
        $childrenids=model('cate')->childrenids($cateid);
        $childrenids[]=(int)$cateid;
        //删除栏目及文章相关资源
        foreach ($childrenids as $k => $v) {
            //删除栏目缩略图
            $cates=db('cate')->find($v);
            if($cates['img']){
                $imgSrc=ADMINIMG.$cates['img'];
                if(file_exists($imgSrc)){
                    @unlink($imgSrc);
                }
            }
            //获取当前栏目对应的模型的附加表名称
            $modelId=$cates['model_id'];
            $models=db('model')->field('table_name')->find($modelId);
            $tableName=$models['table_name'];//附加表名称
            //删除文章的操作
            $artRes=db('archives')->where(array('cate_id'=>$v))->select();
            //循环删除附加表里面的记录
            foreach ($artRes as $k1 => $v1) {
                db($tableName)->where(array('aid'=>$v1['id']))->delete();
            }
            //删除文章主表对应的缩略图和记录
            foreach ($artRes as $k1 => $v1) {
                //删除资源图片
                if($v1['litpic']){
                    $artSrc=INDEXIMG.$v1['litpic'];
                    if(file_exists($artSrc)){
                        @unlink($artSrc);
                    }
                }
                //删除记录
                db('archives')->delete($v1['id']);
            }
        }
        //结束
        $del=db('cate')->delete($childrenids);
        if($del){
            $this->success('删除栏目成功！',url('lst'));
        }else{
            $this->error('删除栏目失败！');
        }
   }

   public function delimg(){
     $cateid=input('cateid');
     $imgurl=input('imgurl'); 
     $imgurl=ADMINIMG. $imgurl;
     $res=unlink($imgurl);
     if($cateid){
        db('cate')->where('id',$cateid)->setField('img','');
     }
     if($res){
        echo 1; //删除文件成功
     }else{
        echo 2;//删除文件失败
     }
   }

   public function ajaxcateinfo(){
        $cateid=input('cateid');
        $data=db('cate')->find($cateid);
        echo json_encode($data);
   }

   
}
