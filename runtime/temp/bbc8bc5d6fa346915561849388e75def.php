<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:31:"../template/default/product.htm";i:1534932910;s:28:"../template/default\head.htm";i:1534120211;s:30:"../template/default\footer.htm";i:1533642598;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="renderer" content="webkit">
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="generator" data-variable="3,,3"/>
<title><?php echo $topCates['cate_name']; ?></title>
<meta name="keywords" content="{dede:field name='keywords'/}" />
<meta name="description" content="{dede:field name='description' function='html2text(@me)'/}" />
<link rel='stylesheet' href='/template/default/skin/css/style.css'>
<meta name="robots" content="All">
<link rel="shortcut icon" href="/public/favicon.ico">
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
    <div class="slick-slide"> <img class="cover-image" src="/template/default/skin/images/product.jpg" srcset='/template/default/skin/images/product.jpg' data-page-img='/template/default/skin/images/product.jpg' sizes="(max-width: 767px) 767px" alt="<?php echo $topCates['cate_name']; ?>"> </div>
  </div>
</div>
<?php if(is_array($sonCateRes) || $sonCateRes instanceof \think\Collection || $sonCateRes instanceof \think\Paginator): $i = 0; $__LIST__ = $sonCateRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$scate): $mod = ($i % 2 );++$i;?> 
<div class="met-product-class">
  <div class="class-text padding-box">
    <div class="class-desc">
      <h1><a href="<?php if($scate['cate_attr'] == 1): ?><?php echo url('Cate/index',array('cid'=>$scate['id'])); endif; if($scate['cate_attr'] == 2): ?><?php echo url('Page/index',array('cid'=>$scate['id'])); endif; if($scate['cate_attr'] == 3): ?><?php echo $scate['link']; endif; ?>" title="<?php echo $scate['cate_name']; ?>" ><?php echo $scate['cate_name']; ?></a></h1>
      <p ><?php echo $scate['desc']; ?>...</p>
      <a href="<?php if($scate['cate_attr'] == 1): ?><?php echo url('Cate/index',array('cid'=>$scate['id'])); endif; if($scate['cate_attr'] == 2): ?><?php echo url('Page/index',array('cid'=>$scate['id'])); endif; if($scate['cate_attr'] == 3): ?><?php echo $scate['link']; endif; ?>" title="<?php echo $scate['cate_name']; ?>" >点击进入&gt;</a> </div>
  </div>
  <div class="class-image" style="background-image:url(__ADMIN__/uploads/cateimg/<?php echo str_replace('\\', '\/', $scate['img']); ?>);"> <a href="<?php if($scate['cate_attr'] == 1): ?><?php echo url('Cate/index',array('cid'=>$scate['id'])); endif; if($scate['cate_attr'] == 2): ?><?php echo url('Page/index',array('cid'=>$scate['id'])); endif; if($scate['cate_attr'] == 3): ?><?php echo $scate['link']; endif; ?>" title="<?php echo $scate['cate_name']; ?>" ><?php echo $scate['cate_name']; ?></a> </div>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?> 
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
</body>
</html>