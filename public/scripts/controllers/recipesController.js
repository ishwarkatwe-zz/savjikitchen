angular.module('recipesController', ['recipeService'])
        .controller('recipeController', ['$scope', 'Recipe', '$uibModal', function ($scope, Recipe, $uibModal) {

                $scope.sort = 'popular';


                Recipe.getRecipes()
                        .success(function (data) {
                            $scope.recipes = data;
                        });

                $scope.changeSortOrder = function (sort) {
                    $scope.sort = sort;
                };


                $scope.openModal = function (recipe) {
                    $scope.recipedata = recipe;
                    var modalInstance = $uibModal.open({
                        animation: true,
                        templateUrl: 'scripts/views/view_recipe.html',
                        controller: 'ModalInstanceCtrl',
                        size: 'lg',
                        resolve: {
                            recipedata: function () {
                                return $scope.recipedata;
                            }
                        }
                    });

                };

                $scope.convertToDate = function (stringDate) {
                    var dateOut = new Date(stringDate);
                    dateOut.setDate(dateOut.getDate() + 1);
                    return dateOut;
                };
            }])
        .controller('ModalInstanceCtrl', function ($scope, $uibModalInstance, recipedata) {
            $scope.recipedata = recipedata;
            $scope.cancel = function () {
                $uibModalInstance.dismiss('cancel');
            };
        });