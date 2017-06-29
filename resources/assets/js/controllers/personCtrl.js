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

    $scope.updatePerson = function(person) {
        // $scope.loading = true;

        console.log(person);

        Person.update(person)
            .then(function(data) {

                // Person.get()
                //     .then(function(result) {
                //         $scope.people = result.data;
                //         // $scope.loading = false;
                //     });

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