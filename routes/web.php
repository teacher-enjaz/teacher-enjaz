<?php

use App\Http\Controllers\Dashboard\Enjaz\AchievementController;
use App\Http\Controllers\Dashboard\Enjaz\ArticleController;
use App\Http\Controllers\Dashboard\Enjaz\BioController;
use App\Http\Controllers\Dashboard\Enjaz\ContentTypeController;
use \App\Http\Controllers\Dashboard\Enjaz\CoursesController;
use App\Http\Controllers\Dashboard\Enjaz\ExperienceController;
use App\Http\Controllers\Dashboard\Enjaz\InitiativeController;
use App\Http\Controllers\Dashboard\Enjaz\MembershipController;
use App\Http\Controllers\Dashboard\Enjaz\SkillController;
use App\Http\Controllers\Dashboard\Enjaz\UserAwardController;
use App\Http\Controllers\Dashboard\Enjaz\UserSocialAccountController;
use App\Http\Controllers\Dashboard\Enjaz\SocialPlatformController;
use App\Http\Controllers\Dashboard\Enjaz\UserLanguageController;
use App\Http\Controllers\Dashboard\Enjaz\UserQualificationController;
use App\Http\Controllers\Enjaz\IndexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
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
        /*************************** Teacher Enjaz View Routes **********************************************/
        Route::group(['prefix' => 'enjaz'], function () {

            Route::get('{name_en}',[IndexController::class,'index'])->name('enjaz.index');

            Route::get('/{name_en}/getMemberships',[IndexController::class,'getMemberships']);

            Route::get('/{name_en}/getLanguages',[IndexController::class,'getLanguages']);

            Route::get('/{name_en}/getSkills',[IndexController::class,'getSkills']);

            Route::get('/{name_en}/getCourses',[IndexController::class,'getCourses']);

            Route::get('/{name_en}/getExperiences',[IndexController::class,'getExperiences']);

            Route::get('/{name_en}/getQualifications',[IndexController::class,'getQualifications']);

            Route::get('{name_en}/getAwards',[IndexController::class,'getAwards']);

        });
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

            Route::get('/', [SocialPlatformController::class, 'index'])->name('social-platforms.index');

            Route::post('store', [SocialPlatformController::class, 'store'])->name('social-platforms.store');

            Route::get('edit/{id}', [SocialPlatformController::class, 'edit'])->name('social-platforms.edit');

            Route::put('update/{id}', [SocialPlatformController::class, 'update'])->name('social-platforms.update');

            Route::get('destroy/{id}', [SocialPlatformController::class, 'destroy'])->name('social-platforms.destroy');

            Route::get('status/{status}/{id}', [SocialPlatformController::class, 'status']);
        });

        Route::group(['prefix' => 'social-accounts'], function () {

            Route::get('/', [UserSocialAccountController::class, 'index'])->name('social-accounts.index');

            Route::post('store', [UserSocialAccountController::class, 'store'])->name('social-accounts.store');

            Route::get('edit/{id}', [UserSocialAccountController::class, 'edit'])->name('social-accounts.edit');

            Route::put('update/{id}', [UserSocialAccountController::class, 'update'])->name('social-accounts.update');

            Route::get('destroy/{id}', [UserSocialAccountController::class, 'destroy'])->name('social-accounts.destroy');

            Route::get('status/{status}/{id}', [UserSocialAccountController::class, 'status']);
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

        Route::group(['prefix' => 'enjaz-cpanel'], function () {

            Route::get('/', [BioController::class, 'index'])->name('bios.index');

            Route::post('store', [BioController::class, 'store'])->name('bios.store');

            Route::get('edit/{id}', [BioController::class, 'edit'])->name('bios.edit');

            Route::put('update/{id}', [BioController::class, 'update'])->name('bios.update');

            Route::get('export-bio-pdf', [BioController::class, 'exportPdf'])->name('bios.exportPdf');

            Route::get('show', [BioController::class, 'show'])->name('bios.show');
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

            Route::get('/', [ContentTypeController::class, 'index'])->name('content-types.index');

            Route::post('store', [ContentTypeController::class, 'store'])->name('content-types.store');

            Route::get('edit/{id}', [ContentTypeController::class, 'edit'])->name('content-types.edit');

            Route::put('update/{id}', [ContentTypeController::class, 'update'])->name('content-types.update');

            Route::get('destroy/{id}', [ContentTypeController::class, 'destroy'])->name('content-types.destroy');

            Route::get('status/{status}/{id}', [ContentTypeController::class, 'status']);

        });
        Route::group(['prefix' => 'user-awards'], function () {

            Route::get('/', [UserAwardController::class, 'index'])->name('user-awards.index');

            Route::post('store', [UserAwardController::class, 'store'])->name('user-awards.store');

            Route::get('edit/{id}', [UserAwardController::class, 'edit'])->name('user-awards.edit');

            Route::put('update/{id}', [UserAwardController::class, 'update'])->name('user-awards.update');

            Route::get('destroy/{id}', [UserAwardController::class, 'destroy'])->name('user-awards.destroy');

            Route::get('status/{status}/{id}', [UserAwardController::class, 'status']);
        });
        Route::group(['prefix' => 'articles'], function () {

            Route::get('/', [ArticleController::class, 'index'])->name('articles.index');

            Route::post('store', [ArticleController::class, 'store'])->name('articles.store');

            Route::get('edit/{id}', [ArticleController::class, 'edit'])->name('articles.edit');

            Route::put('update/{id}', [ArticleController::class, 'update'])->name('articles.update');

            Route::get('destroy/{id}/{folder}', [ArticleController::class, 'destroy'])->name('articles.destroy');

            Route::get('status/{status}/{id}', [ArticleController::class, 'status']);
        });
        Route::group(['prefix' => 'achievements'], function () {

            Route::get('/', [AchievementController::class, 'index'])->name('achievements.index');

            Route::post('store', [AchievementController::class, 'store'])->name('achievements.store');

            Route::get('edit/{id}', [AchievementController::class, 'edit'])->name('achievements.edit');

            Route::put('update/{id}', [AchievementController::class, 'update'])->name('achievements.update');

            Route::get('destroy/{id}/{folder}', [ArticleController::class, 'destroy'])->name('achievements.destroy');

            Route::get('status/{status}/{id}', [ArticleController::class, 'status']);

            Route::get('deleteFromDB/{id}/{folder}', [AchievementController::class, 'deleteFromDB']);
        });
        Route::group(['prefix' => 'initiatives'], function () {

            Route::get('/', [InitiativeController::class, 'index'])->name('initiatives.index');

            Route::post('store', [InitiativeController::class, 'store'])->name('initiatives.store');

            Route::get('edit/{id}', [InitiativeController::class, 'edit'])->name('initiatives.edit');

            Route::put('update/{id}', [InitiativeController::class, 'update'])->name('initiatives.update');

            Route::get('destroy/{id}/{folder}', [ArticleController::class, 'destroy'])->name('initiatives.destroy');

            Route::get('status/{status}/{id}', [ArticleController::class, 'status']);
        });
    });


