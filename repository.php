<?php
use classes\dal\Context as Context;

$context=new Context("country");
$countries = $context->fetchAll();

$context->select("*");
$country=$context->fetchFirstOrDefault();

$context->select("name");
$countriesName=$context->fetchAll();

$context->where("id=7 or id<3");
$conditionCountries = $context->fetchAll();

$context->tableAs("c");
$context->select("c.id,c.name countryName,st.name stateName,ct.name cityName");
$context->join_on("states as st on st.countryId=c.id");
$context->join_on("cities as ct on ct.stateId=st.id");
$context->where("c.Id='10'");
$joinCountries =  $context->fetchAll();

$context=new Context("state");
$states = $context->fetchAll();

$context=new Context("city");
$cities = $context->fetchAll();
?>
