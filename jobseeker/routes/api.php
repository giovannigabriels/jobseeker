<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\CandidateApplyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/candidates', [CandidateController::class, 'index']);
Route::get('/vacancies', [VacancyController::class, 'index']);
Route::get('/candidate-applies', [CandidateApplyController::class, 'index']);
Route::post('/candidate-applies', [CandidateApplyController::class, 'store']);




