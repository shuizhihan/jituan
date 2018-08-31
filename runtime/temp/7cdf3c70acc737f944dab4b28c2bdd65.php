<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:29:"../template/default/index.htm";i:1535007289;s:28:"../template/default\head.htm";i:1534120211;s:30:"../template/default\footer.htm";i:1533642598;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="renderer" content="webkit">
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="generator" data-variable="10001,,10001"/>
<title>河南新誉佳集团</title>
<meta name="description" content="<?php echo $confs['desc']; ?>" />
<meta name="keywords" content="<?php echo $confs['keywords']; ?>" />
<meta name="author" content="order by dzc" />
<link rel='stylesheet' href='/template/default/skin/css/style.css'>
<meta name="robots" content="All">
<link rel="shortcut icon" href="/public/favicon.ico">
<style type="text/css">
  
  /*
  a>b {
  color: gray;
  }
  a:hover>b{
  color: #0067B8;
  }
  */
  .dzcIndex a>p {
    color: gray;
   
  }
  .dzcIndex a:hover>p{
    color: #0067B8;
  }
</style>
</head>
<body class="met-navfixed">
<!-- <div class="load-box"></div> -->
<!--[if lte IE 8]>
	<div class="text-center padding-top-50 padding-bottom-50 bg-blue-grey-100">
	<p class="browserupgrade font-size-18">你正在使用一个<strong>过时</strong>的浏览器。请<a href="http://browsehappy.com/" target="_blank">升级您的浏览器</a>，以提高您的体验。</p>
	</div>
