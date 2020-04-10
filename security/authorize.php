<?php
namespace classes\security;
use classes\dal\Context as Context;
use classes\common\helpers\Utils as Utils;
use classes\security\UserRetrieveService as UserRetrieveService;

class Authorize
{
	public $permission=array();
	
	public function __construct(){
		$this->permission=array();
		$this->setPermissions();
	}
	
	private function setPermissions(){
	    if(!isset($_SESSION["authorize"]) && !empty(Utils::getCookie("userToken"))){
            $_SESSION["authorize"]=true;
            $_SESSION["userToken"]=Utils::getCookie("userToken");
        }
		if(isset($_SESSION["authorize"]) && $_SESSION["authorize"]==true) {
            $userToken = $_SESSION["userToken"];
            $privileges = $this->getUserPrivileges($userToken);

            foreach ($privileges as $permission) {
                $this->permission[$permission["name"]] = true;
            }
            UserRetrieveService::setUserDefinition(null,$userToken);
        }
	}
	
	private function getUserPrivileges($userToken){
		$entity="user";
		$context=new Context($entity);
		$context->tableAs("u");
		$context->select("p.name");
        $context->join_on("user_roles as ur on ur.userId=u.id");
		$context->join_on("role_permissions as rp on ur.roleId=rp.roleId");
		$context->join_on("permissions as p on rp.permissionId=p.id");
		$context->where("u.token='$userToken'");
		return $context->fetchAll();
	}
	
	public function hasPrivilege($value){
		if(isset($_SESSION["authorize"]) && $_SESSION["authorize"]){
			return !empty($this->permission) && isset($this->permission[$value]) && $this->permission[$value];
		}
		return false;
	}

	public function authorized(){
        if(isset($_SESSION["authorize"]) && $_SESSION["authorize"]){
            return true;
        }
        return false;
    }
}
?>