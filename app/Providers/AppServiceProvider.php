<?php
/**
 * Application Service Provider
 *
 * @package Mantle
 */

namespace App\Providers;

use Mantle\Application\App_Service_Provider as Service_Provider;
use Mantle\Scheduling\Schedule;

/**
 * Application Service Provider
 */
class AppServiceProvider extends Service_Provider {
	/**
	 * Register any application services.
	 */
	public function register(): void {
		// Add application registration here.
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void {
		// Boot the application here.
	}

	/**
	 * Schedule any commands for the Application
	 *
	 * @param \Mantle\Scheduling\Schedule $schedule Scheduler instance.
	 */
	protected function schedule( $schedule ): void {
		// Schedule any commands, jobs, callbacks, etc. here.
	}
}
