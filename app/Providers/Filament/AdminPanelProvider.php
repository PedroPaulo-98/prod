<?php

namespace App\Providers\Filament;

use Filament\Forms\Components\CameraInput;
use Filament\Forms\Components\Component;
use Illuminate\Support\Facades\Blade;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
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
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Models\System;
use Filament\Navigation\MenuItem;



class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandLogo(asset('images/logosemfundo_prodap.png'))
            ->brandLogoHeight('4rem')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->renderHook(
                'panels::body.end',
                fn (): string => Blade::render('
                    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            if (typeof SignaturePad === "undefined") {
                                console.error("SignaturePad library failed to load");
                                // Tenta carregar novamente após 1 segundo
                                setTimeout(function() {
                                    var script = document.createElement("script");
                                    script.src = "https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js";
                                    script.onerror = function() {
                                        console.error("Failed to load SignaturePad after retry");
                                    };
                                    document.body.appendChild(script);
                                }, 1000);
                            }
                        });
                    </script>
                    @stack("scripts")
                ')
            )
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            //->widgets([
                //    Widgets\AccountWidget::class,
                //    Widgets\FilamentInfoWidget::class,
            //])
            //->brandName('Meu Painel (' . System::count() . ' sistemas)')
            //->components([
            //    CameraInput::class,
            //])
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
