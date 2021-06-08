<?php

use Illuminate\Support\Facades\Route;

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

# Route for dashboard - 07/06/2021
Route::view('/', 'dashboard')->name('dashboard');

# Route for category index - 07/06/2021
Route::get('/category/index', 'CategoryController@categoryIndex')->name('categories.index');
# Route for category add - 07/06/2021
Route::get('/category/add', 'CategoryController@categoryAdd')->name('categories.add');
# Route for category store - 07/06/2021
Route::post('/category/store', 'CategoryController@categoryStore')->name('categories.store');
# Route for category edit - 07/06/2021
Route::get('/category/{id}/edit', 'CategoryController@categoryEdit')->name('categories.edit');
# Route for category update - 07/06/2021
Route::post('/category/update', 'CategoryController@categoryUpdate')->name('categories.update');
# Route for category delete - 07/06/2021
Route::any('/category/{id}/delete', 'CategoryController@categoryDelete')->name('categories.delete');

# Route for sub-category index - 07/06/2021
Route::get('/sub-category/index', 'SubCategoryController@subCategoryIndex')->name('sub-categories.index');
# Route for sub-category add - 07/06/2021
Route::get('/sub-category/add', 'SubCategoryController@subCategoryAdd')->name('sub-categories.add');
# Route for sub-category store - 07/06/2021
Route::post('/sub-category/store', 'SubCategoryController@subCategoryStore')->name('sub-categories.store');
# Route for sub-category edit - 07/06/2021
Route::get('/sub-category/{id}/edit', 'SubCategoryController@subCategoryEdit')->name('sub-categories.edit');
# Route for sub-category update - 07/06/2021
Route::post('/sub-category/update', 'SubCategoryController@subCategoryUpdate')->name('sub-categories.update');
# Route for sub-category delete - 07/06/2021
Route::any('/sub-category/{id}/delete', 'SubCategoryController@subCategoryDelete')->name('sub-categories.delete');

# Route for another-sub-category index - 07/06/2021
Route::get('/another-sub-category/index', 'AnotherSubCategoryController@anotherSubCategoryIndex')->name('another-sub-categories.index');
# Route for another-sub-category add - 07/06/2021
Route::get('/another-sub-category/add', 'AnotherSubCategoryController@anotherSubCategoryAdd')->name('another-sub-categories.add');
# Route for another-sub-category store - 07/06/2021
Route::post('/another-sub-category/store', 'AnotherSubCategoryController@anotherSubCategoryStore')->name('another-sub-categories.store');
# Route for another-sub-category edit - 07/06/2021
Route::get('/another-sub-category/{id}/edit', 'AnotherSubCategoryController@anotherSubCategoryEdit')->name('another-sub-categories.edit');
# Route for another-sub-category update - 07/06/2021
Route::post('/another-sub-category/update', 'AnotherSubCategoryController@sanotherSbCategoryUpdate')->name('another-sub-categories.update');
# Route for another-sub-category delete - 07/06/2021
Route::any('/another-sub-category/{id}/delete', 'AnotherSubCategoryController@anotherSubCategoryDelete')->name('another-sub-categories.delete');

# Route for product index - 07/06/2021
Route::get('/product/index', 'ProductController@productIndex')->name('products.index');
# Route for product add - 07/06/2021
Route::get('/product/add', 'ProductController@productAdd')->name('products.add');
# Route for product store - 07/06/2021
Route::post('/product/store', 'ProductController@productStore')->name('products.store');
# Route for product edit - 07/06/2021
Route::get('/product/{id}/edit', 'ProductController@productEdit')->name('products.edit');
# Route for product update - 07/06/2021
Route::post('/product/update', 'ProductController@productUpdate')->name('products.update');
# Route for product delete - 07/06/2021
Route::any('/product/{id}/delete', 'ProductController@productDelete')->name('products.delete');
