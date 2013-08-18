// app.js
angular.module("myApp",[ ])
 
.config(['$routeProvider',function($routeProvider){
        $routeProvider.when('/',{templateUrl:'app/partials/login.html', controller: 'loginController'})
        $routeProvider.otherwise({redirectTo:'/'})
}])
 
// controller.js
angular.module("myApp").controller('loginController',function($scope){
    //controller code will be inserted here
})