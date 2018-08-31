<?php
namespace app\install\controller;
use think\Controller;
use think\Db;
class Index extends Controller
{

    public function index(){
        // echo ROOT_PATH;
        session('step',0);
        session('error',false);
        return view();
    }

    public function step1(){
        if(session('step') != 0 && session('step') != 2){
            $this->redirect('index');
        }
        session('error',false);
        $envArr=check_env();
        $funArr=check_function2();
        $dirfileArr=check_dirfile();
        $this->assign([
            'envArr'=>$envArr,
            'funArr'=>$funArr,
            'dirfileArr'=>$dirfileArr,
            ]);
        session('step',1);
        return view();
    }

    public function step2(){
        if(request()->isPost()){
            $data=input('post.');
            // dump($data); die;
            $dbArr=$data['db'];
            $adminArr=$data['admin'];
            // dump($adminArr); die;
            //管理员及数据库信息验证操作
            if(!is_array($adminArr) || empty($adminArr['site_name']) || empty($adminArr['admin']) || empty($adminArr['password']) || empty($adminArr['rpassword'])){
                $this->error('管理员信息不完整，请检查！');
            }else{
                if(!preg_match('/^[a-zA-Z0-9_-]{5,10}$/', $adminArr['admin'])){
                    $this->error('账号格式错误！');
                }else{
                    if(!preg_match('/^[a-zA-Z0-9_-]{5,10}$/', $adminArr['password'])){
                        $this->error('密码格式错误！');
                    }else{
                        if($adminArr['password'] != $adminArr['rpassword']){
                            $this->error('两次密码输入不一致！');
                        }else{
                            $adminArr=serialize($adminArr);
                            session('admin_info',$adminArr);
                        }
                    }
                }
            }
            //检查数据库相关信息并链接数据库
            if(!is_array($dbArr) || empty($dbArr['hostname']) || empty($dbArr['database']) || empty($dbArr['username']) || empty($dbArr['password']) || empty($dbArr['prefix']) || empty($dbArr['hostport'])){
                $this->error('数据库信息不完整！');
            }else{
                $_dbArr=serialize($dbArr);
                session('db_config',$_dbArr);
                $dbname=$dbArr['database'];
                unset($dbArr['database']);
                // dump($dbArr); die;
                $db=Db::connect($dbArr);
                $sql="CREATE DATABASE IF NOT EXISTS {$dbname} DEFAULT CHARACTER SET utf8";
                if(!$db->execute($sql)){
                    $this->error($db->getError());
                }else{
                    $this->success('创建成功！',url('step3',['access'=>'success']));
                }
            }
           return; 
        }
        if(session('error')){
            $this->error('环境检测未通过，请调整环境后重试');
        }
        $step=session('step');
        if($step!=1 && $step!=2){
            $this->redirect('step1');
        }
        session('step',2);
        return view();
    }

    public function step3(){
        if(input('access') != 'success' || session('step') != 2){
            $this->redirect('index');
        }
        session('step',3);
        echo $this->fetch();
        $db_config=session('db_config');
        $db_config=unserialize($db_config);
        $db=Db::connect($db_config);

        //创建数据表
        create_tables($db,$db_config['prefix']);
        //写入初始信息
        //写入配置文件
    }


}
