<?php

use App\Http\Controllers\DayliMailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('send-dayli-mail', [DayliMailController::class, 'sendDayliMail']);
