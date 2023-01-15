<?php

use App\Http\Controllers\Api\Authentication\AuthController;
use App\Http\Controllers\Api\Laboratories\ConceptController;
use App\Http\Controllers\Api\Laboratories\LabCategoryController;
use App\Http\Controllers\Api\Laboratories\LabContentController;
use App\Http\Controllers\Api\Laboratories\NewsController;
use App\Http\Controllers\Api\Laboratories\NotificationController;
use App\Http\Controllers\Api\Laboratories\ProfileController;
use App\Http\Controllers\Api\Laboratories\SchoolStatisticsController;
use App\Http\Controllers\Api\Laboratories\SearchController;
use App\Http\Controllers\Dashboard\Rawafed\DeviceTokenController;
use Illuminate\Support\Facades\Route;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('/login',[AuthController::class,'login']);

Route::post('device-tokens',[DeviceTokenController::class,'store'])->middleware('auth:sanctum');

Route::get('search/{text}',[SearchController::class,'search']);

Route::get('systematic-experiments-grade/{grade_id}',[SearchController::class,'getSystematicExperimentsByGrade']);
Route::get('enrichment-experiments-grade/{grade_id}',[SearchController::class,'getEnrichmentExperimentsByGrade']);
Route::get('students-work-grade/{grade_id}',[SearchController::class,'getStudentsWorkByGrade']);
Route::get('applications-grade/{grade_id}',[SearchController::class,'getApplicationsByGrade']);
Route::get('data/{id}/{category_id}',[SearchController::class,'getSystematicExperimentsById']);

Route::get('school-statistics/{school_id}',[SchoolStatisticsController::class,'getSchoolStatistics']);

Route::get('notifications', [NotificationController::class, 'index'])->name('notifications')->middleware('auth:sanctum');

Route::group(['prefix' => 'user'],function (){

    Route::get('/{id}',[ProfileController::class,'index']);

    Route::post('changePassword/{id}',[ProfileController::class,'changePassword'])->middleware('auth:sanctum');
});

Route::group(['prefix' => 'news'],function (){

    Route::get('allNews',[NewsController::class,'allNews']);

    Route::get('myNews/{id}',[NewsController::class,'myNews']);

    Route::get('latestNews',[NewsController::class,'latestNews']);

    Route::get('getSchools/{id}',[NewsController::class,'getSchools']);

    Route::post('store',[NewsController::class,'store'])->middleware('auth:sanctum');

    Route::put('update/{id}',[NewsController::class,'update'])->middleware('auth:sanctum');

    Route::delete('destroy/{id}',[NewsController::class,'destroy'])->middleware('auth:sanctum');
});

Route::group(['prefix' => 'lab-categories'],function (){

    Route::get('/',[LabCategoryController::class,'index']);
});

Route::group(['prefix' => 'concepts'],function (){

    Route::get('/',[ConceptController::class,'index']);
});

Route::group(['prefix' => 'lab-contents'], function () {

    Route::get('/getGrades', [LabContentController::class, 'getGrades']);

    Route::get('/getSemesters', [LabContentController::class, 'getSemesters']);

    Route::get('/getSubjects/{id}', [LabContentController::class, 'getSubjects']);

    Route::get('getUnits/{class_id}/{subject_id}/{semester_id}', [LabContentController::class, 'getUnits']);

    Route::get('getLessons/{id}', [LabContentController::class, 'getLessons']);

    Route::get('systematicExperiments', [LabContentController::class, 'systematicExperiments']);

    Route::get('enrichmentExperiments', [LabContentController::class, 'enrichmentExperiments']);

    Route::get('studentsWork', [LabContentController::class, 'studentsWork']);

    Route::get('applications', [LabContentController::class, 'applications']);

    Route::get('lastSystematicExperiments', [LabContentController::class, 'lastSystematicExperiments']);

    Route::get('lastEnrichmentExperiments', [LabContentController::class, 'lastEnrichmentExperiments']);

    Route::get('lastStudentsWork', [LabContentController::class, 'lastStudentsWork']);

    Route::get('lastApplications', [LabContentController::class, 'lastApplications']);

    Route::get('getMyLibraryContent', [LabContentController::class, 'getMyLibraryContent'])->middleware('auth:sanctum');

    Route::get('getMyApplications', [LabContentController::class, 'getMyApplications'])->middleware('auth:sanctum');

    Route::post('store', [LabContentController::class, 'store'])->middleware('auth:sanctum');

    Route::put('update/{id}', [LabContentController::class, 'update'])->middleware('auth:sanctum');

    Route::delete('destroy/{id}',[LabContentController::class,'destroy'])->middleware('auth:sanctum');

});
