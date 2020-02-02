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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{id}', 'HomeController@profile')->name('user.profile');
Route::post('/profile/update/{id}', 'HomeController@updateProfile')->name('user.profile.update');


Route::get('/managers', 'ManagerController@index')->name('all_manager');
Route::get('/add_manager', 'ManagerController@create')->name('add_manager');  
Route::post('/manager_store', 'ManagerController@store')->name('manager.store');
Route::get('/edit_manager/{id}', 'ManagerController@edit')->name('edit_manager');
Route::post('/manager_update/{id}', 'ManagerController@update')->name('manager.update');
Route::post('/manager_delete/', 'ManagerController@destroy')->name('manager.delete');



Route::post('/create', 'AdminController@create')->name('manager.create');
Route::get('/artist', 'AdminController@artists')->name('artist');
Route::get('/artist/{id}', 'AdminController@edit')->name('artist.view');
Route::post('/artist/delete/', 'AdminController@delete')->name('artist.delete');
Route::get('/biography/{id?}', 'AdminController@artist_biography')->name('artist.add_biography');
Route::get('/biography/edit/{id}', 'AdminController@edit_biography')->name('artist.edit');
Route::post('/artist/store_biography', 'AdminController@store_biography')->name('artist.store_biography');

// Contracts
Route::get('/contracts/{id?}', 'AdminController@contracts')->name('artist.contracts');
Route::get('/add_contract/{id?}', 'AdminController@add_contract')->name('artist.add_contract');
Route::get('/contract/edit/{id}', 'AdminController@edit_contract')->name('artist.edit_contract');
Route::post('/artist/store_contract', 'AdminController@store_contract')->name('artist.store_contract');
Route::post('/contractDelete', 'AdminController@contractDelete')->name('contractDelete');
Route::post('/contractDocument', 'AdminController@contractDocument')->name('contractDocument');
Route::get('/download/{file}','DownloadController@download')->name('download');


Route::view('/checkout', 'checkout-page');
Route::post('/checkout', 'PaymentController@createPayment')->name('create-payment');
Route::get('/confirm', 'Auth\RegisterController@confirmPayment')->name('confirm-payment');

Route::view('/checkouts', 'checkout-page');
Route::post('/checkout1', 'PaymentController@createPayment1')->name('create-payment1');
Route::get('/confirm1', 'PaymentController@confirmPayment1')->name('confirm-payment1');

/*Members*/
Route::get('/members/{id?}', 'AdminController@memberIndex')->name('member.index');
Route::get('/members/create/{id?}', 'AdminController@createMember')->name('member.create');
Route::post('/members/save', 'AdminController@storeMember')->name('member.store');
Route::get('member/edit/{id}', 'AdminController@editMember')->name('member.edit');
Route::post('member/update/{id}', 'AdminController@updateMember')->name('members.update');
Route::post('/member/delete/', 'AdminController@deleteMember')->name('member.delete');

/*Managers*/
Route::get('/artists', 'ManagerController@managerArtist')->name('myartist');
Route::get('/artists/edit/{id}', 'ManagerController@ediMyArtist')->name('myartist.edit');
Route::post('/update/artists/{id}', 'ManagerController@updateMyArtist')->name('myartist.update');
Route::get('/artists/history/{id}', 'ManagerController@pointshistory')->name('myartist.pointshistory');

Route::get('/artists/detail/{id}', 'ManagerController@artistdetail')->name('myartist.view');
Route::post('artists_member/edit', 'ManagerController@myartistedit')->name('mymember.edit');
Route::post('artists_member/update/', 'ManagerController@updateMember')->name('mymembers.update');
Route::post('artists_bio/update/', 'ManagerController@updateBio')->name('artists_bio.update');
Route::post('/bio/delete/', 'ManagerController@deleteBio')->name('bio.delete');



/*Links*/
Route::get('/links/{id?}', 'ArtistController@links')->name('link');
Route::get('/links/create/{id?}', 'ArtistController@createLinks')->name('link.create');
Route::post('/save/links', 'ArtistController@storeLinks')->name('link.save');
Route::get('/links/edit/{id}', 'ArtistController@editLinks')->name('link.edit');
Route::post('/update/links/{id}', 'ArtistController@updateLinks')->name('link.update');

/*Gallery*/
Route::get('/gallery/{id?}', 'ArtistController@index')->name('gallery.all');
Route::get('/create/gallery/{id?}', 'ArtistController@createGallery')->name('gallery.create');
Route::post('/store_gallery_data', 'ArtistController@storeGalleryData')->name('gallery.store');
Route::get('/create/edit/{id}', 'ArtistController@gallery_edit')->name('gallery.edit');
Route::post('/create/update/', 'ArtistController@gallery_update')->name('gallery.update');
Route::post('/gallery/delete/', 'ArtistController@delete')->name('gallery.delete');
Route::post('/gallery/delete_img/', 'ArtistController@delete_img')->name('gallery.delete_img');

/*Acomodation*/
Route::get('/accommodation/{id}', 'ArtistController@accommodation')->name('accommodation.view');
Route::get('/accommodation/create/{id}', 'ArtistController@accommodationCreate')->name('accommodation.create');
Route::post('/accommodation/save/{id}', 'ArtistController@accommodationSave')->name('accommodation.save');
Route::post('/accommodation/delete/', 'ArtistController@acumDelete')->name('aucum.delete');
Route::post('/accommodation/update/', 'ArtistController@updateAccommodation')->name('accommodation.update');
/*Upgrade Package*/
Route::get('/upgrade/', 'ArtistController@upgradepack')->name('upgradepack');
/*Upgrade Package By Admin*/
Route::post('/updatepkg/', 'AdminController@updateBooking')->name('pkg.update');

//game Lobby
Route::get('/points/lobby', 'ArtistController@gamelobby')->name('gamification');
Route::post('/purchaseCoin', 'ArtistController@purchaseCoin')->name('purchaseCoin');

//coin packae
Route::get('/points', 'CoinsController@points')->name('points');
Route::get('/add_point', 'CoinsController@create')->name('add_point');
Route::post('/coin_store', 'CoinsController@store')->name('coin.store');
Route::post('/coin/delete/', 'CoinsController@delete')->name('coin.delete');
Route::get('/edit_point/{id}', 'CoinsController@edit')->name('edit_point');
Route::post('/coin_update/{id}', 'CoinsController@update')->name('coin.update');

//notification markas read 
Route::post('/markAsRead','ArtistController@markAsRead')->name('markAsRead');

//Submissions package
Route::get('submissions', 'CoinsController@submissions')->name('submissions');
Route::post('/coupon', 'CoinsController@coupon')->name('coupon');
Route::get('/submitedcoupon', 'CoinsController@submitedcoupon')->name('submitedcoupon');
Route::get('/achivements', 'CoinsController@achivements')->name('achivements');