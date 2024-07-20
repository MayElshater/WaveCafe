<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ContactUS;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // for messages nav
        View::composer(['layouts.adminLayout', 'layouts.adminLayoutAdd'], function ($view) {
            $messages = ContactUS::where('is_read', false)->orderBy('created_at', 'desc')->get();
            $view->with('messages', $messages);
        });


        //for login user
        
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $userName = Auth::user()->name;
                $view->with('userName', $userName);
            }
        });
    }
}
