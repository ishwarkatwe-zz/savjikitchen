var myApp = angular.module('SavjiKitchen', ['wu.masonry', 'ui.bootstrap', 'recipesController', 'searchesController']);





function base_url(url)
{
    if (url != undefined)
    {
        return 'http://localhost/savjikitchen/public/' + url;
    } else
    {
        return 'http://localhost/savjikitchen/public/';
    }
}