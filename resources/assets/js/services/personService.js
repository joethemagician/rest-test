angular.module('personService', [])

.factory('Person', function($http) {

    return {
        get : function() {
            return $http.get('/api/people');
        },

        store : function(personData) {
            return $http({
                method: 'POST',
                url: '/api/people',
                headers: { 'Content-Type' : 'application/json' },
                data: $.param(personData)
            });
        },

        update : function(personData) {
            return $http({
                method: 'POST',
                url: '/api/people',
                headers: { 'Content-Type' : 'application/json' },
                data: $.param(personData)
            });
        },

        destroy : function(id) {
            return $http.delete('/api/people/' + id);
        }
    }

});