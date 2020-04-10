<?php
namespace classes\common\navigation;

use classes\common\navigation\NavigationModel as NavigationModel;
use classes\security\Authorize as Authorize;

class NavigationAssembly
{
    private static $navArray= array();
    private static $authorize;

    public static function menu($group,$title){
        $model=new NavigationModel();
        $model->group=$group;
        $model->title=$title;
        $model->isMenu=true;
        array_push(self::$navArray, $model);
    }

    public static function link($group,$title,$url,$permission=null){
        if(!isset(self::$authorize)){
            self::$authorize = new Authorize();
        }
        if(self::$authorize->hasPrivilege($permission) || $permission==null) {
            $model = new NavigationModel();
            $model->group = $group;
            $model->title = $title;
            $model->url = $url;
            $model->isMenu=false;
            $model->permission = $permission;
            self::setNavigationLink($group, $model);
        }
    }

    public static function getNavigation(){
        $nav = new NavigationItems();
        $nav->init();
        foreach(self::$navArray as $key=>$item){
            if($item->isMenu==true && empty($item->childLinks)){
                unset(self::$navArray[$key]);
            }
        }
        return self::$navArray;
    }

    private static function setNavigationLink($group,$model){
        foreach(self::$navArray as $item){
            if($item->isMenu==true && $item->group==$group){
                array_push($item->childLinks, $model);
                return;
            }
        }
        array_push(self::$navArray, $model);
    }
}