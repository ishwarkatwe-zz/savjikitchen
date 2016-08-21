angular.module('recipeService', [])

        // super simple service
        // each function returns a promise object 
        .factory('Recipe', function ($http) {
            return {
                getRecipes: function (param) {
                    return $http.get(base_url('rest/recipes?'+param));
                },
                getFilterRecipes: function (filter) {
                    return $http.get(base_url('rest/filter?filter=' + filter));
                },
            };
        });