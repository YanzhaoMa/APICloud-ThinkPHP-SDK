<?php
namespace Home\Controller;
use Think\Controller;
class AppController extends Controller {
    public function index(){ 
            echo "hello world!---zhe app data interface.";
    		 
        }

    public function countyun(){  //统计云接口数据
        $count = D('Count');
        $d=strtotime('-7 days'); 
        $qdate=date("Y-m-d",$d);
        $tdate=date("Y-m-d");
        $count->getcountdata($qdate,$tdate);

    }
    
 
}