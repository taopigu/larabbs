<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Topic;
use App\Observers\TopicObserver;
use App\Models\Reply;
use App\Observers\ReplyObserver;

class AppServiceProvider extends ServiceProvider
{

    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        \App\Models\User::class => \App\Policies\UserPolicy::class,
    ];


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if(app()->isLocal()){
            $this->app->register(\VIACreative\SudoSu\ServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        \Carbon\Carbon::setLocale('zh');
        Topic::observe(TopicObserver::class);
        Reply::observe(ReplyObserver::class);
    }
}
