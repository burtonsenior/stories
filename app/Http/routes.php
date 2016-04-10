<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/test/stakeholders', function () {
    $stakeholder = Stories\Stakeholder::first();
  
  dd($stakeholder->projects()->first()->pivot);
});

Route::resource('projects', 'ProjectsController');

Route::resource('organisations', 'OrganisationsController');
Route::resource('projects.organisations', 'ProjectOrganisationsController');

Route::resource('projects.stakeholders', 'ProjectStakeholdersController');
Route::resource('projects.stakeholders.organisations', 'ProjectStakeholdersOrganisationsController');
Route::resource('projects.organisations.stakeholders.', 'ProjectOrganisationsStakeholdersController');

Route::resource('projects.stories', 'ProjectStoriesController');
Route::resource('projects.roles', 'ProjectRolesController');
Route::resource('statuses', 'StatusesController');

// Route::group(['prefix' => ''], function() {

// });