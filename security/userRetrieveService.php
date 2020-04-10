<?php
namespace classes\security;

use classes\security\UserDefinition as UserDefinition;
use classes\common\helpers\Cache as Cache;
use classes\dal\Context as Context;

class UserRetrieveService
{
    private static function getUserFirstData($userId,$userToken){
        $entity="user";
        $context=new Context($entity);
        if($userId!=null){$context->where("id='$userId'"); }
        if($userToken!=null){$context->where("token='$userToken'");}
        $context->select("id,fullName,image,email");
        $user = $context->fetchFirstOrDefault();

        $definition = new UserDefinition();
        $definition->UserId=$user["id"];
        $definition->UserImage=empty($user["image"])?DEF_PROFILE_IMG:$user["image"];
        $definition->UserFullName=$user["fullName"];
        $definition->UserEmail=$user["email"];
        return $definition;
    }

    public static function setUserDefinition($userId,$userToken){
        $userDefinitionData=self::getUserFirstData($userId,$userToken);
        Cache::set("userDefinition", $userDefinitionData);
    }

    public static function getUserDefinition(){
        if(empty(Cache::get("userDefinition"))){
            return [];
        }
        $data = Cache::get("userDefinition");
        $definition = new UserDefinition();
        $definition->UserId=$data->UserId;
        $definition->UserImage=$data->UserImage;
        $definition->UserFullName=$data->UserFullName;
        $definition->UserEmail=$data->UserEmail;
        return $definition;
    }

    public static function resetUserDefinition($userId=null){
        Cache::reset("userDefinition");
        if($userId!=null){
            self::setUserDefinition($userId,null);
        }
    }
}