<?php
namespace Thiagoprz\CartaoProtegido;

use Illuminate\Support\ServiceProvider;

/**
 * @package Thiagoprz\CartaoProtegido
 * @author Thiago Przyczynski <przyczynski@gmail.com>
 */
class CartaoProtegidoServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Publishes configuration
        $this->publishes([
            __DIR__.'/../config/braspag-cartao-protegido.php' => config_path('braspag-cartao-protegido.php'),
        ]);
    }

}
