
//services.js
angular.module('myApp')
    .factory('Authenticate', function($resource){
        return $resource("/service/authenticate/")
    })