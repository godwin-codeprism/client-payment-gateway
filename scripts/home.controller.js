angular.module("clientPayment").controller("homeController", [
  "$scope",
  "$http",
  function($scope, $http) {
    $scope.milestones = [];
    $http
      .get(
        "https://client-payment-gateway.firebaseio.com/clients/maxime/projects/gdbase/milestones.json"
      )
      .then(function(res) {
        $scope.milestones = res.data;
      });

    $scope.payNowHandler = function(index) {
      var data = $scope.milestones[index];
      $http
        .post("./php/checkout.php", data)
        .then(function(res) {
          if(res.data.indexOf('https://') > -1){
            window.open(res.data, '_self');
          }else{
            console.log(res.data);
          }
        })
        .catch(function(err) {
          console.log(err);
        });
    };
  }
]);
