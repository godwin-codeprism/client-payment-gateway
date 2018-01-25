angular
  .module("clientPayment", ["ngSanitize", "ui.router", "ngAnimate"])
  .config([
    "$stateProvider",
    "$urlRouterProvider",
    "$locationProvider",
    function($stateProvider, $urlRouterProvider, $locationProvider) {
      $urlRouterProvider.otherwise("/");
      $stateProvider.state("app", {
        url: "",
        templateUrl: "views/home.html",
        controller: "homeController"
      });
    }
  ]);
