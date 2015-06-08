<?php namespace Simexis\Braintree;

use Simexis\Braintree\BraintreeControllerCommand;
use \Illuminate\Support\ServiceProvider;
use \Illuminate\Support\Facades\Config;
use \Illuminate\Support\Facades\View;
use \Illuminate\Support\Facades\Blade;
use \Illuminate\Support\Facades\Artisan;
use \Braintree_Configuration;

class BraintreeServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
    public function boot()
    {

        $this->publishes([
            __DIR__.'/../../config/config.php' => config_path('braintree.php'),
        ], 'config');

        $this->mergeConfigFrom(
            __DIR__.'/../../config/config.php', 'braintree'
        );

    }

    /**
	 * Register the service provider.
	 *
	 * @return void
	 */
    public function register()
    {

        Braintree_Configuration::environment(Config::get('braintree::environment'));
        Braintree_Configuration::merchantId(Config::get('braintree::merchantId'));
        Braintree_Configuration::publicKey(Config::get('braintree::publicKey'));
        Braintree_Configuration::privateKey(Config::get('braintree::privateKey'));

    }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
