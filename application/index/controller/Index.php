<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
       return $this->fetch();
    }
    public function welcome(){
        return $this->fetch();
    }
    public function geocoder(){
        $result = \Map::getLngLat("重庆市南岸区国际社区观园2期");
        $location=json_decode($result)->result->location;
        $location=$location->lng.",".$location->lat;
        return \Map::panorama($location);

    }
    public function getIp(){

    }

}
