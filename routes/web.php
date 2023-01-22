<?php

use App\Http\Controllers\Dashboard\Enjaz\ContentController;
use App\Http\Controllers\Dashboard\Enjaz\CPanelController;
use App\Http\Controllers\Dashboard\Enjaz\EnjazPanelController;

use App\Http\Controllers\Dashboard\Enjaz\ExperienceController;
use App\Http\Controllers\Dashboard\Enjaz\LanguageController;
use App\Http\Controllers\Dashboard\Enjaz\MembershipController;
use App\Http\Controllers\Dashboard\Enjaz\SkillController;
use App\Http\Controllers\Dashboard\Enjaz\SocialSitesController;
use App\Http\Controllers\Dashboard\Enjaz\UserQualificationController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function ()
    {
     Route::get('enjaz-cpanel',[EnjazPanelController::class,'index']);
     /*Route::get('experiences',[ExperienceController::class,'index'])->name('experiences.index');*/

     /*************************** Teacher Enjaz Routes **********************************************/
     /*************************** Experience Routes **********************************************/
        Route::get('enjaz-cpanel', [CPanelController::class,'index'])->name('enjaz.cpanel');
        Route::group(['prefix' => 'experiences'], function () {

            Route::get('/', [ExperienceController::class, 'index'])->name('experiences.index');

            Route::post('store', [ExperienceController::class, 'store'])->name('experiences.store');

            Route::get('edit/{id}', [ExperienceController::class, 'edit'])->name('experiences.edit');

            Route::put('update/{id}', [ExperienceController::class, 'update'])->name('experiences.update');

            Route::get('destroy/{id}', [ExperienceController::class, 'destroy'])->name('experiences.destroy');

            Route::get('status/{status}/{id}', [ExperienceController::class, 'status']);
        });
        Route::group(['prefix' => 'skills'], function () {

            Route::get('/', [SkillController::class, 'index'])->name('skills.index');

            Route::get('create', [SkillController::class, 'create'])->name('skills.create');

            Route::post('store', [SkillController::class, 'store'])->name('skills.store');

            Route::get('edit/{id}', [SkillController::class, 'edit'])->name('skills.edit');

            Route::put('update/{id}', [SkillController::class, 'update'])->name('skills.update');

            Route::get('destroy/{id}', [SkillController::class, 'destroy'])->name('skills.destroy');
        });

        Route::group(['prefix' => 'memberships'], function () {

            Route::get('/', [MembershipController::class, 'index'])->name('memberships.index');

            Route::get('create', [MembershipController::class, 'create'])->name('memberships.create');

            Route::post('store', [MembershipController::class, 'store'])->name('memberships.store');

            Route::get('edit/{id}', [MembershipController::class, 'edit'])->name('memberships.edit');

            Route::put('update/{id}', [MembershipController::class, 'update'])->name('memberships.update');

            Route::get('destroy/{id}', [MembershipController::class, 'destroy'])->name('memberships.destroy');
        });

        Route::group(['prefix' => 'courses'], function () {

            Route::get('/', [ExperienceController::class, 'index'])->name('courses.index');

            Route::get('create', [ExperienceController::class, 'create'])->name('courses.create');

            Route::post('store', [ExperienceController::class, 'store'])->name('courses.store');

            Route::get('edit/{id}', [ExperienceController::class, 'edit'])->name('courses.edit');

            Route::put('update/{id}', [ExperienceController::class, 'update'])->name('courses.update');

            Route::get('destroy/{id}', [ExperienceController::class, 'destroy'])->name('courses.destroy');
        });
        Route::group(['prefix' => 'social-sites'], function () {

            Route::get('/', [SocialSitesController::class, 'index'])->name('socials.index');

            Route::get('create', [SocialSitesController::class, 'create'])->name('socials.create');

            Route::post('store', [SocialSitesController::class, 'store'])->name('socials.store');

            Route::get('edit/{id}', [SocialSitesController::class, 'edit'])->name('socials.edit');

            Route::put('update/{id}', [SocialSitesController::class, 'update'])->name('socials.update');

            Route::get('destroy/{id}', [SocialSitesController::class, 'destroy'])->name('socials.destroy');
        });
        Route::group(['prefix' => 'user-qualifications'], function () {

            Route::get('/', [UserQualificationController::class, 'index'])->name('user-qualifications.index');

            Route::get('create', [UserQualificationController::class, 'create'])->name('user-qualifications.create');

            Route::post('store', [UserQualificationController::class, 'store'])->name('user-qualifications.store');

            Route::get('edit/{id}', [UserQualificationController::class, 'edit'])->name('user-qualifications.edit');

            Route::put('update/{id}', [UserQualificationController::class, 'update'])->name('user-qualifications.update');

            Route::get('destroy/{id}', [UserQualificationController::class, 'destroy'])->name('user-qualifications.destroy');
        });
        Route::group(['prefix' => 'languages'], function () {

            Route::get('/', [LanguageController::class, 'index'])->name('languages.index');

            Route::get('create', [LanguageController::class, 'create'])->name('languages.create');

            Route::post('store', [LanguageController::class, 'store'])->name('languages.store');

            Route::get('edit/{id}', [LanguageController::class, 'edit'])->name('languages.edit');

            Route::put('update/{id}', [LanguageController::class, 'update'])->name('languages.update');

            Route::get('destroy/{id}', [LanguageController::class, 'destroy'])->name('languages.destroy');
        });
        Route::group(['prefix' => 'contents'], function () {

            Route::get('/', [ContentController::class, 'index'])->name('contents.index');

            Route::get('create', [ContentController::class, 'create'])->name('contents.create');

            Route::post('store', [ContentController::class, 'store'])->name('contents.store');

            Route::get('edit/{id}', [ContentController::class, 'edit'])->name('contents.edit');

            Route::put('update/{id}', [ContentController::class, 'update'])->name('contents.update');

            Route::get('destroy/{id}', [ContentController::class, 'destroy'])->name('contents.destroy');
        });
     /*************************** End Experience Routes ******************************************/
});

