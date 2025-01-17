<?php
/**
 * Example_Job class file.
 *
 * @package Mantle
 */

namespace App\Jobs;

use Mantle\Contracts\Queue\Can_Queue;
use Mantle\Contracts\Queue\Job;
use Mantle\Queue\Dispatchable;
use Mantle\Queue\Queueable;

/**
 * Example Job that can be queued.
 */
class ExampleJob implements Job, Can_Queue {
	use Queueable;
	use Dispatchable;

	/**
	 * Handle the job.
	 */
	public function handle(): void {
		// Handle it here!
	}
}
