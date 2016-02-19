angular.module('TestApp', [])
.factory('beforeUnload', function ($rootScope, $window) {
    // Events are broadcast outside the Scope Lifecycle
    
    $window.onbeforeunload = function (e) {
        var confirmation = {};
        var event = $rootScope.$broadcast('onBeforeUnload', confirmation);
        if (event.defaultPrevented) {
		
            return confirmation.message;
        }
    };
    
    $window.onunload = function () {
        $rootScope.$broadcast('onUnload');
    };
    return {};
})
.run(function (beforeUnload) {
    // Must invoke the service at least once
});
function TestController($scope) {
	//$scope.appTitle="HHH";
    $scope.$on('onBeforeUnload', function (e, confirmation) {
        confirmation.message = "All data willl be lost.";
        e.preventDefault();
    });
    $scope.$on('onUnload', function (e) {
		localStorage.clear();
		var time=$scope.appTitle;
		$scope.saved = localStorage.getItem('Time');
		$scope.todos = (localStorage.getItem('Time')!==null) ? JSON.parse($scope.saved) : [ {Time:time}];
		localStorage.setItem('Time', JSON.stringify($scope.todos));
        console.log('leaving page'); // Use 'Preserve Log' option in Console
    });
	
	
}
