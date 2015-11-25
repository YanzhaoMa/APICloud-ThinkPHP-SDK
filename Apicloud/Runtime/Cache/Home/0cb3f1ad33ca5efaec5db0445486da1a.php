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
function opidifadd() 
{ 
    if(opid_add.opid.value==''){
     alert("渠道编号不能为空！");
     opid_add.opid.focus();
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
function ifedit(editid,opid){  //修改groupid orderid
    document.getElementById('myModal').style.display='';
    var html='';
 
        html+='<div class="modal hide" id="myModal" >';
        html+='<div class="modal-header">';
        html+='<a class="close" data-dismiss="modal">×</a>';
        html+='<h3>栏目编辑:</h3>';
        html+='</div>';
        html+='<div class="modal-body"> <div class="form_input">';
        html+='      <p>渠道号:<input id="opid" type="text" value="'+opid+'"></p>'; 
        html+='</div></div>';
        html+='<div class="modal-footer">';
        html+='<a data-dismiss="modal" class="greyishBtn button_small" href="#">取消</a>';
        html+='<a  data-toggle="modal" class="greyishBtn button_small" href="#" onclick="editopid('+editid+');"    >保存</a>';
        html+='</div>';
        html+='</div>';

    $("#mymodal").html(html); 
}
function editopid(editid){   //修改opid
    if (!confirm("确认要修改？")) {
            window.event.returnValue = false; //取消删除
        }else{
             var opid=$("#opid").val();   
             $.post("/echxx/edit.php/Home/index/editopidbyid/",{editid:editid,opid:opid},function(re){
                if(re=="200"){
                    // alert('修改成功!'); 
                    document.getElementById('myModal').style.display='none';
                     location.replace(location.href);
                }else{
                    alert('修改失败!');
                }
            });
        }
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
 
/*
devicesCount   设备总数
newRegsCount    当天新注册用户数
newUpdateCount  当天新升级用户数
activeCountInToday  当天活跃用户数
activeCountInSevenDays  七日内活跃用户数
activeCountInThirtyDays 三十日内活跃用户数
totalUseTime    应用累计使用时长
totalOperationCount 应用累计使用次数
totalUseTimeInSevenDays 七日内累计使用时长
totalUseTimeInThirtyDays    三十日内累计使用时长
totalOperationCountInSevenDays  七日内累计使用次数
totalOperationCountInThirtyDays 三十日内累计使用次数
reportDate  统计数据生成时间

*/
function getcount(){   //获取统计云的安装数据报表
        
        var html='';
        $.get("/echxx/edit.php/Home/app/countyun"
            ,function(re){
                var navinfo=eval('(' + re + ')'); 
                if(navinfo.st==1){ 
                    var navlist=navinfo.msg;  
               
                    
                              
                    for(var i in navlist){
                        var rq=navlist[i]['reportDate'].substring(0, 10); //统计日期  
                        var newshu=navlist[i]['newRegsCount'];  //新增用户
                        var allshu=navlist[i]['devicesCount'];  //累计用户
                        var huoyue=navlist[i]['activeCountInToday']; //当日活跃用户数
                        var huoyuebi=(huoyue / allshu *100).toFixed(2) +'%'; //活跃用户占比
                        // var qidongcishu=navlist[i]['totalOperationCount'];  //当日启动次数  
                            
                             html+=' <tr>'; 
                             html+='<th width="10%">'+rq+'</th> ';
                             html+='<th width="10%">'+newshu+'</th> ';
                             html+='<th width="10%">'+allshu+'</th> ';
                             html+='<th width="10%">'+huoyue+'</th> ';
                             html+='<th width="10%">'+huoyuebi+'</th> ';
                             // html+='<th width="10%">'+qidongcishu+'</th> ';
                             html+=' </tr>';  
                    } 
                             $("#huizong").append(html);   
                }
        });
}
 getcount();
</script> 
</head>
<body>
<!--Header-->
<header>
    <!--Logo-->
    <div id="logo"><img src="/echxx/Public/images/logo.png" alt="" /> </div>
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
            <li class="nav_forms "><a href="/echxx/edit.php/Home/Index/edit">内容编辑</a></li>
            <li class="nav_graphs active"><a href="/echxx/edit.php/Home/Index/opidedit">数据报表</a></li>  
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
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/echxx/edit.php/Home/Index/opidedit/area/<?php echo ($vo["area"]); ?>" title="推广员:<?php echo ($vo["areacount"]); ?>个"><span class="iconsweet">t</span><?php echo ($vo["area"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</nav>
 
<!--Content Wrap-->
<div id="content_wrap">	<!--Activity Stats-->    
    <!--Date Picker--> 
     <div class="one_wrap fl_left"> 
         <div class="widget">
             <div class="widget_title"><span class="iconsweet">3</span><h5>总数据统计: </h5></div>
             <div class="widget_body">
                 <table id="huizong" class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
                    <tr>             
                        <th>统计日期:</th><th>新增用户:</th><th>累计用户:</th> <th>活跃用户:</th> <th>活跃比例:</th>
                    </tr>
                     
                 </table> 
            </div> 
         </div>
     </div>


    <form action="/echxx/edit.php/Home/Index/opidedit" method="post" name="query"  enctype="multipart/form-data">
        <div class="one_wrap fl_left">
            <div class="widget">
                <div class="widget_title"><span class="iconsweet">R</span><h5>查询日期范围:</h5></div>
                    <div class="widget_body">
                    <ul class="form_fields_container">
                        <li><label>起始日期:</label> 
                            <div class="form_input">
                            <input style="width:20%" name="startdate" value="<?php echo date('Y-m-d',strtotime('-1 days')); ?>" type="text" id="datepicker"></div></li>  
                        <li><label>截止日期:</label> 
                            <div class="form_input">
                            <input style="width:20%" name="enddate" value="<?php echo date('Y-m-d'); ?>" type="text" id="datepicker_inline" ></div></li> 
                        <li><div class="form_input"><input name="area" type="hidden" value="<?php echo ($area); ?>"> 
                            <input onmouseover="this.style.borderColor='#99E300'" onmouseout="this.style.borderColor='#A1BCA3'"  type="submit"  value="查询"  /></div></li>
                    </ul>
                </div>
            </div>  
        </div>
    </form>

    <?php if(!empty($countlist)): ?><div class="one_wrap fl_left">
                    <div class="widget">
                        <div class="widget_title"><span class="iconsweet">3</span><h5>地区数据统计: (<?php echo ($startdate); ?>)--(<?php echo ($enddate); ?>)
                        <a   class="greyishBtn button_small" style="cursor:pointer" href="/echxx/edit.php/Home/Index/outexcel_countarea/startdate/<?php echo ($startdate); ?>/enddate/<?php echo ($enddate); ?>">导出Excel</a>
                        </h5></div>
                        <div class="widget_body">
                        <table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
                            <tr>
                                <th>编号:</th><th>地区:</th><th>日期:</th> <th>安装数量:</th> 
                            </tr>
                        <?php if(is_array($countlist)): $i = 0; $__LIST__ = $countlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cvo): $mod = ($i % 2 );++$i;?><tr> 
                                <th width="5%"><?php echo ($i); ?></th> 
                                <th width="10%"><?php echo ($cvo["area"]); ?></th>
                                <th width="10%"><?php echo ($cvo["dd"]); ?></th>
                                <th width="10%"><?php echo ($cvo["cc"]); ?></th> 
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table> 
                    </div> 
                </div>
        </div><?php endif; ?>


    <?php if(!empty($opidlist)): ?><div class="one_wrap fl_left">
                    <div class="widget">
                        <div class="widget_title"><span class="iconsweet">3</span><h5>分公司数据统计: <?php echo ($opidlist[0]["area"]); ?>(<?php echo ($startdate); ?>)--(<?php echo ($enddate); ?>)
                            <a   class="greyishBtn button_small" style="cursor:pointer" href="/echxx/edit.php/Home/Index/outexcel_area/startdate/<?php echo ($startdate); ?>/enddate/<?php echo ($enddate); ?>/area/<?php echo ($opidlist[0]["area"]); ?>">导出统计</a>
                            <a   class="greyishBtn button_small" style="cursor:pointer" href="/echxx/edit.php/Home/Index/outexcel_xd/startdate/<?php echo ($startdate); ?>/enddate/<?php echo ($enddate); ?>/area/<?php echo ($opidlist[0]["area"]); ?>">导出详单</a>
                            </h5></div>
                        <div class="widget_body">
                        <table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
                            <tr>
                                <th>编号:</th><th>地区:</th><th>推广员:</th><th>渠道号:</th> <th>安装数量:</th> <th>查看:</th><th>导出Excel</th><th >操作:</th>
                            </tr>
                        <?php if(is_array($opidlist)): $i = 0; $__LIST__ = $opidlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cvo): $mod = ($i % 2 );++$i;?><tr> 
                                <th width="5%"><?php echo ($i); ?></th> 
                                <th width="10%"><?php echo ($cvo["area"]); ?></th>
                                <th width="10%"><?php echo ($cvo["uname"]); ?></th>
                                <th width="10%"><?php echo ($cvo["opid"]); ?></th>
                                <th width="10%"><?php echo ($cvo["cc"]); ?></th> 
                                <th width="10%"><a href='/echxx/edit.php/Home/Index/opidedit/area/<?php echo ($cvo["area"]); ?>/opid/<?php echo ($cvo["opid"]); ?>/q1/<?php echo ($startdate); ?>/q2/<?php echo ($enddate); ?>'>查看详单</a></th> 
                                <th width="10%"><a href="/echxx/edit.php/Home/Index/outexcel/opid/<?php echo ($cvo["opid"]); ?>/startdate/<?php echo ($startdate); ?>/enddate/<?php echo ($enddate); ?>">导出</a></th>   
                                <th width="5%">
                                    <span class="data_actions iconsweet">  
                                        <a class="tip_north" original-title="删除" href="/echxx/edit.php/Home/Index/opiddelby/opidid/<?php echo ($cvo["opid"]); ?>" onclick="return ifdel();">X</a>
                                    </span>
                                </th>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table> 
                    </div> 
                </div>
        </div><?php endif; ?>
    <?php if(!empty($opidnolist)): ?><div class="one_wrap fl_left">
                    <div class="widget">
                        <div class="widget_title"><span class="iconsweet">3</span><h5>分公司数据统计(推广数为0): <?php echo ($opidlist[0]["area"]); ?>(<?php echo ($startdate); ?>)--(<?php echo ($enddate); ?>) 
                            </h5></div>
                        <div class="widget_body">
                        <table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
                            <tr>
                                <th>编号:</th><th>地区:</th><th>推广员:</th><th>渠道号:</th>  <th>添加日期</th><th >操作:</th>
                            </tr>
                        <?php if(is_array($opidnolist)): $i = 0; $__LIST__ = $opidnolist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cvo): $mod = ($i % 2 );++$i;?><tr> 
                                <th width="5%"><?php echo ($i); ?></th> 
                                <th width="10%"><?php echo ($cvo["area"]); ?></th>
                                <th width="10%"><?php echo ($cvo["uname"]); ?></th>
                                <th width="10%"><?php echo ($cvo["opid"]); ?></th>
                                <th width="10%"><?php echo ($cvo["intime"]); ?></th>  
                                <th width="5%">
                                    <span class="data_actions iconsweet">  
                                        <a class="tip_north" original-title="删除" href="/echxx/edit.php/Home/Index/opiddelby/opidid/<?php echo ($cvo["opid"]); ?>" onclick="return ifdel();">X</a>
                                    </span>
                                </th>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table> 
                    </div> 
                </div>
        </div><?php endif; ?>

      

        <!--Gallery Sortable--> 
