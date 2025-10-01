<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Breadcrumb;
use App\Models\SocialIcon;
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
        $menus = Menu::where('is_active', 1)
            ->whereNull('parent_id')
            ->orderBy('order', 'ASC')
            ->with(['children' => function ($query) {
                $query->where('is_active', 1)->orderBy('order', 'ASC');
            }])
            ->get();

        View::share('menus', $menus);

        $socialIcon = SocialIcon::first();
        View::share('socialIcon', $socialIcon);
    }
}
