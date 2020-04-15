<?php
namespace classes\dal;

use classes\base\ContextBase;
use classes\dal\entities\CountryEntity;
use classes\dal\entities\StateEntity;
use classes\dal\entities\CityEntity;

class Context extends ContextBase
{
	public $country;
	public $state;
    public $city;
	
	public function __construct($entity){
		parent::__construct($entity);
		$this->setEntity($entity);
	}
	
	private function setEntity($entity){
        if($entity=="country"){
            $this->country=new CountryEntity();
        }
        if($entity=="state"){
            $this->state=new StateEntity();
        }
        if($entity=="city"){
            $this->city=new CityEntity();
        }
	}
}
?>