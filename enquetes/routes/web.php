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

Route::group(['prefix' => 'avaliacao'], function() {
    Auth::routes();

    Route::group(['prefix' => 'administracao'], function(){
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/admin', 'HomeController@administracao');
        Route::any('/admin/Cadastro', 'HomeController@cadastrar');
        Route::any('/admin/Cadastro/Update/{id}', 'HomeController@update')->where('id', '[0-9]+');
        Route::any('/admin/Cadastro/Update/att/{id}', 'HomeController@attUser')->where('id', '[0-9]+');
        Route::any('/admin/Cadastro/Deletar/{id}', 'HomeController@deleteUser')->where('id', '[0-9]+');
        Route::any('/admin/Turmas/{id}', 'TurmaController@index')->where('id', '[0-9]+');
        Route::any('/admin/Turma/{id}', 'TurmaController@addTurma')->where('id', '[0-9]+');
        Route::any('/admin/Turma/Deletar/{id}', 'TurmaController@deletarTurma')->where('id', '[0-9]+');
        Route::any('/admin/Sedes/{id}', 'SedesController@index')->where('id', '[0-9]+');
        Route::any('/admin/Sede/{id}', 'SedesController@addSede')->where('id', '[0-9]+');
        Route::any('/admin/Sede/Deletar/{id}', 'SedesController@deletarSede')->where('id', '[0-9]+');
        Route::any('/admin/Disciplinas/{id}', 'DisciplinasController@index')->where('id', '[0-9]+');
        Route::any('/admin/Disciplina/{id}', 'DisciplinasController@addDisciplina')->where('id', '[0-9]+');
        Route::any('/admin/Disciplina/Deletar/{id}', 'DisciplinasController@deletarDisciplina')->where('id', '[0-9]+');
        Route::any('/admin/Turnos/{id}', 'TurnosController@index')->where('id', '[0-9]+');
        Route::any('/admin/Turno/{id}', 'TurnosController@addTurno')->where('id', '[0-9]+');
        Route::any('/admin/Turno/Deletar/{id}', 'TurnosController@deletarTurno')->where('id', '[0-9]+');
        Route::any('/admin/Series/{id}', 'SeriesController@index')->where('id', '[0-9]+');
        Route::any('/admin/Serie/{id}', 'SeriesController@addSerie')->where('id', '[0-9]+');
        Route::any('/admin/Serie/Deletar/{id}', 'SeriesController@deletarSerie')->where('id', '[0-9]+');
        Route::any('/admin/Ensinos/{id}', 'EnsinoController@index')->where('id', '[0-9]+');
        Route::any('/admin/Ensino/{id}', 'EnsinoController@addEnsino')->where('id', '[0-9]+');
        Route::any('/admin/Ensino/Deletar/{id}', 'EnsinoController@deletarEnsino')->where('id', '[0-9]+');

        Route::group(['prefix' => 'vinculacoes'], function() {
            Route::get('/', 'STTSEController@index');
            Route::get('/cadastro', 'STTSEController@cadastroSTTSE');
            Route::post('/cadastro', 'STTSEController@cadastrar');
        });


    });

});



