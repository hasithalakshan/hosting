

var validationApp = angular.module('validationApp', []);

// create angular controller
validationApp.controller('mainController', function($scope) {

    // function to submit the form after all validation has occurred
    $scope.submitted = true;
    $scope.submitForm = function(registerForm, event) {

        // check to make sure the form is completely valid
        if (registerForm.$valid) {

            //alert('our form is amazing');
            document.registerForm.action = 'accountCreate';
            document.registerForm.submit();
        }

        else {
            event.preventDefault();
            //alert('Oohp please fill out required fields...')
        }

    };


});


var directvalidationApp = angular.module('directvalidationApp', []);

directvalidationApp.controller('directmainController', function($rootScope) {

    //    directlogin form
    $rootScope.submitted = true;
    $rootScope.directsubmitForm2 = function(directloginForm, event) {

        // check to make sure the form is completely valid
        if (directloginForm.$valid) {

            var originalData = angular.copy($rootScope.existingemail);

            //alert('our form is amazing');
            document.directloginForm.action = 'directLoginCreate';
            document.directloginForm.submit();

        }

        else {
            event.preventDefault();
            //alert('Oohp please fill out required fields...klklk')
        }

    };
});

//checkout page angular js for disable the checkout button...
var checkoutApp = angular.module('checkoutApp', []);

checkoutApp.controller('mainController', function($scope) {
    //$scope.model = {
    //    isDisabled: true
    //};
});




//py profile update angular js...

var myProfileApp = angular.module('myProfileApp', []);

// create angular controller
myProfileApp.controller('myProfileController', function($scope) {


    //$scope.fname="hasitha lakshan";

    //$.ajax({
    //    method: 'get',
    //    url: '/getUserProfileData',
    //
    //    //data: {user:"user"},
    //    success: function(msg){
    //        console.log("Returned "+msg);
    //        $scope.fname="hasitha lakshan";
    //        alert("dsnf");
    //    },
    //    error: function(msg){
    //        console.log("Error occurred shick!"+msg);
    //
    //    }
    //
    //});
    // function to submit the form after all validation has occurred
    $scope.submitted = true;
    $scope.submitForm3 = function(myProfileForm, event) {

        // check to make sure the form is completely valid
        if (myProfileForm.$valid) {

            //alert('our form is amazing');
            document.myProfileForm.action = 'updateMyProfile';
            document.myProfileForm.submit();
        }

        else {
            event.preventDefault();
            //alert('Oohp please fill out required fields...')
        }

    };


});





