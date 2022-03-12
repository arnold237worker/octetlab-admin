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

Route::get('/', 'HomeController@login')->name('login');
Route::post('/do-login', 'UserController@doLogin')->name('dologin');

Route::group(['middleware' => 'user.auth'], function(){
    Route::get('/tableau-de-bord', 'HomeController@dashboard')->name('dashboard');
    //Route to manage services
    Route::get('/services', 'ServiceController@index')->name('services');
    Route::get('/service', 'ServiceController@create')->name('services.create');
    Route::post('/service', 'ServiceController@store')->name('services.store');
    Route::get('/service/{slug}', 'ServiceController@edit')->name('services.edit');
    Route::post('/service/{id}', 'ServiceController@update')->name('services.update');
    Route::get('/service/{id}/delete', 'ServiceController@delete')->name('services.delete');

    //Route to manage realizations
    Route::get('/realisations', 'RealisationController@index')->name('realisations');
    Route::get('/realisation', 'RealisationController@create')->name('realisations.create');
    Route::post('/realisation', 'RealisationController@store')->name('realisations.store');
    Route::get('/realisation/{slug}', 'RealisationController@edit')->name('realisations.edit');
    Route::post('/realisation/{id}', 'RealisationController@update')->name('realisations.update');
    Route::get('/realisation/{id}/delete', 'RealisationController@delete')->name('realisations.delete');
    Route::get('/realisation-image/{id}/delete', 'RealisationController@deleteImage')->name('realisationImage.delete');
    Route::post('/realisation-image', 'RealisationController@storeImage')->name('realisationImage.store');

    
    Route::get('/equipes', 'TeamController@index')->name('teams');
    Route::get('/equipe', 'TeamController@create')->name('teams.create');
    Route::post('/equipe', 'TeamController@store')->name('teams.store');
    Route::get('/equipe/{id}', 'TeamController@edit')->name('teams.edit');
    Route::post('/equipe/{id}', 'TeamController@update')->name('teams.update');
    Route::get('/equipe/{id}/delete', 'TeamController@delete')->name('teams.delete');

    Route::get('/temoignages', 'TestimonialController@index')->name('testimonial');
    Route::get('/temoignage', 'TestimonialController@create')->name('temoignages.create');
    Route::get('/temoignage/{id}', 'TestimonialController@edit')->name('temoignages.edit');
    Route::post('/temoignage', 'TestimonialController@store')->name('temoignages.store');
    Route::post('/temoignage/{id}', 'TestimonialController@update')->name('temoignages.update');
    Route::get('/temoignage/{id}/delete', 'TestimonialController@delete')->name('temoignages.delete');
    
    Route::get('/process', 'ProcessController@index')->name('process');
    Route::get('/process/{id}/edit', 'ProcessController@edit')->name('process.edit');
    Route::post('/process', 'ProcessController@store')->name('process.store');
    Route::get('/process/create', 'ProcessController@create')->name('process.create');
    Route::post('/process/{id}', 'ProcessController@update')->name('process.update');
    Route::get('/process/{id}/delete', 'ProcessController@delete')->name('process.delete');

    Route::get('/packages', 'PackageController@index')->name('packages');
    Route::get('/package/{id}/edit', 'PackageController@edit')->name('package.edit');
    Route::post('/package', 'PackageController@store')->name('package.store');
    Route::get('/package/create', 'PackageController@create')->name('package.create');
    Route::post('/package/{id}', 'PackageController@update')->name('package.update');
    Route::get('/package/{id}/delete', 'PackageController@delete')->name('package.delete');
    
    Route::get('/avis', 'AvisController@index')->name('avis');
    Route::get('/avis/{id}', 'AvisController@show')->name('avis.show');


    Route::get('/sections', 'SectionController@index')->name('sections');
    Route::get('/section/{id}/show', 'SectionController@show')->name('sections.show');
    Route::post('/sections', 'SectionController@store')->name('sections.store');
    Route::get('/section/create', 'SectionController@create')->name('sections.create');
    Route::get('section/{id}/delete', 'SectionController@delete')->name('sections.delete');
    Route::post('/sections/{id}', 'SectionController@update')->name('sections.update');
});

