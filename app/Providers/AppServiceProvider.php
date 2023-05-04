<?php

namespace App\Providers;

use App\Models\Admin\PaymentSetting;
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
        // $settings = Setting::first();
        // Paginator::useBootstrap();
        // Config::set('mail.mailers.smtp.username', trim($settings['email_from']));
        // Config::set('mail.mailers.smtp.host', trim($settings['email_host']));
        // Config::set('mail.mailers.smtp.port', trim($settings['email_port']));
        // Config::set('mail.mailers.smtp.from', ['address' => $settings['email_from'], 'name' => $settings['website_name']]);
        // Config::set('mail.mailers.smtp.encryption', trim('ssl'));
        // Config::set('mail.mailers.smtp.password', trim($settings['email_password']));
        // Config::set('mail.default', trim('smtp'));

        // $paymentSetting = PaymentSetting::query()->first();
        // Config::set('paypal.mode', trim($paymentSetting['mode']));
        // Config::set('paypal.live.username', trim($paymentSetting['username']));
        // Config::set('paypal.live.password', trim($paymentSetting['password']));
        // Config::set('paypal.live.secret', trim($paymentSetting['secret']));

        // Config::set('newsletter.MAILCHIMP_LIST_ID', trim($settings['mailchimp_list_id']));
        // Config::set('newsletter.MAILCHIMP_APIKEY', trim($settings['mailchimp_api_key']));

        // $storage = trim($settings['enable_s3']) == 1 ? 's3' : 'local';
        // Config::set('filesystems.default', $storage);
        // Config::set('filesystems.s3.key', trim($settings['s3_key']));
        // Config::set('filesystems.s3.secret', trim($settings['s3_secret']));
        // Config::set('filesystems.s3.region', trim($settings['s3_region']));
        // Config::set('filesystems.s3.bucket', trim($settings['s3_bucket']));
    }
}
