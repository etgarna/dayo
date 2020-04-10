<?php
namespace classes\common\system;

class NodeHierarchy
{
	private $permissions;
	private $rolePermissionsIds;
	private $permissionNodes;
	
	public function __construct($permissions, $rolePermissionsIds){
		$this->permissions=$permissions;
		$this->rolePermissionsIds=$rolePermissionsIds;
		$this->sortPermissionsList($permissions);
	}
	
	public function buildTree($permission=""){
		$nodeList=array();
		$subParts=$this->findSubPaths($permission);
		foreach($subParts as $part){
			$nodeName=$this->getPageName($part);
			if(substr($part,-1)=="."){
				$node=array();
			    $node[$nodeName]=$this->buildTree($part);
				array_push($nodeList,$node);
			}
			else{
				$id = array_column(array_filter($this->permissions,function($item)use($permission,$nodeName){
					return $item["name"]==$permission.$nodeName;
				}),"id")[0];
				
				$permissionActive = in_array($id,$this->rolePermissionsIds);
				
				array_push($nodeList,array($id,$nodeName,$permissionActive));
			}
		}
		return $nodeList;
	}
	
	private function sortPermissionsList($permissions){
		$this->permissionNodes=array();
		foreach($permissions as $item){
			$value="";
			$parts=explode(".",$item["name"]);
			for($i=0; $i<count($parts); $i++){
				$value.=$parts[$i].=((count($parts)-1)!=$i)?".":"";
				if(!in_array($value,$this->permissionNodes)){
					array_push($this->permissionNodes,$value);
				}
			}
		}
	}
	
	private function getPageName($permission){
		$permission=explode(".",$permission);
		$result = array_reverse( array_filter( $permission, function ( $value ) {
			return strlen($value) > 0;
		}));
		
		if(current($result)){
			return current($result);
		}
		return "";
	}
	
	private function findSubPaths($permission){
		return array_filter($this->permissionNodes,function($value)use($permission){
			$pattern="/^".$permission."[^.]*.?$/";
			return $value!=$permission && preg_match($pattern,$value);
		});
	}
}
?>