<?php

/**
 * 百度地图api配置
 */
return [
    'ak'=>'qzQSmmKTqAkhh7xcmTAplXmiadoKQIPp',
    'baidu_map_url'=>'http://api.map.baidu.com/',
    'geocoder'=>'geocoder/v2/',                     //经纬度
    'staticimage'=>'staticimage/v2',                //静态图地址
    'panorama'=>'panorama/v2',                      //全景图地址
    'ip'=>'location/ip',                            //IP定位
    'width'=>300,
    'height'=>200,
    'fov'=>180                                      //水平方向范围，范围[10,360]，fov=360即可显示整幅全景图

];