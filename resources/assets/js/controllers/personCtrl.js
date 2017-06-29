angular.module('personCtrl', [])

// inject the Comment service into our controller
.controller('personController', function($scope, $http, Person) {

    $scope.personData = {};

    Person.get()
        .then(function(response) {
            console.log(response.data);
            $scope.people = response.data;
            // $scope.loading = false;
        });

    $scope.storePerson = function() {
        // $scope.loading = true;

        Person.save($scope.PersonData)
            .then(function(data) {

                Person.get()
                    .then(function(getData) {
                        $scope.comments = getData;
                        // $scope.loading = false;
                    });

            })
            .error(function(data) {
                console.log(data);
            });
    };

    $scope.deletePerson = function(id) {
        // $scope.loading = true; 

        Person.destroy(id)
            .then(function(data) {

                Person.get()
                    .then(function(getData) {
                        $scope.people = getData;
                        // $scope.loading = false;
                    });

            });
    };

});