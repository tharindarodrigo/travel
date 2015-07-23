<?php  namespace Foxted\Breadcrumb;

use Illuminate\View\Factory;

/**
 * Class Breadcrumb
 *
 * @package Foxted\Breadcrumb
 * @author  Valentin PRUGNAUD <valentin@whatdafox.com>
 * @url http://www.foxted.com
 */
class Breadcrumb
{
    /**
     * Laravel View factory
     * @var \Illuminate\View\Factory
     */
    protected $viewFactory;

    /**
     * Links composing the breadcrumb
     * @var array
     */
    protected $links = [];

    /**
     * Constructor
     * @param Factory       $viewFactory
     */
    public function __construct( Factory $viewFactory)
    {
        $this->viewFactory = $viewFactory;
    }

    /**
     * Add a link to the breadcrumb
     *
     * @param         $title   Title
     * @param null    $url     URL
     * @param boolean $active  Active page
     */
    public function add( $title, $url = NULL, $active = FALSE )
    {
        array_push($this->links, new BreadcrumbNode(
            $title,
            $url,
            $active
        ));
    }

    /**
     * Render the full breadcrumb
     *
     * @return \Illuminate\View\Factory
     */
    public function render()
    {
        return $this->viewFactory->make('breadcrumb::breadcrumb', [
            'breadcrumb' => $this->links
        ]);
    }

    /**
     * Get links array
     * @return mixed
     */
    public function getLinks()
    {
        return $this->links;
    }

}