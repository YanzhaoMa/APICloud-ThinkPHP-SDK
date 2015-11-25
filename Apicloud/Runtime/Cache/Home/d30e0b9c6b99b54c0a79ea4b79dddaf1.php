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
function lanmuifadd() 
{ 
    if(lanmu_add.bookname.value==''){
     alert("期数说明不能为空！");
     lanmu_add.bookname.focus();
     return false;
    }
    if (!confirm("确认要添加？")) {
            window.event.returnValue = false; //取消删除
        } 
}
function contentifadd() 
{ 
 
    if (!confirm("确认要添加？")) {
            window.event.returnValue = false; //取消删除
        }else{
            //获取select当前的name值 并且传递给input(groupname)
            var selectid=content_add.groupindex.options.selectedIndex; 
            var groupname=content_add.groupindex[selectid].innerHTML;
            if(content_add.groupindex.value==0){
                alert('请选择栏目！');
                return false;
            }else{
                content_add.groupname.value=groupname;  
                    var daoduindex=content_add.daodulist.options.selectedIndex; 
                    var daoduname=content_add.daodulist[daoduindex].innerHTML;
                    if(content_add.daodulist.value==0){

                    }else{
                        content_add.daoduindex.value=daoduname;
                    }
            }
        } 
}
function ifedit(editid,orderid){  //修改groupid orderid
    var html='';
 
        html+='<div class="modal hide" id="myModal" >';
        html+='<div class="modal-header">';
        html+='<a class="close" data-dismiss="modal">×</a>';
        html+='<h3>栏目编辑:</h3>';
        html+='</div>';
        html+='<div class="modal-body"> <div class="form_input">';
        html+='      <p>栏目编号:<input id="orderid" type="text" value="'+orderid+'"></p>'; 
        html+='</div></div>';
        html+='<div class="modal-footer">';
        html+='<a data-dismiss="modal" class="greyishBtn button_small" href="#">取消</a>';
        html+='<a  data-toggle="modal" class="greyishBtn button_small" href="#" onclick="editorderid('+editid+');"    >保存</a>';
        html+='</div>';
        html+='</div>';

    $("#mymodal").html(html); 
}
function editorderid(editid){   //修改groupid orderid
     var orderid=$("#orderid").val();   
     $.post("/echxx/edit.php/Home/app/editgrouporderid/",{editid:editid,orderid:orderid},function(re){
        if(re=="200"){
            // alert('修改成功!'); 
            document.getElementById('myModal').style.display='none';
             location.replace(location.href);
        }else{
            alert('修改失败!');
        }
    });
}

 
 

