<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Team
    Route::post('teams/media', 'TeamApiController@storeMedia')->name('teams.storeMedia');
    Route::apiResource('teams', 'TeamApiController');

    // Player
    Route::post('players/media', 'PlayerApiController@storeMedia')->name('players.storeMedia');
    Route::apiResource('players', 'PlayerApiController');

    // Competition Team
    Route::apiResource('competition-teams', 'CompetitionTeamApiController');

    // Match
    Route::apiResource('matches', 'MatchApiController');

    // Match Event
    Route::apiResource('match-events', 'MatchEventApiController');

    // Penlity
    Route::apiResource('penlities', 'PenlityApiController');

    // Lineup
    Route::apiResource('lineups', 'LineupApiController');
});
