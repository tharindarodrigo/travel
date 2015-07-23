<?php  namespace Foxted\Breadcrumb;

/**
 * Class BreadcrumbNode
 *
 * @package Foxted\Breadcrumb
 * @author  Valentin PRUGNAUD <valentin@whatdafox.com>
 * @url http://www.foxted.com
 */
class BreadcrumbNode
{

    public $title;
    public $url;
    public $active;

    /**
     * Constructor
     *
     * @param         $title
     * @param null    $url
     * @param boolean $active
     */
    public function __construct( $title, $url = NULL, $active = FALSE )
    {
        $this->title  = $title;
        $this->url    = $url;
        $this->active = $active;
    }

} 