function ifdel(){ 
        if (!confirm("确认要删除？")) {
            window.event.returnValue = false; //取消删除
        } 
   
}
function getnav(areaname,bookname){
    var selectid=content_add.groupindex.options.selectedIndex; 
    var groupname=content_add.groupindex[selectid].innerHTML; 
    if(content_add.groupindex.value==0){ 
        $("#listdiv").hide(); 
        return false;
    }else{ 
        $("#listdiv").hide();  
        $.post("/echxx/edit.php/Home/app/navinfolist",{areaname:areaname,bookname:bookname,groupname:groupname},function(re){  
        var navinfo=eval('(' + re + ')');
        if(navinfo.response_status=='200'){ 
        var navlist=navinfo.response_list; 
        var html=''; 
            // $("#daodulist").empty(); 
            // $("#daodulist").append("<option value='0'  selected = 'selected'>请选择导航</option>"); 
            html+='<li><div class="content_pad" >';
            for(var i in navlist){
                // html+='<label class="button_small whitishBtn"><input name="daoduindex['+i+']" type="checkbox"/>'+navlist[i]+'</label>';
                html+='<label class="button_small whitishBtn"><input  type="checkbox" name="daoduindex['+i+']" value="'+navlist[i]['navinfo']+'" />'+navlist[i]['navinfo']+'</label>';  
                 // $("#daodulist").append("<option value='"+navlist[i]+"' >"+navlist[i]+"</option>");  
            }  
            html+='</div></li>';
            // $("#daodulist").change();
            $("#listdiv").html(html);
            $("#listdiv").show();
        }else{
            alert('获取数据失败!');
        }
        });
 
         
    }
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
<form action="/echxx/edit.php/Home/Index/lanmu_add" method="post" name="lanmu_add" enctype="multipart/form-data">
 	<div class="one_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">r</span><h5>栏目管理:<?php echo ($blist[0]["bookname"]); ?></h5></div>
            <div class="widget_body">
				<!--Form fields--> 
                <ul class="form_fields_container">
                	<li><label>栏目名称:</label> 
                        <div class="form_input"><input name="groupname" type="text"></div>
                    </li>  
                    <li><label>栏目简介:</label><div class="form_input">
                            <input name="groupinfo" type="text">
                    </li>
                    <li><label>排序编号:</label><div class="form_input">
                            <input name="orderid" value="<?php echo ($lmtotle); ?>" type="text">
                    </li>
                    <li><label>栏目封面:</label> <div class="form_input">
                        <input name="groupimage"  type="file" accept="image/png,image/jpeg"  />
                    </div></li>
                    <li><label></label><div class="form_input">
                            <input name="bookname" type="hidden" value="<?php echo ($blist[0]["bookname"]); ?>">
                            <input name="bookindex" type="hidden" value="<?php echo ($blist[0]["id"]); ?>">
                            <input name="areaname" type="hidden" value="<?php echo ($blist[0]["areaname"]); ?>">
                            <input onmouseover="this.style.borderColor='#99E300'" onmouseout="this.style.borderColor='#A1BCA3'"  type="submit"  value="添加栏目" onclick="return lanmuifadd();" />
                    </div>
                    </li>        
                </ul>
            </div>
        </div>
    </div>
</form>
                      
	<!--One_Wrap-->
<?php if(!empty($clist)): ?><div class="one_wrap">
        <div class="widget">
            <div class="widget_title"><span class="iconsweet">f</span><h5>栏目列表</h5></div>
            <div class="widget_body">
                <!--Activity Table-->
                <table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
                    <?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cvo): $mod = ($i % 2 );++$i;?><tr> 
                            <th width="5%"><?php echo ($i); ?></th>
                            <th width="10%"><?php echo ($cvo["bookname"]); ?></th>
                            <th width="10%"><?php echo ($cvo["orderid"]); ?></th>
                            <th width="10%"><?php echo ($cvo["groupname"]); ?></th> 
                            <th width="20%"><?php echo ($cvo["groupinfo"]); ?></th> 
                            <th width="10%"><a href='/echxx/edit.php/Home/Index/daoduedit/areaname/<?php echo ($areaname); ?>/bookname/<?php echo ($cvo["bookname"]); ?>/groupname/<?php echo ($cvo["groupname"]); ?>'>导读管理</a></th> 
                            <th width="10%"><?php echo ($cvo["intime"]); ?></th>
                            <th width="5%">
                                <span class="data_actions iconsweet"> 
                                    <a class="tip_north" original-title="编辑" onclick="ifedit(<?php echo ($cvo["id"]); ?>,<?php echo ($cvo["orderid"]); ?>)" data-toggle="modal" href="#myModal">C</a>
                                    <a class="tip_north" original-title="删除" href="/echxx/edit.php/Home/Index/lanmudelete/lanmuid/<?php echo ($cvo["id"]); ?>" onclick="return ifdel();">X</a>
                                </span>
                            </th>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table> 
            </div>
        </div>
    </div><?php endif; ?>
    <!--One_TWO-->  
