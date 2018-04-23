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

Route::resource('/', 'FrontController');

Route::get('/video-details/{id}/{title}', 'FrontController@video_details')->name('video_detail');
// Route::group(['middleware' => ['auth:channel']], function () {
Route::get('/trendings', 'FrontController@trending');
Route::get('/populars', 'FrontController@popular');
Route::get('/faq', 'FrontController@faq');
Route::get('/contact', 'FrontController@contact');
Route::post('/contact/contact_store', 'FrontController@contact_store')->name('contact.contact_store');
// });
Route::get('/histories', 'FrontController@history');
Route::get('/news', 'FrontController@news');
Route::get('/news-details', 'FrontController@news_detail');
Route::get('/news-details/{id}/{title}', 'FrontController@news_detail');
Route::get('/article', 'FrontController@artikel');
Route::get('/article-details', 'FrontController@artikel_detail');
Route::get('/article-details/{id}/{title}', 'FrontController@artikel_detail');
Route::get('/logins', 'FrontController@login');
Route::post('videos/search_video', 'FrontController@search_video');
Route::get('videos/search_video', 'FrontController@search_video');
Route::post('videos/post_comment/{video_id}', 'FrontController@setComment')->name('post.comment');
Route::post('contents/post_comment/{content_id}', 'FrontController@setContentComment')->name('post.content.comment');
Route::post('add_playlist', 'FrontController@addPlaylist')->name('post.add.playlist');

//user routes
Route::get('user_pages/upload', 'UserPagesController@upload');
Route::get('user_pages/channels', 'UserPagesController@channel')->name('user_pages.channels');
Route::get('user_pages/playlist', 'UserPagesController@playlist');
Route::get('user_pages/user_details', 'UserPagesController@user_detail')->name('user_pages.user_details');
Route::get('user_pages/channel_details', 'UserPagesController@channel_detail');
Route::post('user_pages/update_avatar', 'UserPagesController@update_avatar');
Route::get('user_pages/edit_users', 'UserPagesController@edit_user');
Route::post('user_pages/post_upload', 'UserPagesController@post_upload')->name('user_pages.post_upload');
Route::post('user_pages/update_users', 'UserPagesController@update_user')->name('user_pages.update_users');
Route::get('features/love/{video_id}', 'FrontController@setLove')->name('features.set_love');
Route::get('features/subcribe/{channel_id}', 'FrontController@setSubcribe')->name('features.set_subcribe');
Route::get('features/disubcribe/{channel_id}', 'FrontController@setDisubcribe')->name('features.set_disubcribe');
Route::get('features/history/{video_id}', 'FrontController@setHistory')->name('features.set_history');
Route::get('features/add_to_playlist/{playlist_id}/{video_id}', 'FrontController@addToPlaylist')->name('features.add_to_playlist');
Route::get('user_pages/{id}/process', 'UserPagesController@getPostUpload');
Route::delete('user_pages/delete/{id}', 'UserPagesController@deleteVideo')->name('user_page.delete');
Route::post('user_pages/delete/{id}', 'UserPagesController@delete');
Route::get('user_pages/playlist/{id}', 'UserPagesController@playlistDetail');

Route::resource('earning', 'EarningController');

//front channels
Route::get('front_channel/channel', 'FrontChannelsController@channel');
Route::get('/front_channel/{id}', 'FrontChannelsController@channel');
Route::get('/playlist/{id}', 'FrontChannelsController@playlist');
//Route::get('/blog-list', ['uses' => 'FrontController@blog_list']);
//Route::get('/blog-details/{type}/{slug}', ['as' => 'blog-details.blog_details' ,'uses' => 'FrontController@blog_details']);
//Route::get('/video-details/{type}/{slug}', ['as' => 'video-details.video_details' ,'uses' => 'FrontController@video_details']);
//Route::get('/video-list', ['uses' => 'FrontController@video_list']);
//Route::get('/job-list', ['as' => 'job-list.job_list' ,'uses' => 'FrontController@job_list']);
//Route::get('/job-details/{slug}', ['as' => 'job-details.job_details' , 'uses' => 'FrontController@job_details']);
//Route::get('/ebook', ['uses' => 'FrontController@ebook']);
//Route::get('/replace-slug', ['uses' => 'FrontController@getReplaceSlug']);
//Route::get('/replace-slug-content', ['uses' => 'FrontController@getReplaceSlugContent']);

Route::group(['prefix' => 'admin', 'middleware' => ['menu','auth'], 'namespace' => 'Backend'], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard');
    Route::post('role_menus/mass_store', 'RoleMenusController@mass_store')->name('role_menus.mass_store');
    Route::get('roles/{id}/access', 'RolesController@access')->name('role.access');
    Route::resource('roles', 'RolesController');
    Route::resource('users', 'UsersController');
    Route::resource('menus', 'MenusController');
    Route::resource('channels', 'ChannelsController');
    Route::resource('videos', 'VideosController');
    Route::resource('banners', 'BannersController');
    Route::resource('video_categories', 'VideoCategoriesController');
    Route::resource('role_menus', 'RoleMenusController', [
        'names' => [
            'store'   => 'role_menus.store'
        ],
    ]);
    // Route::get('home', 'HomeController@index')->name('home');
   Route::resource('settings', 'SettingsController');
   Route::resource('content_categories', 'ContentCategoriesController');
   Route::get('content_blogs/detail', ['as' => 'content_blogs.detail', 'uses' => 'NewsedController@detail']);
   Route::resource('newsed', 'NewsedController');
   Route::resource('articles', 'ArticlesController');
   Route::resource('faqs', 'FaqsController');
   Route::resource('contact_us', 'ContactUsController');
   Route::resource('tags', 'TagsController');
   Route::resource('disbursements', 'DisbursementsController');
   Route::get('disbursements/set_status/{status}/{id}', ['as' => 'disbursements.set_status', 'uses' => 'DisbursementsController@setStatus']);


});
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('channel_login', 'Auth\ChannelLoginController@login')->name('channel.login');
Route::post('channel_register', 'Auth\ChannelRegisterController@register')->name('channel.register');

Auth::routes();

//Image Route
Route::group(['prefix' => 'images'], function () {
   Route::get('{any}', ['as' => 'images', 'uses' => 'ImageController@index'])
       ->where('any', '.*');
});

//File Route
Route::group(['prefix' => 'files'], function () {
    Route::get('{any}', ['as' => 'files', 'uses' => 'FileController@index'])
        ->where('any', '.*');
});