<?php  namespace Foxted\Breadcrumb\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class BreadcrumbFacade
 *
 * @package Foxted\Breadcrumb\Facades
 * @author  Valentin PRUGNAUD <valentin@whatdafox.com>
 * @url http://www.foxted.com
 */
class BreadcrumbFacade extends Facade
{

    /**
     * Get facade accessor
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'breadcrumb';
    }

}