<?php if(!empty($clist)): ?><form action="/echxx/edit.php/Home/Index/content_add" method="post" name="content_add" enctype="multipart/form-data">
    <div class="one_wrap">
        <div class="widget">
            <div class="widget_title"><span class="iconsweet">8</span><h5>栏目内容添加</h5></div>
            <div class="widget_body">
                <ul class="form_fields_container">
                    <li><label>栏目选择:</label> <div class="form_input">
                    <select name="groupindex"  onChange="getnav('<?php echo ($blist[0]["areaname"]); ?>','<?php echo ($blist[0]["bookname"]); ?>')">
                        <option value='0'>请选择栏目</option>
                        <?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cvo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($cvo["id"]); ?>'><?php echo ($cvo["groupname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>  
                    </div>
                    </li>
                    <div id="listdiv" style="display: none" > 
                        <!-- <select id="daodulist" >            </select>  --> 
 
                     
                    </div>
                    <li><label>内容简介:</label> <div class="form_input">
                        <input name="info" type="text" value="">
                    </div></li> 
                    <li><label>添加图片:</label> <div class="form_input">
                        <input name="imageurl"  type="file" accept="image/png,image/jpeg"  />
                    </div></li> 
                    <li><label>添加PDF:</label> <div class="form_input">
                        <input name="pdfurl"  type="file" accept="application/pdf"  />
                    </div></li> 
                    <li><label>排序编号:</label> <div class="form_input">
                        <input name="orderid" type="text" value="<?php echo ($totle); ?>" >
                    </div></li> 
                    <li><label></label> <div class="form_input">
                    <input name="areaname" type="hidden" value="<?php echo ($blist[0]["areaname"]); ?>">
                    <input name="groupname" type="hidden" value="">
                    <input name="bookname" type="hidden" value="<?php echo ($blist[0]["bookname"]); ?>">
                    <input name="bookindex" type="hidden" value="<?php echo ($blist[0]["id"]); ?>"> 
                    <input onmouseover="this.style.borderColor='#99E300'" onmouseout="this.style.borderColor='#A1BCA3'"  type="submit"  value="添加内容" onclick="return contentifadd();" />
                    </div></li>
                </ul>
            </div>
        </div>
    </div>
 </form><?php endif; ?>

        <!--Gallery Sortable--> 
<?php if(!empty($cslist)): ?><div class="widget">
                    <div class="widget_title"><span class="iconsweet">3</span><h5>内容详细展示</h5></div>
                    <div class="widget_body">
                    <ul class="filter_project">
                        <li class="segment  selected"><a class="all" href="#">所有<span class="count"><?php echo ($csum); ?></span></a></li>
                        <?php if(is_array($csgroup)): $i = 0; $__LIST__ = $csgroup;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$csvo): $mod = ($i % 2 );++$i;?><li class="segment"><a class="cs<?php echo ($csvo["groupindex"]); ?>" href="#"><?php echo ($csvo["groupname"]); ?><span class="count"><?php echo ($csvo["count"]); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?> 
                     </ul>
                        <div class="gallery_container">
                            <ul class="project_list">
                            <?php if(is_array($cslist)): $i = 0; $__LIST__ = $cslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cslistvo): $mod = ($i % 2 );++$i;?><li data-id="id-1" data-type="cs<?php echo ($cslistvo["groupindex"]); ?>">
                                    <a id="gallery_box" href="/echxx/Uploads/<?php echo ($cslistvo["imageurl"]); ?>" title="简介:<?php echo ($cslistvo["info"]); ?> 导读:<?php echo ($cslistvo["daoduindex"]); ?> 序号:<?php echo ($cslistvo["orderid"]); ?>">
                                    <img src="/echxx/Uploads/m_<?php echo ($cslistvo["imageurl"]); ?>" width="134" height="204" alt="点击查看大图" />
                                    </a>
                                    <span class="name"><a href="/echxx/Uploads/<?php echo ($cslistvo["pdfurl"]); ?>"><?php echo ($cslistvo["info"]); ?></a></span>
                                    <div class="modify_image">    
                                    <a  href="/echxx/edit.php/Home/Index/contentdelete/contentid/<?php echo ($cslistvo["id"]); ?>" onclick="return ifdel();" class="iconsweet tip_north" title="删除">X</a></div>                                   
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
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