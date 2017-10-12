<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PageController@index');

Route::get('/about', 'PageController@about')->name('about');

Route::get('/contact', 'PageController@contactUs')->name('contact');

Route::get('/news', 'PageController@news')->name('news.index');

Route::get('/news/{id}', 'PageController@article')->name('news.show');

Route::get('/shop/{id}', 'PageController@product')->name('shop.show');

Auth::routes();

Route::get('/profile', 'UserController@profile')->name('users.profile');

Route::get('/c={category_id}', 'PageController@getCategory')->name('category');

Route::get('/search/s={search_string}', 'PageController@showSearchResult')->name('search_result');

Route::post('/search', 'PageController@searchValidation')->name('search');

//Route::resource('products', 'ProductController');

//Permissions for managing Product Resource
Route::get('/products',           'ProductController@index')->name('products.index')->middleware('permission:View Product');
Route::get('/products/{id}',      'ProductController@show')->name('products.show')->middleware('permission:View Product');
Route::get('/products/create',    'ProductController@create')->name('products.create')->middleware('permission:Create Product');
Route::get('/products/{id}/edit', 'ProductController@edit')->name('products.edit')->middleware('permission:Edit Product');
Route::post('/products',          'ProductController@store')->name('products.store')->middleware('permission:Create Product');
Route::put('/products/{id}',      'ProductController@update')->name('products.update')->middleware('permission:Edit Product');
Route::delete('/products/{id}',   'ProductController@destroy')->name('products.destroy')->middleware('permission:Delete Product');

Route::resource('articles', 'ArticleController');

//Permissions for managing Product Resource
Route::get('/articles',           'ArticleController@index')->name('articles.index')->middleware('permission:View Article');
Route::get('/articles/{id}',      'ArticleController@show')->name('articles.show')->middleware('permission:View Article');
Route::get('/articles/create',    'ArticleController@create')->name('articles.create')->middleware('permission:Create Article');
Route::get('/articles/{id}/edit', 'ArticleController@edit')->name('articles.edit')->middleware('permission:Edit Article');
Route::post('/articles',          'ArticleController@store')->name('articles.store')->middleware('permission:Create Article');
Route::put('/articles/{id}',      'ArticleController@update')->name('articles.update')->middleware('permission:Edit Article');
Route::delete('/articles/{id}',   'ArticleController@destroy')->name('articles.destroy')->middleware('permission:Delete Article');

//Only users with Administrator role can manage users\roles\permissions
Route::middleware(['role:Administrator'])->group(function() {
    Route::resource('users', 'UserController');

    Route::resource('roles', 'RoleController');

    Route::resource('permissions', 'PermissionController');
});

// OnlyAdministrator\Content Manager can manage categories
Route::resource('categories', 'CategoryController')->except('create', 'show')->middleware('role:Administrator|Content Manager');

Route::get('/add-to-cart/{id}', 'ProductController@addToCart')->name('product.addToCart');

Route::get('/reduce/{id}', 'ProductController@getReduceByOne')->name('product.reduceByOne');

Route::get('/remove/{id}', 'ProductController@getRemoveItem')->name('product.remove');

Route::get('/shopping-cart/', 'ProductController@getCart')->name('product.shoppingCart');

Route::get('/checkout', 'ProductController@getCheckout')->name('checkout');

Route::post('/checkout', 'ProductController@postCheckout')->name('checkout');

