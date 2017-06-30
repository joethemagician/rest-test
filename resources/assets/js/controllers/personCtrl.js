angular.module('personCtrl', [])

// inject the Comment service into our controller
.controller('personController', function($scope, $http, Person) {

    // For the add modal
    $scope.personToAdd = {};

    // For the update modal
    $scope.personToUpdate = {};

    // Errors
    $scope.updateErrors = {};
    $scope.addErrors = {};

    // Load the inital data
    Person.get()
        .then(function(response) {
            console.log(response.data);
            $scope.people = response.data;
            $scope.loading = false;
        });

    $scope.showAddModal = function() {

        // clear errors
        $scope.addErrors = {};

        // Show the modal using bootstrap / jQuery
        $('#addModal').modal('show');
    }

    $scope.addPerson = function(person) {

        $scope.loading = true;

        Person.store(person)
            .then(function(data) {

                Person.get()
                    .then(function(result) {
                        $('#addModal').modal('hide');
                        $scope.people = result.data;
                        $scope.loading = false;
                    });

            }).catch(function(error){
                if(error.status == 422){
                    $scope.addErrors.first_name = error.data.first_name ? error.data.first_name[0] : false;
                    $scope.addErrors.last_name = error.data.last_name ? error.data.last_name[0] : false;
                    $scope.addErrors.email = error.data.email ? error.data.email[0] : false;
                }
            });
    }

    $scope.showUpdateModal = function(person) {

        // Clear any errors
        $scope.updateErrors = {};

        // Add the relevant data to the modal
        $scope.personToUpdate = person;

        // Show the modal using bootstrap / jQuery
        $('#updateModal').modal('show');

    }

    $scope.updatePerson = function(person) {
        
        $scope.loading = true;

        Person.update(person)
            .then(function(data) {

                Person.get()
                    .then(function(result) {
                        $('#updateModal').modal('hide');
                        $scope.people = result.data;
                        $scope.loading = false;
                    });

            }).catch(function(error){
                if(error.status == 422){
                    $scope.updateErrors.first_name = error.data.first_name ? error.data.first_name[0] : false;
                    $scope.updateErrors.last_name = error.data.last_name ? error.data.last_name[0] : false;
                    $scope.updateErrors.email = error.data.email ? error.data.email[0] : false;
                }
            });
    };

    $scope.deletePerson = function(id) {
        if(confirm('Are you sure you want to delete this contact?')){
            $scope.loading = true;
            Person.destroy(id)
                .then(function(data) {

                    Person.get()
                        .then(function(response) {
                            $scope.people = response.data;
                            $scope.loading = false;
                        });

                }).catch(function(error){
                    console.log(error);
                });
        }
    };

});