<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */
//

Route::get('/', function () {
    return view('home');
});

Route::controller('rest', 'RestController');


Route::get('auth/google', 'Auth\AuthController@redirectToGoogleProvider');
Route::get('auth/google/callback', 'Auth\AuthController@handleGoogleProviderCallback');


Route::get('auth/facebook', 'Auth\AuthController@redirectToFacebookProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleFacebookProviderCallback');

//Route::get('/', 'Auth\AuthController@getLogin');
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
//Route::get('/', 'Home@index');

Route::group(['middleware' => ['auth']], function() {

    Route::get('/profile', [
        'as' => 'profile', 'uses' => 'Home@index'
    ]);

    Route::get('/profile/{id}', [
        'as' => 'profile', 'uses' => 'Home@index'
    ]);

    Route::get('/add_recipe', [
        'as' => 'add_recipe', 'uses' => 'Recipe@addRecipe'
    ]);

    Route::any('/save_recipe', [
        'as' => 'save_recipe', 'uses' => 'Recipe@saveRecipe'
    ]);

    Route::any('/manage_recipe', [
        'as' => 'manage_recipe', 'uses' => 'Recipe@manageRecipe'
    ]);

    Route::any('/checkRecipe', [
        'as' => 'checkRecipe', 'uses' => 'Recipe@checkRecipe'
    ]);

    Route::any('/processStatus', [
        'as' => 'processStatus', 'uses' => 'Recipe@processStatus'
    ]);

    Route::any('/my_recipe', [
        'as' => 'my_recipe', 'uses' => 'Recipe@myRecipe'
    ]);

    Route::get('/view_recipe/{id}', [
        'as' => 'view_recipe', 'uses' => 'Recipe@viewRecipe'
    ]);

    Route::post('/like', [
        'as' => 'like', 'uses' => 'Recipe@likeRecipe'
    ]);

    Route::post('/comments', [
        'as' => 'comments', 'uses' => 'Recipe@comments'
    ]);

    Route::post('/comments_inline', [
        'as' => 'comments_inline', 'uses' => 'Recipe@comments_inline'
    ]);

    Route::post('/save_comment', [
        'as' => 'save_comment', 'uses' => 'Recipe@saveComment'
    ]);

    Route::post('/fetch_recipes', [
        'as' => 'fetch_recipes', 'uses' => 'Recipe@fetchRecipes'
    ]);

    Route::post('/delete_comment', [
        'as' => 'delete_comment', 'uses' => 'Recipe@deleteComment'
    ]);

    Route::get('/followers', [
        'as' => 'followers', 'uses' => 'Member@index'
    ]);

    Route::get('/followers/{type}/{id}', [
        'as' => 'followers', 'uses' => 'Member@index'
    ]);

    Route::post('/follow', [
        'as' => 'follow', 'uses' => 'Member@follow'
    ]);

    Route::get('/edit', [
        'as' => 'edit', 'uses' => 'Member@editUser'
    ]);

    Route::post('/updateProfile', [
        'as' => 'updateProfile', 'uses' => 'Member@updateProfile'
    ]);

    Route::get('/edit_recipe/{id}', [
        'as' => 'edit_recipe', 'uses' => 'Recipe@editRecipe'
    ]);

    Route::post('/processEditRecipe', [
        'as' => 'processEditRecipe', 'uses' => 'Recipe@processEditRecipe'
    ]);

    Route::post('/addIngredient', [
        'as' => 'addIngredient', 'uses' => 'Recipe@addIngredient'
    ]);

    Route::post('/processAddIngredient', [
        'as' => 'processAddIngredient', 'uses' => 'Recipe@processAddIngredient'
    ]);

    Route::post('/deleteIngredient', [
        'as' => 'deleteIngredient', 'uses' => 'Recipe@deleteIngredient'
    ]);

    Route::post('/addInstruction', [
        'as' => 'addInstruction', 'uses' => 'Recipe@addInstruction'
    ]);

    Route::post('/processAddInstruction', [
        'as' => 'processAddInstruction', 'uses' => 'Recipe@processAddInstruction'
    ]);

    Route::post('/deleteInstruction', [
        'as' => 'deleteInstruction', 'uses' => 'Recipe@deleteInstruction'
    ]);

    Route::post('/imageCrop', [
        'as' => 'imageCrop', 'uses' => 'Recipe@viewImageCrop'
    ]);


    Route::post('/delete_recipe', [
        'as' => 'delete_recipe', 'uses' => 'Recipe@deleteRecipe'
    ]);
});