<?php if(!empty($qlist)): ?><div class="one_wrap">
                <div class="widget">
                    <div class="widget_title"><span class="iconsweet">3</span><h5>推广用户详单:<?php echo ($area); ?> <?php echo ($qlist[0]["opid"]); ?> 
                    </h5></div>
                    <div class="widget_body">
                    <table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
                        <tr>
                            <th>编号:</th><th>系统类型:</th><th>系统版本:</th><th>设备标识:</th><th>设备型号:</th>
                            <th>设备名称:</th><th>屏幕尺寸:</th><th>网络状态:</th><th>推广日期:</th>
                        </tr>
                    <?php if(is_array($qlist)): $i = 0; $__LIST__ = $qlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cvo): $mod = ($i % 2 );++$i;?><tr> 
                            <th width="5%"><?php echo ($i); ?></th> 
                            <th width="10%"><?php echo ($cvo["systemType"]); ?></th>
                            <th width="10%"><?php echo ($cvo["systemVersion"]); ?></th> 
                            <th width="20%"><?php echo ($cvo["deviceId"]); ?></th> 
                            <th width="10%"><?php echo ($cvo["deviceModel"]); ?></th>  
                            <th width="10%"><?php echo ($cvo["deviceName"]); ?></th>  
                            <th width="10%">w:<?php echo ($cvo["winWidth"]); ?>h:<?php echo ($cvo["winHeight"]); ?></th> 
                            <th width="10%"><?php echo ($cvo["connectionType"]); ?></th> 
                            <th width="10%"><?php echo ($cvo["intime"]); ?></th> 
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table> 
                </div> 
         </div><?php endif; ?>

