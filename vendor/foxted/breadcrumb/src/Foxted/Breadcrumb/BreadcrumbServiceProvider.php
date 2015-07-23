<?php  namespace Foxted\Breadcrumb;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Factory;

/**
 * Class BreadcrumbServiceProvider
 *
 * @package Foxted\Breadcrumb
 * @author  Valentin PRUGNAUD <valentin@whatdafox.com>
 * @url http://www.foxted.com
 */
class BreadcrumbServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->bind('breadcrumb', function ( $app )
        {
            return new Breadcrumb($app['view'], $app['blade.compiler']);
        });

    }

    /**
     * Boot method
     */
    public function boot()
    {
        $this->package('foxted/breadcrumb');
        include(__DIR__.'/BladeExtension.php');
    }

    /**
     * Get the services provided by the provider.
     * @return array
     */
    public function provides()
    {
        return array('breadcrumb');
    }

}