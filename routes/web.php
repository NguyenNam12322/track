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













 Route::get('/',function(){
        return view('phone-search');
});

Route::get('/search', 'crawlController@test1')->name('search-model');

Route::get('/addWatermark', function()
{
    // $img = Image::make(public_path('images/main.jpg'));
   
    // /* insert watermark at bottom-right corner with 10px offset */
    // $img->insert(public_path('images/logo.png'), 'bottom-right', 10, 10);
   
    // $img->save(public_path('images/main-new.jpg')); 
   
    // dd('saved image successfully.');

    dd(1);
});

Route::post('tracking-number', 'crawlController@track_order')->name('tracking-number');

Route::get('data', 'crawlController@test2');

Auth::routes(['verify' => true]);


Route::group(['prefix' => 'admins','middleware' => 'auth'], function() {

    Route::resource('posts', 'postController');

    Route::resource('categories', 'categoryController');

    Route::get('home', 'HomeController@index')->name('home-admin');

    Route::get('/order-list/{id}', 'Frontend\orderController@orderListView')->name('order_list_view');

    Route::get('add-active-post', 'postController@addActive')->name('add-active-post');

    Route::get('add-hight-light-post', 'postController@addHightLight')->name('add-hight-light-post');

    Route::get('lienhe',function(){
        return view('lienhe');
    })->name('lienhead');




    Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

    Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

    Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

    Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

    Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

    
    Route::post(    
        'generator_builder/generate-from-file',
        '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
    )->name('io_generator_builder_generate_from_file');

    Route::resource('products', 'productsController');
});    

Route::get('/lien-he', 'Frontend\blogController@lienhe')->name('lien-he');

Route::get('/san-pham/san-pham-da-thi-cong', 'Frontend\blogController@sanphamdathicong')->name('spdathicong');



Route::post('add-order', 'Frontend\blogController@addOrder')->name('send-order');

Route::post('add-lien-he', 'Frontend\blogController@sendLienhe')->name('send-lh');

Route::get('removecart/{id}', 'Frontend\blogController@removeCart')->name('removeCart');

Route::get('cart.html', 'Frontend\blogController@showCart')->name('cart');

Route::get('add-cart', 'Frontend\blogController@addProductToCart')->name('addcart');


Route::get('/{slug}', 'Frontend\blogController@index')->name('list');


Route::get('bai-viet/{slug}', 'Frontend\blogController@detail')->name('details');




Route::get('san-pham/{slug}', 'Frontend\blogController@productDetails')->name('product-details');













