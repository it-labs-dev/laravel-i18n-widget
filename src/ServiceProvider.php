<?php

namespace ItLabs\Widgets\I18n;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
//        $this->publishes([
//            __DIR__.'/../config/locale.php' => config_path('locale.php'),
//        ]);

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'i18nWidget');
    }

    public function register()
    {
        app()->singleton(LocaleStatement::class, function(){
            return new LocaleStatement(
                config('app.defaultLocale'),
                config('app.locales', [])
            );
        });
    }
}
