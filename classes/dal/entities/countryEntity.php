<?php
namespace classes\dal\entities;

class CountryEntity {
	
	public $id;
	public $name;
	public $code;
	public $phoneCode;
	public $image;
	
	public function fieldsTable(){
		return array(
			'id' => 'id',
			'name' => 'name',
            'code' => 'code',
            'phoneCode' => 'phoneCode',
            'image' => 'image'
		);
	}
}
?>