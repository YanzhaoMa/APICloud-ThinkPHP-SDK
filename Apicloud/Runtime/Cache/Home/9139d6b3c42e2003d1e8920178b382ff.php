<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>

<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title>晨鸿信息 数字版</title>
<link rel="shortcut icon" type="image/x-icon" href="/echxx/Public/images/favicon.ico">
<!--Stylesheets-->
<link rel="stylesheet" href="/echxx/Public/css/reset.css" />
<link rel="stylesheet" href="/echxx/Public/css/main.css" />
<link rel="stylesheet" href="/echxx/Public/css/typography.css" />
<link rel="stylesheet" href="/echxx/Public/css/tipsy.css" />
<link rel="stylesheet" href="/echxx/Public/js/cl_editor/jquery.cleditor.css" />
<link rel="stylesheet" href="/echxx/Public/uploadify/uploadify.css" />
<link rel="stylesheet" href="/echxx/Public/css/jquery.ui.all.css" />
<link rel="stylesheet" href="/echxx/Public/css/fullcalendar.css" />
<link rel="stylesheet" href="/echxx/Public/css/bootstrap.css" />
<link rel="stylesheet" href="/echxx/Public/js/fancybox/jquery.fancybox-1.3.4.css" />
<link rel="stylesheet" href="/echxx/Public/css/highlight.css" />
<!--[if lt IE 9]>
    <script src="js/html5.js"></script>
    <![endif]-->
<!--Javascript-->
<script type="text/javascript" src="/echxx/Public/js/jquery.min.js"> </script>
<script type="text/javascript" src="/echxx/Public/js/highcharts.js"> </script>
<script type="text/javascript" src="/echxx/Public/js/exporting.js"> </script>
<script type="text/javascript" src="/echxx/Public/js/jquery.quicksand.js"> </script>
<script type="text/javascript" src="/echxx/Public/js/jquery.easing.1.3.js"> </script>
<script type="text/javascript" src="/echxx/Public/js/jquery.tipsy.js"> </script>
<script type="text/javascript" src="/echxx/Public/js/cl_editor/jquery.cleditor.min.js"> </script>
<script type="text/javascript" src="/echxx/Public/uploadify/swfobject.js"></script>
<script type="text/javascript" src="/echxx/Public/uploadify/jquery.uploadify.v2.1.4.min.js"></script>
<script type="text/javascript" src="/echxx/Public/js/jquery.autogrowtextarea.js"></script>
<script type="text/javascript" src="/echxx/Public/js/form_elements.js"></script>
<script type="text/javascript" src="/echxx/Public/js/jquery.ui.core.js"></script>
<script type="text/javascript" src="/echxx/Public/js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="/echxx/Public/js/jquery.ui.mouse.js"></script>
<script type="text/javascript" src="/echxx/Public/js/jquery.ui.slider.js"></script>
<script type="text/javascript" src="/echxx/Public/js/jquery.ui.progressbar.js"></script>
<script type="text/javascript" src="/echxx/Public/js/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/echxx/Public/js/jquery.ui.tabs.js"></script>
<script type="text/javascript" src="/echxx/Public/js/fullcalendar.js"></script>
<script type="text/javascript" src="/echxx/Public/js/gcal.js"></script>
<script type="text/javascript" src="/echxx/Public/js/bootstrap-modal.js"></script>
<script type="text/javascript" src="/echxx/Public/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="/echxx/Public/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="/echxx/Public/js/highlight.js"></script>
<script type="text/javascript" src="/echxx/Public/js/main.js"> </script>
<meta charset="UTF-8">

<script> 
function ifadd() 
{ 
    if(daodu_add.navinfo.value==''){
     alert("期数说明不能为空！");
     daodu_add.navinfo.focus();
     return false;
    }
    if (!confirm("确认要添加？")) {
            window.event.returnValue = false; //取消删除
        } 
 
 
}
function ifdel(){ 
        if (!confirm("确认要删除？")) {
            window.event.returnValue = false; //取消删除
        } 
   
}

function ifedit(editid,orderid,navinfo){
    var html='';
 
        html+='<div class="modal hide" id="myModal" >';
        html+='<div class="modal-header">';
        html+='<a class="close" data-dismiss="modal">×</a>';
        html+='<h3>导读编辑:</h3>';
        html+='</div>';
        html+='<div class="modal-body"> <div class="form_input">';
        html+='      <p>导读编号:<input id="orderid" type="text" value="'+orderid+'"></p>';
        html+='      <p>导读内容:<input id="navinfo" type="text" value="'+navinfo+'"></p>';
        html+='</div></div>';
        html+='<div class="modal-footer">';
        html+='<a data-dismiss="modal" class="greyishBtn button_small" href="#">取消</a>';
        html+='<a  data-toggle="modal" class="greyishBtn button_small" href="#" onclick="editorderid('+editid+');"    >保存</a>';
        html+='</div>';
        html+='</div>';

    $("#mymodal").html(html); 
}

