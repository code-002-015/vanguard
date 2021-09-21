<?php

Route::get('/', function () {
    return redirect(route('home'));
});

Route::get('/home', 'FrontController@home')->name('home');
Route::get('/privacy-policy/', 'FrontController@privacy_policy')->name('privacy-policy');
Route::post('/contact-us', 'FrontController@contact_us')->name('contact-us');

// Custom routes
Route::post('/contact-us-ajax', 'FrontController@contact_us_ajax')->name('contact-us-ajax');
Route::get('/search', 'FrontController@search')->name('search');
// End Custom Routes

//News Frontend
Route::get('/news/', 'Cms4Controllers\ArticleFrontController@news_list')->name('news.front.index');
Route::get('/news/{slug}', 'Cms4Controllers\ArticleFrontController@news_view')->name('news.front.show');
Route::get('/news/{slug}/print', 'Cms4Controllers\ArticleFrontController@news_print')->name('news.front.print');
Route::post('/news/{slug}/share', 'Cms4Controllers\ArticleFrontController@news_share')->name('news.front.share');

Route::get('/albums/preview', 'FrontController@test')->name('albums.preview');


Route::get('careers-jobs/{categorySlug}', 'Career\CareerFrontController@jobs')->name('careers.jobs');
Route::get('careers-job-info/{categorySlug}/{id}', 'Career\CareerFrontController@show')->name('careers.front.show');
Route::post('careers-apply', 'Career\CareerFrontController@apply')->name('careers.front.apply');

Route::get('careers-team','Career\CareerFrontController@teams')->name('careers.team');
Route::get('careers-faq','Career\CareerFrontController@faq')->name('careers.faq');
Route::get('careers-list','Career\CareerFrontController@list')->name('careers.list');


// Route::get('careers', 'Career\CareerFrontController@index')->name('careers.front.index');
// Route::get('careers/{categorySlug}', 'Career\CareerFrontController@index')->name('careers.front.category');
// Route::get('careers/{categorySlug}/{careerSlug}', 'Career\CareerFrontController@show')->name('careers.front.show');
// Route::post('careers-apply', 'Career\CareerFrontController@apply')->name('careers.front.apply');

// Route::get('careers-team','Career\CareerFrontController@teams')->name('careers.team');
// Route::get('careers-faq','Career\CareerFrontController@faq')->name('careers.faq');
// Route::get('careers-list','Career\CareerFrontController@list')->name('careers.list');




############# Customer ####################
// Route::group(['middleware' => ['authenticated']], function () {
//     Route::post('product/review/store', 'EcommerceControllers\ProductReviewController@store')->name('product.review.store');
//     Route::get('/checkout', 'EcommerceControllers\CheckoutController@checkout')->name('cart.front.checkout');
//     Route::post('/temp_save','EcommerceControllers\CartController@save_sales')->name('cart.temp_sales');
//     Route::get('/account/sales', 'EcommerceControllers\SalesFrontController@sales_list')->name('profile.sales');
//     Route::post('/account/product-reorder','EcommerceControllers\SalesFrontController@reorder')->name('profile.sales-reorder-product');
//     Route::post('/account/reorder', 'EcommerceControllers\SalesFrontController@reorder')->name('my-account.reorder');
//     Route::post('/account/cancel/order', 'EcommerceControllers\SalesFrontController@cancel_order')->name('my-account.cancel-order');
//     Route::get('/account/manage', 'EcommerceControllers\MyAccountController@manage_account')->name('my-account.manage-account');
//     Route::post('/account/manage', 'EcommerceControllers\MyAccountController@update_personal_info')->name('my-account.update-personal-info');
//     Route::post('/account/manage/update-contact', 'EcommerceControllers\MyAccountController@update_contact_info')->name('my-account.update-contact-info');
//     Route::post('/account/manage/update-address', 'EcommerceControllers\MyAccountController@update_address_info')->name('my-account.update-address-info');

//     Route::get('/account/change-password', 'EcommerceControllers\MyAccountController@change_password')->name('my-account.change-password');

//     Route::post('/account/change-password', 'EcommerceControllers\MyAccountController@update_password')->name('my-account.update-password');

//     Route::get('/account/pay/{id}', 'EcommerceControllers\CartController@pay_again')->name('my-account.pay-again');

//     // Paynamics Notification

//     // Favorites
//     Route::get('/account/favorites','EcommerceControllers\FavoriteController@index_front')->name('profile.favorites');
//     Route::get('/favorite/product-add-to-cart/{id}','EcommerceControllers\FavoriteController@add_to_cart')->name('favorite.product-add-to-cart');
//     Route::post('/favorite/remove-product','EcommerceControllers\FavoriteController@remove_product')->name('favorite.remove-product');
//     Route::post('/add-to-favorites','EcommerceControllers\FavoriteController@btn_add_to_favorites')->name('btn-add-to-favorites');
//     Route::post('/remove-to-favorites','EcommerceControllers\FavoriteController@btn_remove_to_favorites')->name('btn-remove-to-favorites');
//     Route::get('/product-add-to-wishlit/{productid}','EcommerceControllers\FavoriteController@add_to_wishlist')->name('favorite.add-to-wishlist');

