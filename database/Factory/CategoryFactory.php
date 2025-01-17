<?php
/**
 * Category Factory
 *
 * @package Mantle
 */

// phpcs:disable Squiz.Commenting.FunctionComment.MissingParamComment

namespace App\Database\Factory;

use Mantle\Support\Str;
use App\Models\Category;

/**
 * Category Factory
 *
 * @extends \Mantle\Database\Factory\Term_Factory<\App\Models\Category, \WP_Term, \App\Models\Category>
 */
class CategoryFactory extends \Mantle\Database\Factory\Term_Factory {
	/**
	 * Model to use when creating objects.
	 *
	 * @var class-string<\App\Models\Category>
	 */
	protected string $model = Category::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array {
		return [
			'description' => trim( $this->faker->paragraph( 2 ) ),
			'name'        => $this->faker->sentence(),
			'taxonomy'    => 'category',
		];
	}
}
