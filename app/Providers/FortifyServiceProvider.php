<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Database\Console\Migrations\InstallCommand;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;


class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        
            
                Fortify::loginView(function () {
                    return view('auth.login');
                });
    
                Fortify::registerView(function () {
                    return view('auth.register');
                });
    
                Fortify::confirmPasswordView(function () {
                    return view('auth.passwords.confirm');
                });
    
                Fortify::requestPasswordResetLinkView(function () {
                    return view('auth.passwords.email');
                });
    
                Fortify::resetPasswordView(function () {
                    return view('auth.passwords.reset');
                });
    
                Fortify::verifyEmailView(function () {
                    return view('auth.verify');
                });
    
            }
        
    }

