<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewController;


Route::get('/', [NewController::class, 'index']);
