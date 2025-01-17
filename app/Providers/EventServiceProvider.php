<?php
/**
 * Event_Service_Provider class file.
 *
 * @package Mantle
 */

namespace App\Providers;

use Mantle\Framework\Providers\Event_Service_Provider as Service_Provider;
use Mantle\Facade\Event;

/**
 * Event Service Provider
 */
class EventServiceProvider extends Service_Provider {
	/**
	 * The event listener mappings for the application.
	 *
	 * @var array<string, array<int, class-string>>
	 */
	protected $listen = [
		/**
		 * Listen to specific WordPress or Mantle Events.
		 *
		 * 'init' => [
		 *   \App\Listeners\On_Boot::class,
		 * ],
		 *
		 * Example_Event::class => [
		 *   \App\Listeners\Example_Listener::class,
		 * ],
		 */
	];

	/**
	 * Register any other events for your application.
	 */
	public function boot(): void {
		// ...
	}

	/**
	 * Flag if Mantle should discover events automatically.
	 * If removed, event discovery will be disabled.
	 *
	 * @return bool
	 */
	public function should_discover_events(): bool {
		return true;
	}
}
