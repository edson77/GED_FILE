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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['middleware' => 'no-cache'], function() {
    Route::get('/', 'AuthController@login1')->name('login');
    Route::post('/', 'AuthController@login')->name('user.login');
});


Route::get('/logout', 'UserController@logout')->name('user.logout');

Route::group(['middleware' => 'auth'], function() {
    

    Route::get('/home', 'HomeController@home')->name('home')->middleware('no-cache');
    Route::get('/My_Account', 'UserController@showAuthUser')->name('account');
    Route::resource('users', 'UserController')->middleware('no-cache');
    Route::get('users/{id}/desactivate', 'UserController@desactivate')->name('users.desactivate');
    Route::post('users/{id}/param', 'UserController@param')->name('users.param');
    Route::post('users/{id}/update', 'UserController@update')->name('users.update');
    Route::get('users_print', 'PrintController@printUsers')->name('users.print');
    Route::get('user/{id}/print', 'PrintController@printUser')->name('user.print');

    //courriers
    Route::resource('/courrier', 'CourrierController')->middleware('no-cache');
    Route::post('/courrier/{id}', 'CourrierController@update')->name('courrier.update');
    Route::get('/courrier/{id}/show', 'CourrierController@show')->name('courrier.show');
    Route::get('/courrier/{id}/desactivate', 'CourrierController@desactivate')->name('courrier.desactivate');
    Route::post('/courrier/{id}/change_pdf', 'CourrierController@changePdf')->name('courrier.changePdf');
    Route::get('/courrier/{id}/print', 'PrintController@detailsCourrier')->name('courrier.print');
    Route::post('/search', 'CourrierController@searchDirection')->name('courrier.search');
    Route::post('/search/public', 'CourrierController@searchPublic')->name('courrier.public.search');
    Route::get('/courrier/result', 'CourrierController@result')->name('courrier.result');
    Route::get('/courrier/{id}/subdiv', 'CourrierController@subdiv')->name('courrier.subdiv');
    Route::post('/search/{id}/sub', 'CourrierController@search_sub')->name('courrier.search_sub');
    Route::get('/courrier_public', 'PrintController@courriersPublics')->name('courriers.public.print');
    Route::get('/courrier_public/deleted', 'CourrierController@delete')->name('courrier.delete');
    Route::get('/public_deleted/print', 'PrintController@publicsDeleted')->name('public.print.deleted');

    //courriers service
    Route::get('/courrier/{id}/service', 'CourrierController@courrierService')->name('courrier.service');

    //courriers internes

    Route::get('/courrier/interne/create', 'CourrierController@create_interne')->name('courrier.interne.create');
    Route::post('/courrier/interne/store', 'CourrierController@store_interne')->name('courrier.interne.store');
    Route::get('/courrier_interne', 'CourrierController@index_interne')->name('courrier.interne.index');
    Route::get('/courrier_interne/{id}/show', 'CourrierController@show_interne')->name('courrier.interne.show');
    Route::get('/courrier_interne/{id}/edit', 'CourrierController@edit_interne')->name('courrier.interne.edit');
    Route::get('/delete_interne', 'CourrierController@delete_interne')->name('courrier.interne.delete');
    Route::get('/courrier_interne/print', 'PrintController@courriersInternes')->name('courriers.interne.print');
    Route::post('/search/interne', 'CourrierController@searchInterne')->name('courrier.interne.search');
    Route::get('/interne_deleted/print', 'PrintController@internesDeleted')->name('interne.print.deleted');

    //courriers confidentiels
    Route::get('/courrier_confidentiel', 'CourrierController@courrier_confidentiel')->name('courrier.confidentiel');
    Route::get('/confidentiel_deleted', 'CourrierController@confidentiel_deleted')->name('confidentiel.deleted');
    Route::get('/courrier_confidentiel/print', 'PrintController@courriersConfidentiels')->name('courriers.confidentiel.print');
    Route::post('/search/confidentiel', 'CourrierController@searchConfidentiels')->name('courrier.confidentiel.search');
    Route::get('/confidentiel_deleted/print', 'PrintController@confidentielsDeleted')->name('confidentiel.print.deleted');

    //correspondance confidentielle
    Route::get('/correspondance_confidentielle', 'CourrierController@courrier_correspondance')->name('courrier.correspondance');
    Route::get('/deleted_correspondance', 'CourrierController@correspondance_deleted')->name('correspondance.deleted');
    Route::post('/search/correspondance', 'CourrierController@searchCorrespondance')->name('correspondance.search');
    Route::get('/correspondance/print', 'PrintController@correspondance')->name('correspondance.print');
    Route::get('/correspondance_deleted/print', 'PrintController@correspondancesDeleted')->name('correspondance.deleted.print');

    //courriers direction || sous direction || service
    Route::get('/courrier_direction', 'CourrierController@courrier_direction')->name('courrier.direction');
    Route::get('/direction_deleted', 'CourrierController@direction_deleted')->name('direction.deleted');
    Route::get('/courrier_print', 'PrintController@courriersRecus')->name('courriers.print.all');
    Route::get('/direction_deleted/print', 'PrintController@courriersDirectionSupprimes')->name('direction.print.deleted');

    // Service discipline contentieux

    Route::get('/service_discipline', 'CourrierController@service_discipline')->name('courrier.service_discipline');
    Route::get('/service_discipline/deleted', 'CourrierController@service_discipline_deleted')->name('service_discipline.deleted');
    Route::post('/search/service_discpline', 'CourrierController@searchServiceDiscipline')->name('service_discipline.search');
    Route::get('/service_discipline/print', 'PrintController@printServiceDiscipline')->name('service_discipline.print');
    Route::get('/service_discipline/print/delete', 'PrintController@printServiceDisciplineDelete')->name('service_discipline.print.delete');

    Route::resource('/audiences', 'AudienceController');
    Route::post('/audience/{id}/update', 'AudienceController@update')->name('audience.update');
    Route::get('/audiences_print', 'PrintController@printAudiences')->name('audiences.print');
    Route::get('/instructions/{id}/audience', 'InstructionAudienceController@add')->name('instructions.audience.add');
    Route::post('/instructions/{id}/audience', 'InstructionAudienceController@save')->name('instructions.audience.save');

    Route::resource('/instructions', 'InstructionController');
    Route::get('/instructions_print', 'PrintController@printInstructions')->name('instructions.print');
    Route::get('/instructions_print/recu', 'PrintController@printInstructionsRecus')->name('instructions.recu.print');
    Route::get('/instructions/{id}/add', 'InstructionController@add')->name('instructions.add');
    Route::post('/instruction/{id}/save', 'InstructionController@save')->name('instructions.save');
    Route::get('/instruction/{id}/delete', 'InstructionController@delete')->name('instructions.delete');
    Route::get('/instructions_courrier', 'InstructionController@instructions_courrier')->name('instructions.courrier');
    Route::get('/instructions_recu', 'InstructionController@recu')->name('instructions.recu');
    Route::get('/instructions/{id}/show', 'InstructionController@show')->name('instructions.show');

    Route::get('/notification/{id}/audience/{audience}', 'NotificationController@notAudience')->name('notification.audience');
    Route::get('/notification/{id}/courrier/{courrier}', 'NotificationController@notCourrier')->name('notification.courrier');
    
    Route::get('/logs', 'LogController@index')->name('logs');
    Route::post('/log', 'LogController@log')->name('log.relance');
    Route::get('/fichier_print', 'PrintController@fichier')->name('fichier.print');

    Route::get('/sessions/agents_courriers', 'SessionController@agentCourrier')->name('sessions.agent_courrier');
    Route::get('/sessions/all', 'SessionController@all')->name('sessions.all');
    Route::get('/test', 'HomeController@test');
});


