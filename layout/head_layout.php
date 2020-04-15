<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="icon" type="image/x-icon" href="<?php echo BASE_URL ?>/content/images/favicon.ico"/ >
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/content/lib/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/content/lib/awesome/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/content/css/main.css" />

<script type="text/javascript" src="<?php echo BASE_URL ?>/content/lib/angular-1.7.2/angular.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>/content/lib/jquery/jquery.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>/content/lib/bootstrap/js/bootstrap.js"></script>

<script>
    var app = angular.module("efApp", []);
    app.controller("ef_demo", function ($scope) {
        $scope.countries=JSON.parse('<?php echo json_encode($countries); ?>');
        $scope.states=JSON.parse('<?php echo json_encode($states); ?>');
        $scope.cities=JSON.parse('<?php echo json_encode($cities); ?>');

        $scope.country=JSON.parse('<?php echo json_encode($country); ?>');
        $scope.countriesName=JSON.parse('<?php echo json_encode($conditionCountries); ?>');
        $scope.conditionCountries=JSON.parse('<?php echo json_encode($conditionCountries); ?>');

        $scope.joinCountries=JSON.parse('<?php echo json_encode($joinCountries); ?>');
    });
</script>