<![endif]--> 
<nav class="navbar navbar-default met-nav navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="padding-box">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle hamburger hamburger-close collapsed" data-target="#navbar-default-collapse" data-toggle="collapse"> <span class="sr-only">Toggle navigation</span> <span class="hamburger-bar"></span> </button>
        <div class="met-langlist vertical-align margin-top-10 text-center"> <!--<img src="/skin/images/map.svg"> <a href="/" title="English">English</a>--> </div>
        <a href="/" class="navbar-brand navbar-logo vertical-align" title="新誉佳集团">
        <h1 class='hide'>新誉佳集团</h1>
        <div class="vertical-align-middle"><img src="/template/default/skin/images/logo.png" alt="新誉佳集团" title="新誉佳集团" /></div>
        </a>
        <h2 class='hide'></h2>
      </div>
      <div class="collapse navbar-collapse navbar-collapse-toolbar nav-langlist" id="navbar-default-collapse">
        <ul class="nav navbar-nav navbar-right navlist">
          <li><a href="/" title="首页" <?php if($topcid == 'index'): ?> class='link active' <?php endif; ?>>首页</a></li>
          <?php if(is_array($cateRes) || $cateRes instanceof \think\Collection || $cateRes instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($cateRes) ? array_slice($cateRes,0,3, true) : $cateRes->slice(0,3, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
          <li class="dropdown margin-left-30"> <a
							class="dropdown-toggle link <?php if($cate['id'] == $topcid): ?>active<?php endif; ?>"
							data-toggle="dropdown"
							data-hover="dropdown"
							href="<?php if($cate['cate_attr'] == 1): ?><?php echo url('Cate/index',array('cid'=>$cate['id'])); endif; if($cate['cate_attr'] == 2): ?><?php echo url('Page/index',array('cid'=>$cate['id'])); endif; if($cate['cate_attr'] == 3): ?><?php echo $cate['link']; endif; ?>"
							aria-expanded="false"
							
							title="<?php echo $cate['cate_name']; ?>"
						><?php echo $cate['cate_name']; ?> <span class="caret"></span></a>
            <ul class="dropdown-menu dropdown-menu-right bullet">
              <?php if(is_array($cate['children']) || $cate['children'] instanceof \think\Collection || $cate['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $cate['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sonCate): $mod = ($i % 2 );++$i;?>
              <li><a href="<?php if($sonCate['cate_attr'] == 1): ?><?php echo url('Cate/index',array('cid'=>$sonCate['id'])); endif; if($sonCate['cate_attr'] == 2): ?><?php echo url('Page/index',array('cid'=>$sonCate['id'])); endif; if($sonCate['cate_attr'] == 3): ?><?php echo $sonCate['link']; endif; ?>" class=""  title="<?php echo $sonCate['cate_name']; ?>"><?php echo $sonCate['cate_name']; ?></a></li>
              <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
          </li>
          <?php endforeach; endif; else: echo "" ;endif; if(is_array($cateRes) || $cateRes instanceof \think\Collection || $cateRes instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($cateRes) ? array_slice($cateRes,3,1, true) : $cateRes->slice(3,1, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
          <li class="margin-left-30"><a href="<?php if($cate['cate_attr'] == 1): ?><?php echo url('Cate/index',array('cid'=>$cate['id'])); endif; if($cate['cate_attr'] == 2): ?><?php echo url('Page/index',array('cid'=>$cate['id'])); endif; if($cate['cate_attr'] == 3): ?><?php echo $cate['link']; endif; ?>" title="<?php echo $cate['cate_name']; ?>" class="link <?php echo $cate['cate_name']; ?>"><?php echo $cate['cate_name']; ?></a></li>
          <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
  </div>
</nav>

<div class="banner-box">
  <div class="met-banner banner-ny-h" data-height='' style='background-color:#023894;'>
   <?php if(is_array($img_Res) || $img_Res instanceof \think\Collection || $img_Res instanceof \think\Paginator): $i = 0; $__LIST__ = $img_Res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <div class="slick-slide"> <img class="cover-image" src="__INDEX__/ad/<?php echo $vo['fimg_src']; ?>" srcset='' data-page-img='__INDEX__/ad/<?php echo $vo['fimg_src_son']; ?>' sizes="(max-width: 767px) 767px"> </div>
    <?php endforeach; endif; else: echo "" ;endif; ?> 
  </div>
  <i class="fa fa-wechat" data-toggle="modal" data-target="#met-wechat-modal"></i> </div>
<div class="modal fade modal-3d-flip-vertical" id="met-wechat-modal" aria-hidden="true" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-center modal-lg" >
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        <div class="row">
          <div class="col-sm-12 col-xs-12 margin-bottom-20 wechat">
            <p><img src="__ADMIN__/uploads/<?php echo $confs['ewm']; ?>"/><strong>微信扫描关注企业集团公众号！</strong></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- 新闻媒体开始 -->
<?php if(is_array($cateRes) || $cateRes instanceof \think\Collection || $cateRes instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($cateRes) ? array_slice($cateRes,1,1, true) : $cateRes->slice(1,1, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
<div class="about-title">
  <h2><?php echo $cate['cate_name']; ?></h2>
  <p></p>
  <a href="<?php if($cate['cate_attr'] == 1): ?><?php echo url('Cate/index',array('cid'=>$cate['id'])); endif; if($cate['cate_attr'] == 2): ?><?php echo url('Page/index',array('cid'=>$cate['id'])); endif; if($cate['cate_attr'] == 3): ?><?php echo $cate['link']; endif; ?>" title="<?php echo $cate['cate_name']; ?>" target='_self'>更多<?php echo $cate['cate_name']; ?>进入></a> 
    </div>
<?php endforeach; endif; else: echo "" ;endif; ?>
<!--  -->
<div class="met-img animsition type-0">
  <div class="container-fluid">
    <div class="row">
      <ul id="met-grid" class="blocks-100 blocks-sm-2 blocks-md-3 blocks-xlg-3 no-space met-page-ajax met-grid" data-scale='0.66666666666667'>
         <?php if(is_array($xinwen) || $xinwen instanceof \think\Collection || $xinwen instanceof \think\Paginator): $ii = 0;$__LIST__ = is_array($xinwen) ? array_slice($xinwen,0,3, true) : $xinwen->slice(0,3, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($ii % 2 );++$ii;?> 
        <li class="widget ">
          <div> <a href="<?php echo url('Article/index',array('aid'=>$vo['id'])); ?>" title="<?php echo $vo['title']; ?>" target='_self'> <font> <i class="fa fa-search met-img-showbtn" data-imglist="__INDEX__/uploads/img/<?php echo $vo['litpic']; ?>"></i> <img src="__INDEX__/uploads/img/<?php echo $vo['litpic']; ?>"> </font> </a> <span> <a href="<?php echo url('Article/index',array('aid'=>$vo['id'])); ?>" title="<?php echo $vo['title']; ?>" target='_self'> <b> <?php echo $vo['title']; ?></b> </a>
            <hr style="margin-top: 1px; margin-bottom: 1px;" />
            <!-- <p><?php echo mb_substr($vo['description'],0,120,'utf-8'); ?>...</p> -->
            <?php if($ii == 1): if(is_array($xinwen) || $xinwen instanceof \think\Collection || $xinwen instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($xinwen) ? array_slice($xinwen,3,2, true) : $xinwen->slice(3,2, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vovo): $mod = ($i % 2 );++$i;?>
            
                <div class="dzcIndex">
                   <a href="<?php echo url('Article/index',array('aid'=>$vovo['id'])); ?>" title="<?php echo $vovo['title']; ?>" target='_self' > <p style="font-size: 15px;"> <?php echo $vovo['title']; ?></p> </a>
                  <p style="font-size: 15px; color: gray;">发布时间：<?php echo date("m",$vovo['time']); ?>月<?php echo date("d",$vovo['time']); ?>日</p>  
                </div>
                <hr style="margin-top: 1px; margin-bottom: 1px;" />
            <?php endforeach; endif; else: echo "" ;endif; endif; if($ii == 2): if(is_array($xinwen) || $xinwen instanceof \think\Collection || $xinwen instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($xinwen) ? array_slice($xinwen,5,2, true) : $xinwen->slice(5,2, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vovo): $mod = ($i % 2 );++$i;?>
            
                <div class="dzcIndex">
                   <a href="<?php echo url('Article/index',array('aid'=>$vovo['id'])); ?>" title="<?php echo $vovo['title']; ?>" target='_self' > <p style="font-size: 15px;"> <?php echo $vovo['title']; ?></p> </a>
                  <p style="font-size: 15px; color: gray;">发布时间：<?php echo date("m",$vovo['time']); ?>月<?php echo date("d",$vovo['time']); ?>日</p>  
                </div>
           <hr style="margin-top: 1px; margin-bottom: 1px;" />
            <?php endforeach; endif; else: echo "" ;endif; endif; if($ii == 3): if(is_array($xinwen) || $xinwen instanceof \think\Collection || $xinwen instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($xinwen) ? array_slice($xinwen,7,2, true) : $xinwen->slice(7,2, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vovo): $mod = ($i % 2 );++$i;?>
            
                <div class="dzcIndex">
                   <a href="<?php echo url('Article/index',array('aid'=>$vovo['id'])); ?>" title="<?php echo $vovo['title']; ?>" target='_self' > <p style="font-size: 15px;"> <?php echo $vovo['title']; ?></p> </a>
                  <p style="font-size: 15px; color: gray;">发布时间：<?php echo date("m",$vovo['time']); ?>月<?php echo date("d",$vovo['time']); ?>日</p>  
                </div>
           <hr style="margin-top: 1px; margin-bottom: 1px;" />
            <?php endforeach; endif; else: echo "" ;endif; endif; ?> 
            </span>
            </div>
            
           
          
          
         
        </li>
          
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
      <!-- <div class="hidden-xs">
        <div class='met_pager'> {dede:pagelist listitem="index,end,pre,next,pageno" listsize="5"/} </div>
      </div>
      <div class="met-page-ajax-body visible-xs-block invisible" data-plugin="appear" data-animate="slide-bottom" data-repeat="false"> </div> -->
    </div>
  </div>
</div>

<!-- 新闻媒体结束 -->
<div class="skew-title">
  <h2>集团产业</h2>
  <p>我们的事业围绕教育、医疗、人力资源产业；我们正在努力超越，以挑战者的精神进行创新，并不断深化我们的专业知识；
我们正在努力为我们的客户提供优异的服务和解决方案。</p>
</div>
<div class="skew-box">
  <ul>
    <?php if(is_array($jituan_cates) || $jituan_cates instanceof \think\Collection || $jituan_cates instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($jituan_cates) ? array_slice($jituan_cates,0,3, true) : $jituan_cates->slice(0,3, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <li> <strong> <a href="<?php if($vo['cate_attr'] == 1): ?><?php echo url('Cate/index',array('cid'=>$vo['id'])); endif; if($vo['cate_attr'] == 2): ?><?php echo url('Page/index',array('cid'=>$vo['id'])); endif; if($vo['cate_attr'] == 3): ?><?php echo $vo['link']; endif; ?>" title="<?php echo $vo['cate_name']; ?>" target='_self'> <i class="fa fa-diamond"></i>
      <h2><?php echo $vo['cate_name']; ?></h2>
      <b><?php echo $vo['keywords']; ?></b> </a> </strong> <font>
      <h1><?php echo $vo['cate_name']; ?></h1>
      <b><?php echo $vo['keywords']; ?></b>
      <p><?php echo $vo['desc']; ?></p>
      <a href="<?php if($vo['cate_attr'] == 1): ?><?php echo url('Cate/index',array('cid'=>$vo['id'])); endif; if($vo['cate_attr'] == 2): ?><?php echo url('Page/index',array('cid'=>$vo['id'])); endif; if($vo['cate_attr'] == 3): ?><?php echo $vo['link']; endif; ?>" title="<?php echo $vo['cate_name']; ?>" target='_self'>查看详情</a> </font> <span> <img class="lazyload" data-original="__ADMIN__/uploads/cateimg/<?php echo $vo['img']; ?>" alt="<?php echo $vo['cate_name']; ?>"> </span> </li>
    <?php endforeach; endif; else: echo "" ;endif; ?>

    <li> <strong> <a href="" title="查看更多" target='_self'> <i class="fa fa-diamond"></i>
      <h2>查看更多</h2>
      <b>CHECK MORE</b> </a> </strong> <font>
      <h1>查看更多</h1>
      <b>CHECK MORE</b>
      <p></p>
      <a href="/public/index.php/index/page/index/cid/8.html" title="查看更多" target='_self'>查看更多</a> </font> <span> <img class="lazyload" data-original="/template/default/skin/images/more_3.jpg" alt="查看更多"> </span> </li>
  </ul>
</div>

<div class="about-title"> 
  <?php if(is_array($about) || $about instanceof \think\Collection || $about instanceof \think\Paginator): $i = 0; $__LIST__ = $about;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
  <h3><?php echo $vo['title']; ?></h3>
  
  <p><?php echo $vo['desc']; ?></p>
  <a href="<?php if($vo['cate_attr'] == 1): ?><?php echo url('Cate/index',array('cid'=>$vo['id'])); endif; if($vo['cate_attr'] == 2): ?><?php echo url('Page/index',array('cid'=>$vo['id'])); endif; if($vo['cate_attr'] == 3): ?><?php echo $vo['link']; endif; ?>" title="<?php echo $vo['title']; ?>" target='_self'>点击进入></a>
  <?php endforeach; endif; else: echo "" ;endif; ?> 
</div>

<div class="about-box lazyload" data-original="/template/default/skin/images/wel12.jpg">
  <div class="container">
    <div class="row">
      <div class="col-md-6"> 
        <?php if(is_array($about) || $about instanceof \think\Collection || $about instanceof \think\Paginator): $i = 0; $__LIST__ = $about;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <h2><?php echo $vo['title']; ?></h2>
        
        <hr>
        <p><?php echo $vo['desc']; ?></p>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <b> 
          <?php if(is_array($jituan_abouts) || $jituan_abouts instanceof \think\Collection || $jituan_abouts instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($jituan_abouts) ? array_slice($jituan_abouts,0,1, true) : $jituan_abouts->slice(0,1, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <a href="<?php if($vo['cate_attr'] == 1): ?><?php echo url('Cate/index',array('cid'=>$vo['id'])); endif; if($vo['cate_attr'] == 2): ?><?php echo url('Page/index',array('cid'=>$vo['id'])); endif; if($vo['cate_attr'] == 3): ?><?php echo $vo['link']; endif; ?>" title="<?php echo $vo['title']; ?>" target='_self'> <i class="fa fa-cogs"></i> </a> 
          <?php endforeach; endif; else: echo "" ;endif; if(is_array($jituan_abouts) || $jituan_abouts instanceof \think\Collection || $jituan_abouts instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($jituan_abouts) ? array_slice($jituan_abouts,1,1, true) : $jituan_abouts->slice(1,1, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <a href="<?php if($vo['cate_attr'] == 1): ?><?php echo url('Cate/index',array('cid'=>$vo['id'])); endif; if($vo['cate_attr'] == 2): ?><?php echo url('Page/index',array('cid'=>$vo['id'])); endif; if($vo['cate_attr'] == 3): ?><?php echo $vo['link']; endif; ?>" title="<?php echo $vo['title']; ?>" target='_self'> <i class="fa fa-ticket"></i> </a>
          <?php endforeach; endif; else: echo "" ;endif; ?>
         </b> </div>
      <div class="col-md-6">
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-11 about-text">
            <p>
              <video src="/template/default/skin/images/video.mp4" width="100%" autoplay="true" controls="true">error</video>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="met-footnav">
  <div class="container-fluid">
    <div class="padding-box">
      <div class="row mob-masonry">
        <div class="col-md-9 col-sm-8 col-xs-12"> 
          <?php if(is_array($cateRes) || $cateRes instanceof \think\Collection || $cateRes instanceof \think\Paginator): $i = 0; $__LIST__ = $cateRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
          <div class="col-md-2 col-sm-4 col-xs-4 list masonry-item no-padding">
            <h4><a href="<?php if($cate['cate_attr'] == 1): ?><?php echo url('Cate/index',array('cid'=>$cate['id'])); endif; if($cate['cate_attr'] == 2): ?><?php echo url('Page/index',array('cid'=>$cate['id'])); endif; if($cate['cate_attr'] == 3): ?><?php echo $cate['link']; endif; ?>"  title="<?php echo $cate['cate_name']; ?>"><?php echo $cate['cate_name']; ?></a></h4>
            <ul>
              <?php if($cate['children']): if(is_array($cate['children']) || $cate['children'] instanceof \think\Collection || $cate['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $cate['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sonCate): $mod = ($i % 2 );++$i;?>
              <li><a href="<?php if($sonCate['cate_attr'] == 1): ?><?php echo url('Cate/index',array('cid'=>$sonCate['id'])); endif; if($sonCate['cate_attr'] == 2): ?><?php echo url('Page/index',array('cid'=>$sonCate['id'])); endif; if($sonCate['cate_attr'] == 3): ?><?php echo $sonCate['link']; endif; ?>"  title="<?php echo $sonCate['cate_name']; ?>"><?php echo $sonCate['cate_name']; ?></a></li>
              <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </ul>
          </div>
          <?php endforeach; endif; else: echo "" ;endif; ?> 
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12 info masonry-item">
          <div class="foot-text">
            <h4>客服咨询</h4>
            <em><a href="tel:<?php echo $confs['contact']; ?>" title="<?php echo $confs['contact']; ?>"><?php echo $confs['contact']; ?></a></em>
            <p>服务时间 <?php echo $confs['time_service']; ?></p>
            <div class="social-box"> <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $confs['qq']; ?>&site=qq&menu=yes" rel="nofollow" target="_blank"><i class="fa fa-qq"></i></a> <a href="http://www.weibo.com/" rel="nofollow" target="_blank"><i class="fa fa-weibo"></i></a> <a id="met-weixin"><i class="fa fa-weixin" data-plugin="webuiPopover" data-trigger="hover" data-animation="pop" data-placement='top' data-width='160' data-padding='0' data-content="<img src='__ADMIN__/uploads/<?php echo $confs['ewm']; ?>' alt='<?php echo $confs['sitename']; ?>' style='height:150px;display:block;margin:auto;'>"></i></a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- footer部分 -->
<footer>
  <div class="container-fluid">
    <div class="padding-box"> 
      <!--<div class="powered_by_metinfo">
        <div>&nbsp;</div>
        Powered&nbsp;by&nbsp;<a href="http://www.dede58.com/" target="_blank" title="织梦58">DeDe58.Com</a> </div>-->
      <div class="met-links">
        <ol class="breadcrumb">
          <li>友情链接 :</li>
          <li> <a href="http://www.xyjrlzy.com/" target="_blank">新誉佳人力资源</a>  </li>
          <li> <a href="http://www.xyjzypx.com/" target="_blank">新誉佳职业培训</a>  </li>
          <li> <a href="http://www.xyjgjzx.com/" target="_blank">新誉佳高级中学</a>  </li>
          <li> <a href="http://www.xyjedu.com/" target="_blank">新誉佳教育</a>  </li>
          <li> <a href="http://www.xxkfyy.com/" target="_blank">新誉佳残联康复医院</a>  </li>
          
        </ol>
      </div>
      <p>
      
      <p>Copyright © 2002-2019 新誉佳集团有限公司 版权所有 <?php echo $confs['beian']; ?> </p>
      </p>
    </div>
  </div>
</footer>
<button type="button" class="btn btn-icon btn-primary btn-squared met-scroll-top hide"><i class="icon wb-chevron-up" aria-hidden="true"></i></button>
<script src="/template/default/skin/js/aitecms.js"></script>
<!-- footer部分结束 -->

</body>
</html>