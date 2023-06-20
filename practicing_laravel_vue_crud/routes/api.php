<?php

use App\Http\Controllers\Api\JobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('jobs', JobController::class);
