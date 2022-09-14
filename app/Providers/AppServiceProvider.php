<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $settings = Setting::first();
        Paginator::useBootstrap();
        Config::set('mail.mailers.smtp.username', trim($settings['email_from']));
        Config::set('mail.mailers.smtp.host', trim($settings['email_host']));
        Config::set('mail.mailers.smtp.port', trim($settings['email_port']));
        Config::set('mail.mailers.smtp.from', ['address' => $settings['email_from'], 'name' => $settings['website_name']]);
        Config::set('mail.mailers.smtp.encryption', trim('ssl'));
        Config::set('mail.mailers.smtp.password', trim($settings['email_password']));
        Config::set('mail.default', trim('smtp'));
    }
}
