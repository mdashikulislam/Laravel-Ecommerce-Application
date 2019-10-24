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
//User Route
Route::get('/','front\HomeController@index')->name('user.index');
//Admin Route
Route::prefix('admins')->group(function (){
    Route::resource('/','admin\HomeController');
    Route::resource('/setting','admin\SettingController');
    Route::post('setting/visibility','admin\SettingController@visibility')->name('setting.visibility');
    Route::put('setting/header_top/{id}','admin\SettingController@headerTop')->name('setting.header_top');
    Route::post('setting/slider','admin\SettingController@slider')->name('setting.slider');
    Route::put('setting/slider/edit/{id}','admin\SettingController@editSlider')->name('setting.slider.edit');
    Route::delete('setting/slider/delete/{id}','admin\SettingController@sliderDelete')->name('setting.slider.destroy');
    Route::put('setting/testimonial/edit/{id}','admin\SettingController@editTestimonial')->name('setting.testimonial.edit');
    Route::post('setting/testimonial','admin\SettingController@testimonial')->name('setting.testimonial');
    Route::delete('setting/testimonial/delete/{id}','admin\SettingController@testimonialDelete')->name('setting.testimonial.destroy');
    Route::put('setting/footer/edit/{id}','admin\SettingController@footer')->name('setting.footer.update');
    Route::post('setting/partner/create','admin\SettingController@partnerCreate')->name('setting.partner.create');
    Route::delete('setting/partner/delete/{id}','admin\SettingController@partnerDelete')->name('setting.partner.destroy');
    Route::put('setting/partner/edit/{id}','admin\SettingController@partnerEdit')->name('setting.partner.update');
});