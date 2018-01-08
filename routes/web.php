<?php

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['mustBeAdmin:profimak@ecommerce.com'],
			  'prefix'     => 'admin',
              'namespace'  => 'Admin'
], function () {
	Route::get('dashboard', '\Backpack\Base\app\Http\Controllers\AdminController@dashboard');
    // Route::get('/', '\Backpack\Base\app\Http\Controllers\AdminController@redirect');
});

// Admin Interface
Route::group(['middleware' => ['admin','mustBeAdmin:profimak@ecommerce.com'],
			  'prefix'     => 'admin',
              'namespace'  => 'Admin'
], function () {

	CRUD::resource('categories', 'CategoryCrudController');
	CRUD::resource('currencies', 'CurrencyCrudController');
	CRUD::resource('carriers', 'CarrierCrudController');
	CRUD::resource('attributes', 'AttributeCrudController');
	CRUD::resource('attributes-sets', 'AttributeSetCrudController');
	CRUD::resource('products', 'ProductCrudController');
	CRUD::resource('taxes', 'TaxCrudController');
	CRUD::resource('orders', 'OrderCrudController');
	CRUD::resource('order-statuses', 'OrderStatusCrudController');

	// Clone Products
	Route::post('products/clone', ['as' => 'clone.product', 'uses' => 'ProductCrudController@cloneProduct']);
});


// Ajax
Route::group(['middleware' => ['admin','mustBeAdmin:profimak@ecommerce.com'],
			  'prefix' => 'ajax',
			  'namespace' => 'Admin'
], function() {
	// Get attributes by set id
	Route::post('attribute-sets/list-attributes', ['as' => 'getAttrBySetId', 'uses' => 'AttributeSetCrudController@ajaxGetAttributesBySetId']);

	// Product images upload routes
	Route::post('product/image/upload', ['as' => 'uploadProductImages', 'uses' => 'ProductCrudController@ajaxUploadProductImages']);
	Route::post('product/image/reorder', ['as' => 'reorderProductImages', 'uses' => 'ProductCrudController@ajaxReorderProductImages']);
	Route::post('product/image/delete', ['as' => 'deleteProductImage', 'uses' => 'ProductCrudController@ajaxDeleteProductImage']);

	// Get group products by group id
	Route::post('product-group/list/products', ['as' => 'getGroupProducts', 'uses' => 'ProductGroupController@getGroupProducts']);
	Route::post('product-group/list/ungrouped-products', ['as' => 'getUngroupedProducts', 'uses' => 'ProductGroupController@getUngroupedProducts']);
	Route::post('product-group/add/product', ['as' => 'addProductToGroup', 'uses' => 'ProductGroupController@addProductToGroup']);
	Route::post('product-group/remove/product', ['as' => 'removeProductFromGroup', 'uses' => 'ProductGroupController@removeProductFromGroup']);
});

Auth::routes();

Route::get('contact-us', 'ContactUSController@contactUS')->name('contact');
Route::post('contact-us', ['as'=>'contactus.store','uses'=>'ContactUSController@contactUSPost']);

Route::get('/products', 'ProductsController@index')->name('live_products');

// Route::get('/home', 'HomeController@index')->name('home');
