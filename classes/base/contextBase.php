<?php
namespace classes\base;

use PDOException;

class ContextBase
{
	private $db;
	private $table;
	private $columns;
	private $where;
    private $updateValues;
	private $join_on;
	private $query;
	private $type;
	private $arrayData;
	private $entity;
	
	public function __construct($entity) {
		global $dbObject;
		$this->db = $dbObject;
		$this->table = $this->getTable($entity);
		$this->entity=$entity;
		$this->columns="*";
		$this->where="";
	}
	
	private function getTable($entity){
		if(substr($entity,-1)=="y"){
			return substr_replace($entity ,"ies",-1);
		}
		return $entity.'s';
	}
	
	
	public function Add($data){
		$entity=$this->entity;
		
		$arrayAllFields = array_keys($this->$entity->fieldsTable());
		$arraySetFields = array();
		$arrayData = array();
        $rangePlace=array();
		
		foreach($arrayAllFields as $field){
			if(property_exists($data,$field)){
				$this->$entity->$field=$data->$field;
				$arraySetFields[] = $field;
			    $arrayData[] = $data->$field;
                $rangePlace[] = is_bool($data->$field)?'b?':'?';
			}
			
		}
		
		$forQueryFields =  implode(', ', $arraySetFields);
		//$rangePlace = array_fill(0, count($arraySetFields), '?');
		$forQueryPlace = implode(', ', $rangePlace);
		
		$this->query="INSERT INTO $this->table ($forQueryFields) values ($forQueryPlace)";
		$this->arrayData=$arrayData;
		$this->type="create";
	}
	
	public function update($data){
		$entity=$this->entity;
		
		$arrayAllFields = array_keys($this->$entity->fieldsTable());
		$arrayForSet = array();
        $arrayData = array();
		
		foreach($arrayAllFields as $field){
			if(property_exists($data,$field)){
				$this->$entity->$field=$data->$field;

				if(strtoupper($field) != 'ID'){
				    if(empty($this->updateValues) || in_array($field, $this->updateValues)) {
                        $arrayForSet[] = is_bool($data->$field)?"$field=b?":"$field=?";
                        $arrayData[] = $data->$field;
                    }
				}else{
                    $whereID = "$field=?";
				}
			}
		}
        $arrayData[]=$data->id;
		
		if(!isset($arrayForSet) OR empty($arrayForSet)){
			echo "Array data table `$this->table` empty!";
		}
		if(!isset($whereID) OR empty($whereID)){
			echo "ID table `$this->table` not found!";
		}
		
		$strForSet = implode(', ', $arrayForSet);
		$this->query="UPDATE $this->table SET $strForSet WHERE $whereID";
        $this->arrayData=$arrayData;
		$this->type="update";
	}
	
	public function delete(){
		$this->query="DELETE FROM $this->table $this->where";
		$this->type="delete";
		$this->where="";
	}
	
	public function save() {
		try {
			$entity=$this->entity;
			$db = $this->db;
			$stmt = $db->prepare($this->query);  
			if($this->type=="create"){
				$stmt->execute($this->arrayData);
				$this->$entity->id = $db->lastInsertId();
			}
			if($this->type=="update"){
                $stmt->execute($this->arrayData);
			}
            if($this->type=="delete"){
                $stmt->execute();
            }
		}catch(PDOException $e){
			http_response_code(400);
			die('Error : '.$e->getMessage());
		}
	}
	
	public function fetchAll(){
		$sql="SELECT $this->columns FROM $this->table $this->join_on $this->where";
		try{
			$db = $this->db;
			$stmt = $db->query($sql);
			$this->columns="*";
            $this->where = "";
			return $stmt->fetchAll();
		}catch(PDOException $e) {
			http_response_code(400);
			die('Error : '.$e->getMessage());
		}
	}
	
	public function fetchFirstOrDefault(){
		$sql="SELECT $this->columns FROM $this->table $this->join_on $this->where";
		try{
			$db = $this->db;
			$stmt = $db->query($sql);
			$this->columns = $this->where = "";
			$result=$stmt->fetchAll();
			if(!empty($result)){
				return $result[0];
			}
			return null;
		}catch(PDOException $e) {
			http_response_code(400);
			die('Error : '.$e->getMessage());
		}
	}
	
	public function any($condition){
		$where="WHERE $condition";
		$sql="SELECT COUNT(*) FROM $this->table $where";
		try{
			$db = $this->db;
			$stmt = $db->query($sql);
			return $stmt->fetchColumn()>0;
		}catch(PDOException $e) {
			http_response_code(400);
			die('Error : '.$e->getMessage());
		}
	}
	
	public function select($columns){
		$this->columns=$columns;
	}

	public function updateColumns($values){
	    $this->updateValues=explode(",", $values);
    }
	
	public function where($condition){
        $this->where="WHERE $condition";
	}
	
	public function join_on($condition){
		$this->join_on.=" JOIN $condition";
	}
	
	public function tableAs($asName){
		$this->table.=" as $asName";
	}
}

?>