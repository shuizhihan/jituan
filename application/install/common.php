<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function check_env(){
  $envArr=array(
    'os'=>array('操作系统','无限制','linux',PHP_OS,'success'),
    'php'=>array('PHP版本','5.3','5.4',PHP_VERSION,'success'),
    'gd'=>array('GD库','2.0','2.0','未知','success'),
    'upload'=>array('附件上传','无限制','2M','未知','success'),
    'disk'=>array('磁盘空间','100M','>100M','未知','success'),
    );

    //检查附件上传
    if(@ini_get('file_uploads')){
      $envArr['upload'][3]=ini_get('upload_max_filesize');
    }

    //获取磁盘空间
    if(function_exists('disk_free_space')){
      $envArr['disk'][3]=floor(disk_free_space(ROOT_PATH)/(1024*1024)).'M';
    }

    //检测gd库
    $tempArr=function_exists('gd_info') ? gd_info() : array();
    if(empty($tempArr['GD Version'])){
      $envArr['gd'][3]='未安装';
      $envArr['gd'][4]='error';
      session('error',true);
    }else{
      $envArr['gd'][3]=$tempArr['GD Version'];
    }
    unset($tempArr);
  return $envArr;
}

//函数检查
function check_function2(){
  $funArr=array(
    array('mysql_connect','支持','支持','success'),
    array('fsockopen','支持','支持','success'),
    array('gethostbyname','支持','支持','success'),
    array('file_get_contents','支持','支持','success'),
    array('mb_convert_encoding','支持','支持','success'),
    array('json_encode','支持','支持','success'),
    );
    foreach ($funArr as $k=>$v) {
      if(!function_exists($v[0])){
        $funArr[$k][2]='不支持';
        $funArr[$k][3]='error';
        session('error',true);
      }
    }
  return $funArr;
}

//检查目录和文件是否可写
function check_dirfile(){
  $dirfileArr=array(
    array('dir','可写','可写','runtime','success'),
    array('dir','可写','可写','public/static/index/uploads','success'),
    array('file','可写','可写','application/config.php','success'),
    array('file','可写','可写','application/database.php','success'),
    );
  foreach ($dirfileArr as $k => $v) {
    if($v[0]=='dir'){
      if(!is_writable(ROOT_PATH.$v[3])){
        if(is_dir(ROOT_PATH.$v[3])){
          $dirfileArr[$k][2]='不可写';
          $dirfileArr[$k][4]='error';
          session('error',true);
        }else{
          $dirfileArr[$k][2]='不存在';
          $dirfileArr[$k][4]='error';
          session('error',true);
        }
      }
    }else{
      if(file_exists(ROOT_PATH.$v[3])){
        if(!is_writable(ROOT_PATH.$v[3])){
          $dirfileArr[$k][2]='不可写';
          $dirfileArr[$k][4]='error';
          session('error',true);
        }
      }else{
        $dirfileArr[$k][2]='不存在';
        $dirfileArr[$k][4]='error';
        session('error',true);
      }
    }
  }
  return $dirfileArr;
}

//实时输出到界面
function showmsg($msg, $class = '')
{
    echo "<script type=\"text/javascript\">showmsg(\"{$msg}\", \"{$class}\")</script>";
    flush();
    ob_flush();
    sleep(1);
}

//创建数据表函数
function create_tables($db,$prefix){
  //获取数据表文件内容
  $sql=file_get_contents(ROOT_PATH.'data/install/install.sql');
  //替换表前缀
  $original_prefix=config('original_prefix');
  $sql=str_replace("`{$original_prefix}", "`{$prefix}", $sql);
  //打散为数组
  $sqlArr=explode(';', $sql);
  showmsg('开始安装数据表...','green');
  foreach ($sqlArr as $k => $v) {
    $v=trim($v);
    if(empty($v)) continue;
    if(substr($v, 0, 12) == 'CREATE TABLE'){
      $name=preg_replace("/^CREATE TABLE `(\w+)` .*/s", "\\1", $v);
      $msg="创建数据表{$name}";
      if($db->execute($v) !== false){
        showmsg($msg.'...创建成功','green');
      }else{
        showmsg($msg.'...创建失败','red');
        session('error',true);
      }
    }else{
      $db->execute($v);
    }
  }
}