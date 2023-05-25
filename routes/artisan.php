<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::prefix('')->group(function (){
    Route::get('optimize',function() {
        Artisan::call('optimize');
        return redirect(route('home'))->with(trans('notification.message'));
    });
    Route::get('migrate',function() {
        Artisan::call('migrate');
        return back()->with('alert','done');
    });
});
