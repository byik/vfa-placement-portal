//app.js
angular.module("myApp",['ngResource','ngSanitize'])
   .config(['$routeProvider',function($routeProvider){
        $routeProvider.when('/',{templateUrl:'app/partials/login.html', controller: 'loginController'})
        $routeProvider.when('/home',{templateUrl:'app/partials/home.html', controller: 'homeController'})
        $routeProvider.otherwise({redirectTo:'/'})
    }])