<!--One_Wrap-->
<form action="/echxx/edit.php/Home/Index/opidadd" method="post" name="opid_add" enctype="multipart/form-data">
    <div class="one_wrap fl_left">
        <div class="widget">
            <div class="widget_title"><span class="iconsweet">r</span><h5>渠道管理</h5></div>
            <div class="widget_body">
                <!--Form fields--> 
                <ul class="form_fields_container">
                    <li><label>地区名称:</label> 
                        <div class="form_input"><input name="area" type="text"></div>
                    </li> 
                    <li><label>推广员:</label>
                        <div class="form_input"><input name="uname" type="text">
                    </li> 
                    <li><label>渠道编号:</label>
                        <div class="form_input"><input name="opid" type="text">
                    </li>
                    <li><label>其他说明:</label>
                        <div class="form_input"><input name="memo"   type="text">
                    </li> 
                    <li><label></label><div class="form_input">
                            <input name="adduser" type="hidden" value="<?php echo ($nickname); ?>"> 
                            <input onmouseover="this.style.borderColor='#99E300'" onmouseout="this.style.borderColor='#A1BCA3'"  type="submit"  value="添加渠道" onclick="return opidifadd();" />
                    </div>
                    </li>        
                </ul>
            </div>
        </div>
    </div>
</form>
    <?php if(!empty($nonamelist)): ?><div class="one_wrap fl_left">
                        <div class="widget">
                            <div class="widget_title"><span class="iconsweet">3</span><h5>未加入推广渠道数据: </h5></div>
                            <div class="widget_body">
                            <table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
                                <tr>
                                    <th>编号:</th><th>推广号:</th> <th>安装数量:</th> 
                                </tr>
                            <?php if(is_array($nonamelist)): $i = 0; $__LIST__ = $nonamelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cvo): $mod = ($i % 2 );++$i;?><tr> 
                                    <th width="5%"><?php echo ($i); ?></th> 
                                    <th width="10%"><?php echo ($cvo["opid"]); ?></th> 
                                    <th width="10%"><?php echo ($cvo["cc"]); ?></th> 
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

<script type="text/javascript">
    var startdate=$("#datepicker").attr("value");
</script>
 
</body>
</html>