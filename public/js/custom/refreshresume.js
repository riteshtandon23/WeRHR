angular.module('TestApp', [])
.factory('beforeUnload', function ($rootScope, $window) {
    // Events are broadcast outside the Scope Lifecycle
    $rootScope.flag=true;
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
function TestController($scope,$timeout,$window,$rootScope) {
	//$scope.appTitle="00:01:45";
    // $scope.course="Java";
    // $scope.courseCode="1002";

    var val= localStorage.getItem("Time");
    if((JSON.parse(val))!==null)
    { 
        
        // var time=$window.timetogo;
        // $scope.appTitle=time;
        // var arr=time.split(':');
        // var hour=Number(arr[0]);
        // var min=Number(arr[1]);
        // var sec=Number(arr[2]);
        // Calltimer(hour,min,sec); 
        //Resume time
        var finalVal=JSON.parse(val);
        var timeWithCFormat=finalVal[0].Time;
        var arr=timeWithCFormat.split(':');
        var val1=Number(arr[0]);
        var val2=Number(arr[1]);
        var val3=Number(arr[2]);
        Calltimer(val1,val2,val3);
        
       
    }else{
        //Start New Time
        var time=$window.timetogo;
        $scope.appTitle=time;
        var arr=time.split(':');
        var hour=Number(arr[0]);
        var min=Number(arr[1]);
        var sec=Number(arr[2]);
        Calltimer(hour,min,sec);  
    }
    // $scope.reset=function()
    // {
    //     $scope.appTitle="00:01:00";  
    //     localStorage.removeItem('QuestionName');
    //     localStorage.removeItem('QuestionOption');
    //     localStorage.removeItem('QuesNo');
    //     localStorage.removeItem('UserAns');
    //     localStorage.removeItem('unAnswer');
    //     localStorage.removeItem('Time');
    //     localStorage.removeItem('QuestionNumber');
    // }
    $scope.saveTime = function() {
       
        localStorage.removeItem('Time');
        var time=$scope.appTitle;
        $scope.saved = localStorage.getItem('Time');
        $scope.todos = (localStorage.getItem('Time')!==null) ? JSON.parse($scope.saved) : [ {Time:time}];
        localStorage.setItem('Time', JSON.stringify($scope.todos));
    };
    $scope.submit= function() {
       
        //localStorage.clear();
        localStorage.removeItem('QuestionName');
         localStorage.removeItem('QuestionOption');
        // localStorage.removeItem('QuesNo');
        // localStorage.removeItem('UserAns');
        // localStorage.removeItem('unAnswer');
         localStorage.removeItem('Time');
         localStorage.removeItem('QuestionNumber');
        $rootScope.flag=false;
        //$window.location.href='clearSession.php';
        $window.location.href='clearSession.php?UserAns='+localStorage.getItem('UserAns');
       
    };
    //$scope.appTitle = 60;
    
    $scope.$on('onBeforeUnload', function (e, confirmation) {
        if($rootScope.flag)
        {
            localStorage.removeItem('Time');
            var time=$scope.appTitle;
            $scope.saved = localStorage.getItem('Time');
            $scope.todos = (localStorage.getItem('Time')!==null) ? JSON.parse($scope.saved) : [ {Time:time}];
            localStorage.setItem('Time', JSON.stringify($scope.todos));
            confirmation.message = "All data willl be lost.";  
            e.preventDefault();
        }
        
    });
    // $scope.$on('onUnload', function (e) {
            
    //         console.log('leaving'); // Use 'Preserve Log' option in Console
    // });
	function Calltimer(hour,min,sec)
    {
        var mytimeout = null;
        $scope.onTimeout = function() {
        if(sec ===  -1) {
            if(min === 0)
            {
              if(hour === 0)
              {
                $scope.$broadcast('timer-stopped', 0);
                $timeout.cancel(mytimeout);
                return;
              }else{
                hour--;
                min=59;
                sec=59;
              }  
            }else{
                min--;
                sec=59;
           }
            
        }
        /*if(sec<10)
        {
           $scope.appTitle=hour+":"+min+":0"+sec--; 
        }else
        {
            $scope.appTitle=hour+":"+min+":"+sec--;  
        }*/
        //Adding leading zero to the seconds minutes hours
        var secL0;
        var minL0;
        var hourL0;
        if(sec<10)
        {
            secL0="0"+sec--;
        }else
        {
            secL0=sec--;
        }
        if(min<10)
        {
            minL0="0"+min;
        }else
        {
            minL0=min;
        }
        if(hour<10)
        {
            hourL0="0"+hour;
        }else
        {
            hourL0=hour;
        }
        $scope.appTitle=hourL0+":"+minL0+":"+secL0; 
         //$scope.appTitle=hour+":"+min+":"+sec--;
        mytimeout = $timeout($scope.onTimeout, 1000);
        
    };
    mytimeout = $timeout($scope.onTimeout, 1000);
    }
    $scope.$on('timer-stopped', function(event, remaining){
        if(remaining === 0)
        {
            
            localStorage.removeItem('QuestionName');
             localStorage.removeItem('QuestionOption');
            // localStorage.removeItem('QuesNo');
            // localStorage.removeItem('UserAns');
            // localStorage.removeItem('unAnswer');
             localStorage.removeItem('Time');
             localStorage.removeItem('QuestionNumber');
            //localStorage.clear();
            $rootScope.flag=false;
            // $location.url('addChallenge.php');
           // $window.location.href='clearSession.php?UserAns='+localStorage.getItem('UserAns');
            //$window.location.href;
            console.log("running out of time");

        }
    });
}
