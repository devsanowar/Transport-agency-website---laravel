<?php

namespace App\Providers;

use App\Models\Breadcrumb;
use App\Models\WebsiteColor;
use App\Models\WebsiteSetting;
use App\Models\ThemeCustomizer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $theme = ThemeCustomizer::first();
        View::share('theme', $theme);

        $website_setting = WebsiteSetting::first();
        View::share('website_setting', $website_setting);

        $website_color = WebsiteColor::first();
        View::share('website_color', $website_color);

        $website_breadcrumb = Breadcrumb::first();
        View::share('website_breadcrumb', $website_breadcrumb);
    }
}
