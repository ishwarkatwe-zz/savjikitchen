angular.module('searchesController', ['recipeService'])
        .controller('searchController', ['$scope', 'Recipe', function ($scope, Recipe) {

                $scope.listStatus = true;
                $scope.filter = function ()
                {
                    Recipe.getFilterRecipes($scope.filter_data)
                            .success(function (data) {
                                $scope.search_recipes = data;
                            });
                };


                $scope.showFilter = function ()
                {
                    $scope.listStatus = true;
                };

                $scope.hideFilter = function ()
                {
                    $scope.listStatus = false;
                };


            }]);