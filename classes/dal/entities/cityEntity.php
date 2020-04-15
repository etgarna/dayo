<?php
namespace classes\dal\entities;

class CityEntity {
	
	public $id;
	public $name;
	public $stateId;
	
	public function fieldsTable(){
		return array(
			'id' => 'id',
			'name' => 'name',
			'stateId' => 'countryId'
		);
	}
}
?>
