<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('coupon', CouponController::class); //优惠券
    $router->resource('category', CategoryController::class); //分类管理
    $router->resource('goods', GoodsController::class); //商品管理


});
