<?php

use App\Http\Controllers\Dashboard\Enjaz\BioController;
use App\Http\Controllers\Dashboard\Enjaz\ContentController;
use App\Http\Controllers\Dashboard\Enjaz\ContentTypesController;
use App\Http\Controllers\Dashboard\Enjaz\CPanelController;
use App\Http\Controllers\Dashboard\Enjaz\EnjazPanelController;
use \App\Http\Controllers\Dashboard\Enjaz\CoursesController;
use App\Http\Controllers\Dashboard\Enjaz\ExperienceController;
use App\Http\Controllers\Dashboard\Enjaz\LanguageController;
use App\Http\Controllers\Dashboard\Enjaz\MembershipController;
use App\Http\Controllers\Dashboard\Enjaz\SkillController;
use App\Http\Controllers\Dashboard\Enjaz\SocialAccountsController;
use App\Http\Controllers\Dashboard\Enjaz\SocialPlatformsController;
use App\Http\Controllers\Dashboard\Enjaz\UserLanguageController;
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
        /*************************** Teacher Enjaz Routes **********************************************/
        /*************************** Experience Routes **********************************************/
        Route::group(['prefix' => 'experiences'], function () {

            Route::get('/', [ExperienceController::class, 'index'])->name('experiences.index');

            Route::post('store', [ExperienceController::class, 'store'])->name('experiences.store');

            Route::get('edit/{id}', [ExperienceController::class, 'edit'])->name('experiences.edit');

            Route::put('update/{id}', [ExperienceController::class, 'update'])->name('experiences.update');

            Route::get('destroy/{id}', [ExperienceController::class, 'destroy'])->name('experiences.destroy');

            Route::get('status/{status}/{id}', [ExperienceController::class, 'status']);
        });

        Route::group(['prefix' => 'courses'], function () {

            Route::get('/', [CoursesController::class, 'index'])->name('courses.index');

            Route::post('store', [CoursesController::class, 'store'])->name('courses.store');

            Route::get('edit/{id}', [CoursesController::class, 'edit'])->name('courses.edit');

            Route::put('update/{id}', [CoursesController::class, 'update'])->name('courses.update');

            Route::get('destroy/{id}', [CoursesController::class, 'destroy'])->name('courses.destroy');

            Route::get('status/{status}/{id}', [CoursesController::class, 'status']);
        });

        Route::group(['prefix' => 'social-platforms'], function () {

            Route::get('/', [SocialPlatformsController::class, 'index'])->name('social-platforms.index');

            Route::post('store', [SocialPlatformsController::class, 'store'])->name('social-platforms.store');

            Route::get('edit/{id}', [SocialPlatformsController::class, 'edit'])->name('social-platforms.edit');

            Route::put('update/{id}', [SocialPlatformsController::class, 'update'])->name('social-platforms.update');

            Route::get('destroy/{id}', [SocialPlatformsController::class, 'destroy'])->name('social-platforms.destroy');

            Route::get('status/{status}/{id}', [SocialPlatformsController::class, 'status']);
        });
        Route::group(['prefix' => 'social-accounts'], function () {

            Route::get('/', [SocialAccountsController::class, 'index'])->name('social-accounts.index');

            Route::post('store', [SocialAccountsController::class, 'store'])->name('social-accounts.store');

            Route::get('edit/{id}', [SocialAccountsController::class, 'edit'])->name('social-accounts.edit');

            Route::put('update/{id}', [SocialAccountsController::class, 'update'])->name('social-accounts.update');

            Route::get('destroy/{id}', [SocialAccountsController::class, 'destroy'])->name('social-accounts.destroy');

            Route::get('status/{status}/{id}', [SocialAccountsController::class, 'status']);
        });

        Route::group(['prefix' => 'user-qualifications'], function () {

            Route::get('/', [UserQualificationController::class, 'index'])->name('user-qualifications.index');

            Route::post('store', [UserQualificationController::class, 'store'])->name('user-qualifications.store');

            Route::get('edit/{id}', [UserQualificationController::class, 'edit'])->name('user-qualifications.edit');

            Route::put('update/{id}', [UserQualificationController::class, 'update'])->name('user-qualifications.update');

            Route::get('destroy/{id}', [UserQualificationController::class, 'destroy'])->name('user-qualifications.destroy');

            Route::get('status/{status}/{id}', [UserQualificationController::class, 'status']);
        });

        Route::group(['prefix' => 'skills'], function () {

            Route::get('/', [SkillController::class, 'index'])->name('skills.index');

            Route::post('store', [SkillController::class, 'store'])->name('skills.store');

            Route::get('edit/{id}', [SkillController::class, 'edit'])->name('skills.edit');

            Route::put('update/{id}', [SkillController::class, 'update'])->name('skills.update');

            Route::get('destroy/{id}', [SkillController::class, 'destroy'])->name('skills.destroy');

            Route::get('status/{status}/{id}', [SkillController::class, 'status']);
        });

        Route::group(['prefix' => 'memberships'], function () {

            Route::get('/', [MembershipController::class, 'index'])->name('memberships.index');

            Route::post('store', [MembershipController::class, 'store'])->name('memberships.store');

            Route::get('edit/{id}', [MembershipController::class, 'edit'])->name('memberships.edit');

            Route::put('update/{id}', [MembershipController::class, 'update'])->name('memberships.update');

            Route::get('destroy/{id}', [MembershipController::class, 'destroy'])->name('memberships.destroy');

            Route::get('status/{status}/{id}', [MembershipController::class, 'status']);
        });


        Route::group(['prefix' => 'user-languages'], function () {

            Route::get('/', [UserLanguageController::class, 'index'])->name('user-languages.index');

            Route::get('create', [UserLanguageController::class, 'create'])->name('user-languages.create');

            Route::post('store', [UserLanguageController::class, 'store'])->name('user-languages.store');

            Route::get('edit/{id}', [UserLanguageController::class, 'edit'])->name('user-languages.edit');

            Route::put('update/{id}', [UserLanguageController::class, 'update'])->name('user-languages.update');

            Route::get('destroy/{id}', [UserLanguageController::class, 'destroy'])->name('user-languages.destroy');

            Route::get('status/{status}/{id}', [UserLanguageController::class, 'status']);

        });
        Route::group(['prefix' => 'content-types'], function () {

            Route::get('/', [ContentTypesController::class, 'index'])->name('content-types.index');

            Route::get('create', [ContentTypesController::class, 'create'])->name('content-types.create');

            Route::post('store', [ContentTypesController::class, 'store'])->name('content-types.store');

            Route::get('edit/{id}', [ContentTypesController::class, 'edit'])->name('content-types.edit');

            Route::put('update/{id}', [ContentTypesController::class, 'update'])->name('content-types.update');

            Route::get('destroy/{id}', [ContentTypesController::class, 'destroy'])->name('content-types.destroy');

            Route::get('status/{status}/{id}', [ContentTypesController::class, 'status']);

        });

        Route::group(['prefix' => 'enjaz-cpanel'], function () {

            Route::get('/', [BioController::class, 'index'])->name('bios.index');

            Route::post('store', [BioController::class, 'store'])->name('bios.store');

            Route::get('edit/{id}', [BioController::class, 'edit'])->name('bios.edit');

            Route::put('update/{id}', [BioController::class, 'update'])->name('bios.update');

        });
    });


