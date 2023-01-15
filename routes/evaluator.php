<?php
/*
use App\Http\Controllers\Projects\DashboardController;
use App\Http\Controllers\Projects\LoginController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function ()
    {
        //note that the prefix is admin for all file route.
        Route::group(['namespace'=>'Projects','middleware'=>'auth:evaluator','prefix'=>'evaluator'],function ()
        {
            //first page admin visits if authentecated
            Route::get('/',[DashboardController::class,'index'])->name('evaluator.dashboard');
            Route::get('logout',[LoginController::class,'logout'])->name('admin.logout');

            Route::get('/finalOlympicEvaluations',[DashboardController::class,'finalOlympicEvaluations'])->name('evaluator.projects.finalOlympicEvaluations');
            Route::get('/finalPalEvaluations',[DashboardController::class,'finalPalEvaluations'])->name('evaluator.projects.finalPalEvaluations');

            Route::get('/olympicProjects',[DashboardController::class,'olympicProjects'])->name('evaluator.projects.olympicProjects');
            Route::get('/palProjects',[DashboardController::class,'palProjects'])->name('evaluator.projects.palProjects');

            Route::get('create/{id}',[DashboardController::class,'createEvaluate'])->name('evaluator.projects.create');
            Route::post('store',[DashboardController::class,'storeEvaluate'])->name('evaluator.projects.store');

            /*Route::get('/waitingOlympicProjects',[DashboardController::class,'waitingOlympicProjects'])->name('evaluator.projects.waitingOlympicProjects');
            Route::get('/waitingPalProjects',[DashboardController::class,'waitingPalProjects'])->name('evaluator.projects.waitingPalProjects');*/

           /* Route::get('edit/{id}',[DashboardController::class,'edit'])->name('evaluator.projects.edit');
            Route::put('update/{id}',[DashboardController::class,'update'])->name('evaluator.projects.update');

            Route::get('destroy/{id}', [DashboardController::class, 'destroy'])->name('evaluator.projects.destroy');

        });*/

        /*
         * routes to admin login
        */
       /* Route::group(['middleware'=>'guest:evaluator','prefix'=>'evaluator'],function ()
        {
            route::get('login',[LoginController::class,'login'])->name('admin.login');
            Route::post('login',[LoginController::class,'postLogin'])->name('admin.post.login');
        });
});*/