//     // Wishlist
//     Route::get('/account/wishlist','EcommerceControllers\WishlistController@index_front')->name('profile.wishlist');

//     Route::get('/wishlist/add-to-cart/{id}','EcommerceControllers\WishlistController@add_to_cart')->name('wishlist.add-to-cart');
//     Route::post('/add-to-wishlist','EcommerceControllers\WishlistController@add_to_wishlist')->name('add-to-wishlist');
//     Route::post('/remove-to-wishlist','EcommerceControllers\WishlistController@remove_to_wishlist')->name('remove-to-wishlist');
//     Route::post('/wishlist/remove-product','EcommerceControllers\WishlistController@remove_product')->name('wishlist.remove-product');

//     // Coupons
//     Route::get('/account/claimed-coupons','EcommerceControllers\CouponFrontController@claimed')->name('coupons-claimed');

//     Route::get('/checkout-use-coupon/{id}','EcommerceControllers\CouponFrontController@use_coupon')->name('use-coupon');

//     Route::post('/add-manual-coupon','EcommerceControllers\CouponFrontController@add_manual_coupon')->name('add-manual-coupon');

//     Route::get('/display-collectibles', 'EcommerceControllers\CouponFrontController@collectibles')->name('display.collectibles');
//     Route::get('/remove-coupon/{id}','EcommerceControllers\CheckoutController@remove_coupon')->name('checkout.remove-coupon');
// });
##############################################################

