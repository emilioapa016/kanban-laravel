<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::post('/boards', [ItemController::class, 'store']);
Route::put('/boards/{id}', [ItemController::class, 'update']);
