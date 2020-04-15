<?php
include_once ('config.php');
include_once (SITE_PATH . DS . 'core' . DS . 'core.php');
include_once (SITE_PATH . 'repository.php');
?>
<!DOCTYPE html>
<html lang="en" ng-app="efApp">
<head>
    <?php include_once( SITE_PATH. DS . 'layout' . DS .'head_layout.php' ); ?>
    <title>DAYO PHP Entity Framework</title>
</head>
<body>
<nav class="navbar fixed-top bg-light">
    <span class="navbar-brand mb-0 h1">PHP Entity Framework Documentation - DAYO v:1.0.0</span>
    <span class="navbar-brand">
        <img src="<?php echo BASE_URL ?>/content/images/DAYO.png" width="30" height="30" alt="DAYO"/>
    </span>
</nav>
<div ng-controller="ef_demo" class="container-fluid">
    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Get all records by entity name</div>
                <div class="card-body">
                    <code>
                        $context=new Context("entity_name");
                        <br/>
                        $countries = $context->fetchAll();
                    </code>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header"><b>Counties</b></div>
                <div class="card-body">
                    <div style="height: 300px; overflow-y: auto;">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>Id</th><th>Name</th><th>Code</th><th>Phone Code</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="country in countries">
                                <td>{{country.id}}</td>
                                <td>{{country.name}}</td>
                                <td>{{country.code}}</td>
                                <td>{{country.phoneCode}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header"><b>States</b></div>
                <div class="card-body">
                    <div style="height: 300px; overflow-y: auto;">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>Id</th><th>Country Id</th><th>Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="state in states">
                                <td>{{state.id}}</td>
                                <td>{{state.countryId}}</td>
                                <td>{{state.name}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header"><b>Cities</b></div>
                <div class="card-body">
                    <div style="height: 300px; overflow-y: auto;">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>Id</th><th>State id</th><th>Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="city in cities">
                                <td>{{city.id}}</td>
                                <td>{{city.stateId}}</td>
                                <td>{{city.name}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Get first record or default</div>
                <div class="card-body">
                    <code>
                        $context=new Context("entity_name");
                        <br/>
                        $country=$context->select("*");
                        <br/>
                        $country=$context->fetchFirstOrDefault();
                    </code>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Get selected column</div>
                <div class="card-body">
                    <code>
                        $context=new Context("entity_name");
                        <br/>
                        $country=$context->select("name");
                        <br/>
                        $countries = $context->fetchAll();
                    </code>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Get record by condition</div>
                <div class="card-body">
                    <code>
                        $context=new Context("entity_name");
                        <br/>
                        $context->where("id=7 or id<3");
                        <br/>
                        $countries = $context->fetchAll();
                    </code>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header"><b>Country</b></div>
                <div class="card-body">
                    <div>
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>Id</th><th>Name</th><th>Code</th><th>Phone Code</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{country.id}}</td>
                                <td>{{country.name}}</td>
                                <td>{{country.code}}</td>
                                <td>{{country.phoneCode}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header"><b>Countries Name</b></div>
                <div class="card-body">
                    <div>
                        <table class="table table-sm">
                            <thead>
                            <tr><th>Name</th></tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="country in countriesName">
                                <td>{{country.name}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header"><b>Selected Countries</b></div>
                <div class="card-body">
                    <div>
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>Id</th><th>Name</th><th>Code</th><th>Phone Code</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="country in conditionCountries">
                                <td>{{country.id}}</td>
                                <td>{{country.name}}</td>
                                <td>{{country.code}}</td>
                                <td>{{country.phoneCode}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">Get join tables</div>
                <div class="card-body">
                    <code>
                        $context=new Context("entity_name");
                        <br/>
                        $context->tableAs("c");
                        <br/>
                        $context->select("c.id,c.name countryName,st.name stateName,ct.name cityName");
                        <br/>
                        $context->join_on("states as st on st.countryId=c.id");
                        <br/>
                        $context->join_on("cities as ct on ct.stateId=st.id");
                        <br/>
                        $context->where("c.Id='10'");
                        <br/>
                        $joinCountries =  $context->fetchAll();
                    </code>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><b>Countries, States, Cities</b></div>
                <div class="card-body">
                    <div style="height: 300px; overflow-y: auto;">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>Id</th><th>Country</th><th>State</th><th>City</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="item in joinCountries">
                                <td>{{item.id}}</td>
                                <td>{{item.countryName}}</td>
                                <td>{{item.stateName}}</td>
                                <td>{{item.cityName}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Create new record</div>
                <div class="card-body">
                    <code>
                        $entity->name = "value";
                        <br/>
                        $entity->code = "value";
                        <br/>
                        $context=new Context("entity_name");
                        <br/>
                        $this->context->add($entity);
                        <br/>
                        $this->context->save();
                    </code>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Update record</div>
                <div class="card-body">
                    <code>
                        $context->entity->name = "value";
                        <br/>
                        $context->entity->code = "value";
                        <br/>
                        $context=new Context("entity_name");
                        <br/>
                        $this->context->update($context->entity);
                        <br/>
                        $this->context->save();
                    </code>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Update columns in records</div>
                <div class="card-body">
                    <code>
                        $context->entity->Id = "value";
                        <br/>
                        $context->entity->code = "value";
                        <br/>
                        $context=new Context("entity_name");
                        <br/>
                        $context->updateColumns("code");
                        <br/>
                        $this->context->update($context->entity);
                        <br/>
                        $this->context->save();
                    </code>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Delete record</div>
                <div class="card-body">
                    <code>
                        $context=new Context("entity_name");
                        <br/>
                        $context->where("id='value'" );
                        <br/>
                        $context->delete();
                        <br/>
                        $context->save();
                    </code>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">If has any record by condition</div>
                <div class="card-body">
                    <code>
                        $context=new Context("entity_name");
                        <br/>
                        if($context->any("column1='value' and column2='value'"))
                        <br/>
                        {
                        <br/>
                            write code
                        <br/>
                        }
                    </code>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