Route::group(['prefix' => env('APP_PANEL', 'cerebro')], function () {

    Route::get('/', 'Auth\LoginController@showLoginForm')->name('panel.login');

    Auth::routes(['verify' => true]);

    Route::group(['middleware' => 'admin'], function () {

        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        //// CAREER ////
        Route::resource('career-categories', 'Career\CareerCategoryController')->except(['show']);
        Route::post('career-categories-change-status', 'Career\CareerCategoryController@change_status')->name('career-categories.change.status');
        Route::delete('many/career-category', 'Career\CareerCategoryController@destroy_many')->name('career-categories.destroy_many');
        Route::post('career-categories/{careerCategory}/restore', 'Career\CareerCategoryController@restore')->name('career-categories.restore');

        Route::resource('careers', 'Career\CareerController')->except(['show']);
        Route::post('careers-change-status', 'Career\CareerController@change_status')->name('careers.change.status');
        Route::delete('many/career', 'Career\CareerController@destroy_many')->name('careers.destroy_many');
        Route::post('careers/{career}/restore', 'Career\CareerController@restore')->name('careers.restore');
        Route::get('career-applicants', 'Career\CareerController@index_applicants')->name('careers.applicants');
        //// END CAREER ////

        // Account
        Route::get('/account/edit', 'Settings\AccountController@edit')->name('account.edit');
        Route::put('/account/update', 'Settings\AccountController@update')->name('account.update');
        Route::put('/account/update_email', 'Settings\AccountController@update_email')->name('account.update-email');
        Route::put('/account/update_password', 'Settings\AccountController@update_password')->name('account.update-password');
        // Website
        Route::get('/website-settings/edit', 'Settings\WebController@edit')->name('website-settings.edit');
        Route::put('/website-settings/update', 'Settings\WebController@update')->name('website-settings.update');
        Route::post('/website-settings/update_contacts', 'Settings\WebController@update_contacts')->name('website-settings.update-contacts');
        Route::post('/website-settings/update-ecommerce', 'Settings\WebController@update_ecommerce')->name('website-settings.update-ecommerce');
        Route::post('/website-settings/update-paynamics', 'Settings\WebController@update_paynamics')->name('website-settings.update-paynamics');
        Route::post('/website-settings/update_media_accounts', 'Settings\WebController@update_media_accounts')->name('website-settings.update-media-accounts');
        Route::post('/website-settings/update_data_privacy', 'Settings\WebController@update_data_privacy')->name('website-settings.update-data-privacy');
        Route::post('/website-settings/remove_logo', 'Settings\WebController@remove_logo')->name('website-settings.remove-logo');
        Route::post('/website-settings/remove_icon', 'Settings\WebController@remove_icon')->name('website-settings.remove-icon');
        Route::post('/website-settings/remove_media', 'Settings\WebController@remove_media')->name('website-settings.remove-media');
        
        // Audit
        Route::get('/audit-logs', 'Settings\LogsController@index')->name('audit-logs.index');

        // Users
        Route::resource('/users', 'Settings\UserController');
        Route::post('/users/deactivate', 'Settings\UserController@deactivate')->name('users.deactivate');
        Route::post('/users/activate', 'Settings\UserController@activate')->name('users.activate');
        Route::get('/user-search/', 'Settings\UserController@search')->name('user.search');
        Route::get('/profile-log-search/', 'Settings\UserController@filter')->name('user.activity.search');

        // Roles
        Route::resource('/role', 'Settings\RoleController');
        Route::post('/role/delete','Settings\RoleController@destroy')->name('role.delete');
        Route::get('/role/restore/{id}','Settings\RoleController@restore')->name('role.restore');

        // Access
        Route::resource('/access', 'Settings\AccessController');
        Route::post('/roles_and_permissions/update', 'Settings\AccessController@update_roles_and_permissions')->name('role-permission.update');

        if (env('APP_DEBUG') == "true") {
            // Permission Routes
            Route::resource('/permission', 'Settings\PermissionController');
            Route::get('/permission-search/', 'Settings\PermissionController@search')->name('permission.search');
            Route::post('/permission/destroy', 'Settings\PermissionController@destroy')->name('permission.destroy');
            Route::get('/permission/restore/{id}', 'Settings\PermissionController@restore')->name('permission.restore');
        }



        ####### CMS Standards #######
        //Pages
            Route::resource('/pages', 'Cms4Controllers\PageController');
            Route::get('/pages-advance-search', 'Cms4Controllers\PageController@advance_index')->name('pages.index.advance-search');
            Route::post('/pages/get-slug', 'Cms4Controllers\PageController@get_slug')->name('pages.get_slug');
            Route::put('/pages/{page}/default', 'Cms4Controllers\PageController@update_default')->name('pages.update-default');
            Route::put('/pages/{page}/customize', 'Cms4Controllers\PageController@update_customize')->name('pages.update-customize');
            Route::put('/pages/{page}/contact-us', 'Cms4Controllers\PageController@update_contact_us')->name('pages.update-contact-us');
            Route::post('/pages-change-status', 'Cms4Controllers\PageController@change_status')->name('pages.change.status');
            Route::post('/pages-delete', 'Cms4Controllers\PageController@delete')->name('pages.delete');
            Route::get('/page-restore/{page}', 'Cms4Controllers\PageController@restore')->name('pages.restore');
        //

        // Albums
            Route::resource('/albums', 'Cms4Controllers\AlbumController');
            Route::post('/albums/upload', 'Cms4Controllers\AlbumController@upload')->name('albums.upload');
            Route::delete('/many/album', 'Cms4Controllers\AlbumController@destroy_many')->name('albums.destroy_many');
            Route::put('/albums/quick/{album}', 'Cms4Controllers\AlbumController@quick_update')->name('albums.quick_update');
            Route::post('/albums/{album}/restore', 'Cms4Controllers\AlbumController@restore')->name('albums.restore');
            Route::post('/albums/banners/{album}', 'Cms4Controllers\AlbumController@get_album_details')->name('albums.banners');
        //

        // News
            Route::resource('/news', 'Cms4Controllers\ArticleController')->except(['show', 'destroy']);
            Route::get('/news-advance-search', 'Cms4Controllers\ArticleController@advance_index')->name('news.index.advance-search');
            Route::post('/news-get-slug', 'Cms4Controllers\ArticleController@get_slug')->name('news.get-slug');
            Route::post('/news-change-status', 'Cms4Controllers\ArticleController@change_status')->name('news.change.status');
            Route::post('/news-delete', 'Cms4Controllers\ArticleController@delete')->name('news.delete');
            Route::get('/news-restore/{news}', 'Cms4Controllers\ArticleController@restore')->name('news.restore');
            // News Category
            Route::resource('/news-categories', 'Cms4Controllers\ArticleCategoryController')->except(['show']);;
            Route::post('/news-categories/get-slug', 'Cms4Controllers\ArticleCategoryController@get_slug')->name('news-categories.get-slug');
            Route::post('/news-categories/delete', 'Cms4Controllers\ArticleCategoryController@delete')->name('news-categories.delete');
            Route::get('/news-categories/restore/{id}', 'Cms4Controllers\ArticleCategoryController@restore')->name('news-categories.restore');
        //

        // Files
            Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show')->name('file-manager.show');
            Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload')->name('file-manager.upload');
            Route::get('/file-manager', 'Cms4Controllers\FileManagerController@index')->name('file-manager.index');
        //

        // Menu
            Route::resource('/menus', 'Cms4Controllers\MenuController');
            Route::delete('/many/menu', 'Cms4Controllers\MenuController@destroy_many')->name('menus.destroy_many');
            Route::put('/menus/quick1/{menu}', 'Cms4Controllers\MenuController@quick_update')->name('menus.quick_update');
            Route::get('/menu-restore/{menu}', 'Cms4Controllers\MenuController@restore')->name('menus.restore');
        //
    });
});

// Pages Frontend
Route::get('/{any}', 'FrontController@page')->where('any', '.*');