function editorderid(editid){
     var orderid=$("#orderid").val(); 
     var navinfo=$("#navinfo").val();  
     $.post("/echxx/edit.php/Home/app/editorderid/",{editid:editid,orderid:orderid,navinfo:navinfo},function(re){
        if(re=="200"){
            // alert('修改成功!'); 
            document.getElementById('myModal').style.display='none';
             location.replace(location.href);
        }else{
            alert('修改失败!');
        }
    });
}
</script> 
</head>
<body>
<!--Header-->
<header>
    <!--Logo-->
    <div id="logo"><img src="/echxx/Public/images/logo.png" alt="" /></div>
    <!--Search-->
  <!--   <div class="header_search">
        <form action="">
            <input type="text" name="search" placeholder="Search" id="ac">
            <input type="submit" value="">
        </form>
    </div> -->
</header>
<!--Dreamworks Container-->
<div id="dreamworks_container">
    <!--Primary Navigation-->
    <nav id="primary_nav">
        <ul>
            <li class="nav_dashboard"><a href="/echxx/edit.php/Home/Index/index">首页</a></li> 
            <li class="nav_forms active"><a href="/echxx/edit.php/Home/Index/edit">内容编辑</a></li> 
        </ul>
    </nav>
<!--Main Content-->
<section id="main_content">
<!--Secondary Navigation-->
<nav id="secondary_nav"> 
<!--UserInfo-->
<dl class="user_info">
    <dt><a href="#"><img src="/echxx/Public/images/avatar.png" title="My photo" /></a></dt>
    <dd>
    <a class="welcome_user"  >欢迎您,<strong><?php echo ($nickname=session('nickname')); ?></strong></a>
    <a class="welcome_user" >所属区域 :<strong><?php echo ($arealev=session('arealev')); ?></strong></a>
    <a class="logout" href="/echxx/edit.php/Home/Index/loginout">退出</a>
    <!-- <a class="user_messages" href="#"><span>12</span></a> -->
    </dd>
</dl>
<h2>地区列表</h2>
<ul>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/echxx/edit.php/Home/Index/edit/areaid/<?php echo ($vo["id"]); ?>/areaname/<?php echo ($vo["areaname"]); ?>"><span class="iconsweet">k</span><?php echo ($vo["areaname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</nav>
<!--Content Wrap-->
<div id="content_wrap">	<!--Activity Stats-->                
     
<!--One_Wrap-->
<?php if(!empty($clist)): ?><form action="/echxx/edit.php/Home/Index/daodu_add" method="post" name="daodu_add" enctype="multipart/form-data">
 	<div class="one_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">r</span><h5>导读管理:<?php echo ($bookname); ?></h5></div>
            <div class="widget_body">
				<!--Form fields--> 
                <ul class="form_fields_container">
                	<li> 
                        <label>导读内容:</label> 
                        <div class="form_input">
                            <input name="navinfo" type="text">
                        </div>
                    </li> 
                    <li> 
                        <label>排序编号:</label> 
                        <div class="form_input">
                            <input name="orderid" type="text" value='<?php echo ($totle); ?>'>
                        </div>
                    </li> 
                    <li><label></label><div class="form_input"> 
                            <input name="areaname" type="hidden" value="<?php echo ($areaname); ?>">
                            <input name="bookname" type="hidden" value="<?php echo ($bookname); ?>">
                            <input name="groupname" type="hidden" value="<?php echo ($groupname); ?>">
                            <input onmouseover="this.style.borderColor='#99E300'" onmouseout="this.style.borderColor='#A1BCA3'"  type="submit"  value="添加导读" onclick="return ifadd();" />
                    </div></li>        
                </ul>
            </div>
        </div>
    </div>
</form><?php endif; ?>             
	<!--One_Wrap-->
<?php if(!empty($nlist)): ?><div class="one_wrap">
        <div class="widget">
            <div class="widget_title"><span class="iconsweet">f</span><h5>导读列表</h5></div>
            <div class="widget_body">
                <!--Activity Table-->
                <table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
                    <?php if(is_array($nlist)): $i = 0; $__LIST__ = $nlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nvo): $mod = ($i % 2 );++$i;?><tr> 
                            <th width="10%"><?php echo ($i); ?></th>
                            <th width="20%"><?php echo ($nvo["bookname"]); ?></th>
                            <th width="20%"><?php echo ($nvo["groupname"]); ?></th>
                            <th width="20%"><?php echo ($nvo["orderid"]); ?></th>
                            <th width="20%"><?php echo ($nvo["navinfo"]); ?></th> 
                            <th width="10%">
                                <span class="data_actions iconsweet">  
                                    <a class="tip_north" original-title="编辑" onclick="ifedit(<?php echo ($nvo["id"]); ?>,<?php echo ($nvo["orderid"]); ?>,'<?php echo ($nvo["navinfo"]); ?>')" data-toggle="modal" href="#myModal">C</a>
                                    <a class="tip_north" original-title="删除" href="/echxx/edit.php/Home/Index/daodudelete/daoduid/<?php echo ($nvo["id"]); ?>" onclick="return ifdel();">X</a>
                                </span>
                            </th>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table> 
            </div>
        </div>
    </div><?php endif; ?>
 	<br class="clear" />          
</div>
</section>
</div>

<div id="mymodal">

</div>
</body>
</html>