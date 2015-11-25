<?php
namespace Home\Model;
use Think\Model;
/**
*  ApiCloud 统计云Count
*/
class CountModel extends ApicloudModel
{    
    
    function getcountdata($startDate,$endDate)
    {
  
        echo $this->go($startDate,$endDate);
    }

	function Go($startDate,$endDate)
	{
		$url = "https://p.apicloud.com/analytics/getAppStatisticDataById";
    	$body = "startDate=$startDate&endDate=$endDate";
    	
    	return $this->http->post($url,$body);
	}
}
?>