<?php
/**
 * @copyright 2018 Manfred047
 * @author Emanuel Chablé Concepción <manfred@manfred047.com>
 * @version 1.0.0
 * @website: https://manfred047.com
 * @github https://github.com/Manfred047
 */

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

// Route::view('/', 'app');
// Route::view('{all}', 'app')
//     ->where(['all' => '^(?!api).*$']);

Route::get('/', 'WelcomeController@index');

Route::post('register', 'Auth\RegisterController@store');

Route::post('/oauth/token', 'Auth\LoginController@login')
// ->middleware(['oauth.grant:password', 'oauth.details'])
->name('login');

Route::resource('addresses', 'AddressController');
Route::get('getAddressByCEP/{cep}', 'AddressController@getAddressByCEP');

Route::resource('accountsBanks', 'AccountsBanksController');

Route::resource('companies', 'CompaniesController');
Route::put('criateFullCompany', 'CompaniesController@criateFullCompany');

Route::resource('costsCenters', 'CostsCentersController');

Route::resource('usersRoles', 'UsersRolesController');
Route::resource('usersStatuses', 'UsersStatusController');

Route::resource('users', 'UsersController');
Route::put('criateFullUser', 'UsersController@criateFullUser');

Route::resource('bases', 'BasesController');
Route::put('bases/{id}/baseFromCSV', 'BasesController@baseFromCSV');

Route::resource('basesOrigins', 'BasesOriginsController');
Route::resource('usersBases', 'UsersBasesController');


Route::resource('campaigns', 'CampaignsController');
Route::put('criateFullCampaign', 'CampaignsController@criateFullCampaign');

Route::resource('campaignsStatuses', 'CampaignsStatusController');

Route::resource('planes', 'PlanesController');
Route::resource('questionnaires', 'QuestionnairesController');
Route::get('fullQuestionary/{id}', 'QuestionnairesController@fullQuestionary');

Route::resource('questions', 'QuestionsController');

Route::resource('questionsTypes', 'QuestionsTypesController');
Route::resource('optionsResponses', 'OptionsResponsesController');
Route::resource('responses', 'ResponsesController');
Route::resource('responsesTypes', 'ResponsesTypesController');

Route::resource('extractionsStatuses', 'ExtractionsStatusController');
Route::resource('extractions', 'ExtractionsController');

Route::resource('recompenses', 'RecompensesController');

