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
Route::post('/candidates', [CandidateController::class, 'store']);
Route::delete('/candidates/{candidate_id}', [CandidateController::class, 'destroy']);
Route::put('/candidates/{candidate_id}', [CandidateController::class, 'update']);

Route::post('/vacancies', [VacancyController::class, 'store']);
Route::get('/vacancies', [VacancyController::class, 'index']);
Route::put('/vacancies/{vacancy_id}', [VacancyController::class, 'update']);
Route::delete('/vacancies/{vacancy_id}', [VacancyController::class, 'destroy']);

Route::get('/candidate-applies', [CandidateApplyController::class, 'index']);
Route::post('/candidate-applies', [CandidateApplyController::class, 'store']);




