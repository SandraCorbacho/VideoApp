<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\ChannelController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\WellcomeController;


Route::get('/', [WellcomeController::class, 'index']);
Route::get('/video/detail/{id}', [App\Http\Controllers\VideoController::class, 'index'])->name('videoDetail');

Auth::routes();

Route::prefix('admin')->middleware('role')->group(function () {

    Route::get('/home',[ProfileController::class, 'index'])->name('profile');
    Route::get('/create/{item}',[StaticController::class, 'create'])->name('create');
    Route::get('/detail/{item}',[StaticController::class, 'detail'])->name('detail');
    
    /*---Canal---*/
    Route::post('/channel/create/{item}',[ChannelController::class, 'create'])->name('createChannel');
    Route::get('/channel/edit/{item}',[ChannelController::class, 'edit'])->name('editChannel');
    Route::post('/channel/edit/{item}',[ChannelController::class, 'edit'])->name('editChannel');
    Route::get('/channel/detail/{item}',[StaticController::class, 'detail'])->name('detail');
    
    /*----Video---*/
    Route::post('/video/create/{item}',[VideoController::class, 'create'])->name('createVideo');
    Route::get('/video/edit/{item}',[VideoController::class, 'edit'])->name('editVideo');
    Route::post('/video/edit/{item}',[VideoController::class, 'edit'])->name('editVideo');
    //Route::get('/video/edit/{item}',[VideoController::class, 'detail'])->name('detailVideo');
});




