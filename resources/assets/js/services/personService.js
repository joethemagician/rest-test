angular.module('personService', [])

.factory('Person', function($http) {

    return {
        get : function() {
            return $http.get('/api/people');
        },

        store : function(person) {
            return $http({
                method: 'POST',
                url: '/api/people',
                headers: { 'Content-Type' : 'application/json' },
                data: person
            });
        },

        update : function(person) {
            console.log(person);
            return $http({
                method: 'PUT',
                url: '/api/people/' + person.id,
                headers: { 'Content-Type' : 'application/json' },
                data: person
            });
        },

        destroy : function(id) {
            return $http.delete('/api/people/' + id);
        }
    }

});