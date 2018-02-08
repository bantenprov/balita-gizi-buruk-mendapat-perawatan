<?php

Route::group(['prefix' => 'bg-buruk-perawatan', 'middleware' => ['web']], function() {

    $controllers = (object) [
        'index'     => 'Bantenprov\BGBurukPerawatan\Http\Controllers\BGBurukPerawatanController@index',
        'create'     => 'Bantenprov\BGBurukPerawatan\Http\Controllers\BGBurukPerawatanController@create',
        'store'     => 'Bantenprov\BGBurukPerawatan\Http\Controllers\BGBurukPerawatanController@store',
        'show'      => 'Bantenprov\BGBurukPerawatan\Http\Controllers\BGBurukPerawatanController@show',
        'update'    => 'Bantenprov\BGBurukPerawatan\Http\Controllers\BGBurukPerawatanController@update',
        'destroy'   => 'Bantenprov\BGBurukPerawatan\Http\Controllers\BGBurukPerawatanController@destroy',
    ];

    Route::get('/',$controllers->index)->name('bg-buruk-perawatan.index');
    Route::get('/create',$controllers->create)->name('bg-buruk-perawatan.create');
    Route::post('/store',$controllers->store)->name('bg-buruk-perawatan.store');
    Route::get('/{id}',$controllers->show)->name('bg-buruk-perawatan.show');
    Route::put('/{id}/update',$controllers->update)->name('bg-buruk-perawatan.update');
    Route::post('/{id}/delete',$controllers->destroy)->name('bg-buruk-perawatan.destroy');

});

