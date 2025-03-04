<?php

namespace App\Providers;

use Modules\Auth\Http\Login;
use Awcodes\Curator\CuratorPlugin;
use Awcodes\FilamentGravatar\GravatarPlugin;
use Awcodes\FilamentGravatar\GravatarProvider;
use BezhanSalleh\FilamentExceptions\FilamentExceptionsPlugin;
use Croustibat\FilamentJobsMonitor\FilamentJobsMonitorPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Pboivin\FilamentPeek\FilamentPeekPlugin;

class AdminPanelProvider extends PanelProvider
{
    // Load the JSON configuration


    public function panel(Panel $panel): Panel
    {
         $locale = app()->getLocale();
         $menuTranslations = json_decode(file_get_contents(base_path("lang/{$locale}.json")), true);

         $settingsLabel = $menuTranslations['settings'];
         $blogsLabel = $menuTranslations['blog'];
         $usersgsLabel = $menuTranslations['users'];
         $mediaLabel = $menuTranslations['media'];

        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(Login::class)
            ->profile()
            ->spa()
            ->databaseNotifications()
            ->plugins([
                BreezyCore::make()
                    ->myProfile(
                        shouldRegisterUserMenu: true,
                        shouldRegisterNavigation: false,
                        hasAvatars: false
                    )
                    ->enableTwoFactorAuthentication(),

                CuratorPlugin::make()
                ->label(__('file')) // تغییر نام منو

                    ->pluralLabel(label: __('media'))
                    ->navigationLabel($mediaLabel) // تغییر نام گروه ناوبری
                    ->navigationIcon('heroicon-o-photo')
                    ->navigationGroup($blogsLabel)
                    ->navigationSort(4)
                    ->navigationCountBadge(),

                FilamentJobsMonitorPlugin::make()
                    ->navigationCountBadge()

                    ->navigationGroup($settingsLabel),

                FilamentPeekPlugin::make()

                    ->disablePluginStyles(),

            //    FilamentExceptionsPlugin::make(),

                GravatarPlugin::make(),
            ])
            ->defaultAvatarProvider(GravatarProvider::class)
            ->favicon(asset('/favicon-32x32.png'))

            ->brandLogo(fn () => view('components.logo'))
            ->navigationGroups([
                $blogsLabel,
                $usersgsLabel,
                $settingsLabel
            ])

            ->colors([
                'primary' => Color::Blue,
            ])
            ->viteTheme('resources/css/admin.css')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
