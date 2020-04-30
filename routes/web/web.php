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

Route::view('/', 'app');
Route::view('{all}', 'app')
    ->where(['all' => '^(?!api).*$']);

// Route::get('/', 'WelcomeController@index');

Route::post('register', 'Auth\RegisterController@store');

Route::post('/oauth/token', 'Auth\LoginController@login')
// ->middleware(['oauth.grant:password', 'oauth.details'])
->name('login');


Route::resource('usersRoles', 'UsersRoleController');

Route::resource('usersStatus', 'UsersStatuController');


Route::resource('usersRoles', 'UsersRoleController');

Route::resource('usersStatus', 'UsersStatuController');

Route::resource('campaignsStatus', 'CampaignsStatuController');

Route::resource('extractionsStatus', 'ExtractionsStatuController');

Route::resource('questionsTypes', 'QuestionsTypesController');

Route::resource('responsesTypes', 'ResponsesTypesController');

Route::resource('basesOrigins', 'BasesOriginsController');

Route::resource('usersRoles', 'UsersRolesController');

Route::resource('usersRoles', 'UsersRolesController');

Route::resource('usersRoles', 'UsersRolesController');

Route::resource('usersRoles', 'UsersRolesController');

Route::resource('usersStatuses', 'UsersStatusController');

Route::resource('campaignsStatuses', 'CampaignsStatusController');

Route::resource('extractionsStatuses', 'ExtractionsStatusController');

Route::resource('questionsTypes', 'QuestionsTypesController');

Route::resource('responsesTypes', 'ResponsesTypesController');

Route::resource('basesOrigins', 'BasesOriginsController');

Route::resource('addresses', 'AddressController');

Route::resource('planes', 'PlanesController');

Route::resource('bases', 'BasesController');

Route::resource('companies', 'CompaniesController');

Route::resource('costsCenters', 'CostsCentersController');

Route::resource('users', 'usersController');

Route::resource('usersBases', 'UsersBasesController');

Route::resource('questionnaires', 'QuestionnairesController');

Route::resource('campaigns', 'CampaignsController');

Route::resource('questions', 'QuestionsController');



Route::resource('responses', 'ResponsesController');

Route::resource('extractions', 'ExtractionsController');

Route::resource('recompenses', 'RecompensesController');

Route::resource('accountsBanks', 'AccountsBanksController');

Route::resource('accountsBanks', 'AccountsBanksController');