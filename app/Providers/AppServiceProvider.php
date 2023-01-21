<?php

namespace App\Providers;

use App\Rawafed\Interfaces\BookInterface;
use App\Rawafed\Interfaces\GradeInterface;
use App\Rawafed\Interfaces\GradeSubjectInterface;
use App\Rawafed\Interfaces\ContactInterface;
use App\Rawafed\Interfaces\DirectorateInterface;
use App\Rawafed\Interfaces\ECardInterface;
use App\Rawafed\Interfaces\FileCategoryInterface;
use App\Rawafed\Interfaces\FileMaterialInterface;
use App\Rawafed\Interfaces\GeoPlaceInterface;
use App\Rawafed\Interfaces\InformationInterface;
use App\Rawafed\Interfaces\InteractiveBookInterface;
use App\Rawafed\Interfaces\Laboratories\NewInterface;
use App\Rawafed\Interfaces\LessonInterface;
use App\Rawafed\Interfaces\LevelInterface;
use App\Rawafed\Interfaces\PermissionInterface;
use App\Rawafed\Interfaces\ResourceFileInterface;
use App\Rawafed\Interfaces\ResourceInterface;
use App\Rawafed\Interfaces\ResourceTypeInterface;
use App\Rawafed\Interfaces\RoleInterface;
use App\Rawafed\Interfaces\SchoolInterface;
use App\Rawafed\Interfaces\SemesterInterface;
use App\Rawafed\Interfaces\SocialInterface;
use App\Rawafed\Interfaces\StaticPageInterface;
use App\Rawafed\Interfaces\SubjectInterface;
use App\Rawafed\Interfaces\UserInterface;
use App\Rawafed\Interfaces\VideoLessonInterface;
use App\Rawafed\Repositories\BookRepository;
use App\Rawafed\Interfaces\UnitCategoryInterface;
use App\Rawafed\Interfaces\UnitInterface;
use App\Rawafed\Interfaces\VideoTypeInterface;
use App\Rawafed\Repositories\GradeRepository;
use App\Rawafed\Repositories\GradeSubjectRepository;
use App\Rawafed\Repositories\ContactRepository;
use App\Rawafed\Repositories\DirectorateRepository;
use App\Rawafed\Repositories\ECardRepository;
use App\Rawafed\Repositories\FileCategoryRepository;
use App\Rawafed\Repositories\FileMaterialRepository;
use App\Rawafed\Repositories\GeoPlaceRepository;
use App\Rawafed\Repositories\InformationRepository;
use App\Rawafed\Repositories\InteractiveBookRepository;
use App\Rawafed\Repositories\Laboratories\NewRepository;
use App\Rawafed\Repositories\LessonRepository;
use App\Rawafed\Repositories\LevelRepository;
use App\Rawafed\Repositories\PermissionRepository;
use App\Rawafed\Repositories\ResourceFileRepository;
use App\Rawafed\Repositories\ResourceRepository;
use App\Rawafed\Repositories\ResourceTypeRepository;
use App\Rawafed\Repositories\RoleRepository;
use App\Rawafed\Repositories\SchoolRepository;
use App\Rawafed\Repositories\SemesterRepository;
use App\Rawafed\Repositories\SocialRepository;
use App\Rawafed\Repositories\StaticPageRepository;
use App\Rawafed\Repositories\SubjectRepository;
use App\Rawafed\Repositories\UnitCategoryRepository;
use App\Rawafed\Repositories\UnitRepository;
use App\Rawafed\Repositories\UserRepository;
use App\Rawafed\Repositories\VideoLessonRepository;
use App\Rawafed\Repositories\VideoTypeRepository;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }

        /*$this->app->bind(GeoPlaceInterface::class,GeoPlaceRepository::class);
        $this->app->bind(DirectorateInterface::class,DirectorateRepository::class);
        $this->app->bind(LevelInterface::class,LevelRepository::class);
        $this->app->bind(InformationInterface::class,InformationRepository::class);
        $this->app->bind(SocialInterface::class,SocialRepository::class);
        $this->app->bind(GradeInterface::class,GradeRepository::class);
        $this->app->bind(SubjectInterface::class,SubjectRepository::class);
        $this->app->bind(GradeSubjectInterface::class,GradeSubjectRepository::class);
        $this->app->bind(InteractiveBookInterface::class,InteractiveBookRepository::class);
        $this->app->bind(BookInterface::class,BookRepository::class);
        $this->app->bind(SemesterInterface::class,SemesterRepository::class);
        $this->app->bind(UnitCategoryInterface::class,UnitCategoryRepository::class);
        $this->app->bind(UnitInterface::class,UnitRepository::class);
        $this->app->bind(LessonInterface::class,LessonRepository::class);
        $this->app->bind(VideoTypeInterface::class,VideoTypeRepository::class);
        $this->app->bind(FileCategoryInterface::class,FileCategoryRepository::class);
        $this->app->bind(FileMaterialInterface::class,FileMaterialRepository::class);
        $this->app->bind(SchoolInterface::class,SchoolRepository::class);
        $this->app->bind(RoleInterface::class,RoleRepository::class);
        $this->app->bind(PermissionInterface::class,PermissionRepository::class);
        $this->app->bind(UserInterface::class,UserRepository::class);
        $this->app->bind(ECardInterface::class,ECardRepository::class);
        $this->app->bind(ContactInterface::class,ContactRepository::class);
        $this->app->bind(NewInterface::class,NewRepository::class);
        $this->app->bind(ResourceInterface::class,ResourceRepository::class);
        $this->app->bind(ResourceTypeInterface::class,ResourceTypeRepository::class);
        $this->app->bind(ResourceFileInterface::class,ResourceFileRepository::class);
        $this->app->bind(VideoLessonInterface::class,VideoLessonRepository::class);
        $this->app->bind(StaticPageInterface::class,StaticPageRepository::class);*/

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ResetPassword::createUrlUsing(function ($notifiable, string $token) {
            return config(app('url')).'/auth/reset-password?token='.$token;
        });

        Paginator::useBootstrap();
        Validator::extend('arabic', function ($attributes, $value, $parameters, $validation) {
            $english_alphabets = [
                'A' , 'B' , 'C', 'D', 'E',  'F',  'G', 'H', 'I',
                'J', 'K', 'L' , 'M' ,'N' ,'O' ,'P', 'Q', 'R' ,'S',
                'T' ,'U', 'V','W', 'X', 'Y' ,'Z',
                'a', 'b', 'c-', 'd' ,'e', 'f', 'g', 'h',
             'i', 'j', 'k', 'l' , 'm', 'n', 'o' ,'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x','y', 'z','-'
            ];

            $input = $value;
            if (!$input) {
                return false;
            }
            $chars = preg_split('//u', $input, -1, PREG_SPLIT_NO_EMPTY);
            foreach ($chars as $char) {
                if (in_array($char, $english_alphabets)) {
                    return false;
                }
            }
            return true;
        });
        /*URL::forceScheme('https');
        $this->app['request']->server->set('HTTPS',true);*/
    }
}
