Templating
==========

Templating in WordPress should be as delightful -- Mantle hopes to make it that way.

## Views
WordPress template parts can be returned for a route.

```php
Route::get( '/', function () {
  return response()->view( 'template-parts/block', [ 'variable' => '123' ] );
} );
```

### View File Location
By default WordPress will only load a template part from the active theme and parent theme if applicable. Mantle supports loading views from a dynamic set of locations. Mantle support automatically register the current theme and parent theme as view locations. Additional paths can be registered through `View_Loader`.

```php
View_Loader::add_path( '/path-to-add' );

View_Loader::remove_path( '/path-to-remove' );
```

## Passing Variables to Views
Frequently you will need to pass variables down to views from controllers and routes. To ensure a global variable isn't overwritten the variables are stored in the helper method `mantle_get_var()`.

```php
// Call the view with a variable.
echo view( 'view/to/load', [ 'foo' => 'bar' ] );

// Inside the view...
echo mantle_get_var( 'foo' );
```

### Passing Global Variables
Service Providers and other classes in the application can pass global variables to all views loaded. This can be very handy when you want to pass template variables to a service provider without doing any additional work in the route.

```php
View::share( 'variable-to-pass', 'value or reference to pass' );
```

### View Helpers

#### `loop()`
Loop over a collection/array of post objects. Supports a collection or array of `WP_Post` objects, Mantle Models, post IDs, or a `WP_Query` object. The post object will be automatically setup for each template part. We don't have to `while ( have_posts() ) : the_post(); ... endwhile;`, keeping our code nice and DRY.

```php
$posts = Post::all();
echo loop( $posts, 'view-to-load' );
```

#### `iterate()`
Iterate over a collection/array of arbitrary data. Each view is passed `index` and `item` as a the current item in the loop.

```php
echo iterate( [ 1, 2, 3 ], 'view-to-load' );
```

### View Shortcuts
When inside of a partial, you can prefix your path slug with `_` to load a sub-partial, appending everything after the `_` to the current partial's file name (with a dash separating them).

```php
// Inside of template-parts/homepage/slideshow.php.
view( '_slide', [ 'text' => 'Variable to Pass' ] );

// Inside of template-parts/homepage/slideshow-slide.php.
echo mantle_get_var( 'text', "Slide data!" );
```