<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Competition
    Route::delete('competitions/destroy', 'CompetitionController@massDestroy')->name('competitions.massDestroy');
    Route::resource('competitions', 'CompetitionController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::post('teams/media', 'TeamController@storeMedia')->name('teams.storeMedia');
    Route::post('teams/ckmedia', 'TeamController@storeCKEditorImages')->name('teams.storeCKEditorImages');
    Route::post('teams/parse-csv-import', 'TeamController@parseCsvImport')->name('teams.parseCsvImport');
    Route::post('teams/process-csv-import', 'TeamController@processCsvImport')->name('teams.processCsvImport');
    Route::resource('teams', 'TeamController');

    // Position
    Route::delete('positions/destroy', 'PositionController@massDestroy')->name('positions.massDestroy');
    Route::post('positions/parse-csv-import', 'PositionController@parseCsvImport')->name('positions.parseCsvImport');
    Route::post('positions/process-csv-import', 'PositionController@processCsvImport')->name('positions.processCsvImport');
    Route::resource('positions', 'PositionController');

    // Player
    Route::delete('players/destroy', 'PlayerController@massDestroy')->name('players.massDestroy');
    Route::post('players/media', 'PlayerController@storeMedia')->name('players.storeMedia');
    Route::post('players/ckmedia', 'PlayerController@storeCKEditorImages')->name('players.storeCKEditorImages');
    Route::post('players/parse-csv-import', 'PlayerController@parseCsvImport')->name('players.parseCsvImport');
    Route::post('players/process-csv-import', 'PlayerController@processCsvImport')->name('players.processCsvImport');
    Route::resource('players', 'PlayerController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::post('countries/parse-csv-import', 'CountriesController@parseCsvImport')->name('countries.parseCsvImport');
    Route::post('countries/process-csv-import', 'CountriesController@processCsvImport')->name('countries.processCsvImport');
    Route::resource('countries', 'CountriesController');

    // Onboarding
    Route::delete('onboardings/destroy', 'OnboardingController@massDestroy')->name('onboardings.massDestroy');
    Route::resource('onboardings', 'OnboardingController');

    // Stage
    Route::delete('stages/destroy', 'StageController@massDestroy')->name('stages.massDestroy');
    Route::resource('stages', 'StageController');

    // Category Competition
    Route::delete('category-competitions/destroy', 'CategoryCompetitionController@massDestroy')->name('category-competitions.massDestroy');
    Route::post('category-competitions/parse-csv-import', 'CategoryCompetitionController@parseCsvImport')->name('category-competitions.parseCsvImport');
    Route::post('category-competitions/process-csv-import', 'CategoryCompetitionController@processCsvImport')->name('category-competitions.processCsvImport');
    Route::resource('category-competitions', 'CategoryCompetitionController');

    // Competition Team
    Route::delete('competition-teams/destroy', 'CompetitionTeamController@massDestroy')->name('competition-teams.massDestroy');
    Route::post('competition-teams/parse-csv-import', 'CompetitionTeamController@parseCsvImport')->name('competition-teams.parseCsvImport');
    Route::post('competition-teams/process-csv-import', 'CompetitionTeamController@processCsvImport')->name('competition-teams.processCsvImport');
    Route::resource('competition-teams', 'CompetitionTeamController');

    // Match
    Route::delete('matches/destroy', 'MatchController@massDestroy')->name('matches.massDestroy');
    Route::post('matches/parse-csv-import', 'MatchController@parseCsvImport')->name('matches.parseCsvImport');
    Route::post('matches/process-csv-import', 'MatchController@processCsvImport')->name('matches.processCsvImport');
    Route::resource('matches', 'MatchController');

    // Staduim
    Route::delete('staduims/destroy', 'StaduimController@massDestroy')->name('staduims.massDestroy');
    Route::post('staduims/parse-csv-import', 'StaduimController@parseCsvImport')->name('staduims.parseCsvImport');
    Route::post('staduims/process-csv-import', 'StaduimController@processCsvImport')->name('staduims.processCsvImport');
    Route::resource('staduims', 'StaduimController');

    // Event Type
    Route::delete('event-types/destroy', 'EventTypeController@massDestroy')->name('event-types.massDestroy');
    Route::resource('event-types', 'EventTypeController');

    // Match Event
    Route::delete('match-events/destroy', 'MatchEventController@massDestroy')->name('match-events.massDestroy');
    Route::resource('match-events', 'MatchEventController');

    // Penlity
    Route::delete('penlities/destroy', 'PenlityController@massDestroy')->name('penlities.massDestroy');
    Route::resource('penlities', 'PenlityController');

    // Lineup
    Route::delete('lineups/destroy', 'LineupController@massDestroy')->name('lineups.massDestroy');
    Route::post('lineups/parse-csv-import', 'LineupController@parseCsvImport')->name('lineups.parseCsvImport');
    Route::post('lineups/process-csv-import', 'LineupController@processCsvImport')->name('lineups.processCsvImport');
    Route::resource('lineups', 'LineupController');

    // News
    Route::delete('newss/destroy', 'NewsController@massDestroy')->name('newss.massDestroy');
    Route::post('newss/media', 'NewsController@storeMedia')->name('newss.storeMedia');
    Route::post('newss/ckmedia', 'NewsController@storeCKEditorImages')->name('newss.storeCKEditorImages');
    Route::post('newss/parse-csv-import', 'NewsController@parseCsvImport')->name('newss.parseCsvImport');
    Route::post('newss/process-csv-import', 'NewsController@processCsvImport')->name('newss.processCsvImport');
    Route::resource('newss', 'NewsController');

    // Banner
    Route::delete('banners/destroy', 'BannerController@massDestroy')->name('banners.massDestroy');
    Route::post('banners/media', 'BannerController@storeMedia')->name('banners.storeMedia');
    Route::post('banners/ckmedia', 'BannerController@storeCKEditorImages')->name('banners.storeCKEditorImages');
    Route::post('banners/parse-csv-import', 'BannerController@parseCsvImport')->name('banners.parseCsvImport');
    Route::post('banners/process-csv-import', 'BannerController@processCsvImport')->name('banners.processCsvImport');
    Route::resource('banners', 'BannerController');

    // Client
    Route::delete('clients/destroy', 'ClientController@massDestroy')->name('clients.massDestroy');
    Route::resource('clients', 'ClientController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
