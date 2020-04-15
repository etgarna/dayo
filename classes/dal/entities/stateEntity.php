<?php
namespace classes\dal\entities;

class StateEntity {
	
	public $id;
	public $countryId;
	public $name;
	
	public function fieldsTable(){
		return array(
			'id' => 'id',
            'countryId' => 'countryId',
			'name' => 'name'
		);
	}
}
?>