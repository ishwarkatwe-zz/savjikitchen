var myApp = angular.module('SavjiKitchen', ['wu.masonry', 'ui.bootstrap', 'recipesController', 'searchesController']);





function base_url(url)
{
    if (url != undefined)
    {
        return 'http://www.savjikitchen.com/' + url;
    } else
    {
        return 'http://www.savjikitchen.com/';
    }
}