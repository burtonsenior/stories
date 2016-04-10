<?php

ApiRoute::group(['prefix' => 'projects', 'as' => 'api.projects.'], function() {

	ApiRoute::get('/', 'ProjectsController@index')->name('index');
	ApiRoute::get('/{projects}', 'ProjectsController@show')->name('show');
	ApiRoute::post('/', 'ProjectsController@store')->name('store');
	ApiRoute::put('/{projects}', 'ProjectsController@update')->name('update');
	ApiRoute::delete('/{projects}', 'ProjectsController@destroy')->name('delete');

	ApiRoute::group(['prefix' => '{projects}/stories', 'as' => 'stories.'], function() {

		ApiRoute::get('/', 'ProjectStoriesController@index')->name('index');
		ApiRoute::get('/{stories}', 'ProjectStoriesController@show')->name('show');
		ApiRoute::post('/', 'ProjectStoriesController@store')->name('store');
		ApiRoute::put('/{stories}', 'ProjectStoriesController@update')->name('update');
		ApiRoute::delete('/{stories}', 'ProjectStoriesController@destroy')->name('delete');

	});

	ApiRoute::group(['prefix' => '{projects}/stakeholders', 'as' => 'stakeholders.'], function() {

		ApiRoute::get('/', 'ProjectStakeholdersController@index')->name('index');
		ApiRoute::get('/{stakeholders}', 'ProjectStakeholdersController@show')->name('show');
		ApiRoute::post('/', 'ProjectStakeholdersController@store')->name('store');
		ApiRoute::put('/{stakeholders}', 'ProjectStakeholdersController@update')->name('update');
		ApiRoute::delete('/{stakeholders}', 'ProjectStakeholdersController@destroy')->name('delete');

	});

});

