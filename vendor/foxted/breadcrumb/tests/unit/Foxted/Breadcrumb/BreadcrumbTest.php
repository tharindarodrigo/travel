<?php
namespace Foxted\Breadcrumb;


class BreadcrumbTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;

    protected function _before()
    {

        $this->viewFactory = $this->getMock('Illuminate\View\Factory', ['make'], [
            $this->getMock('Illuminate\View\Engines\EngineResolver'),
            $this->getMock('Illuminate\View\ViewFinderInterface'),
            $this->getMock('Illuminate\Events\Dispatcher')
        ]);
        $this->view = $this->getMock('Illuminate\View\View', [], [
            $this->viewFactory,
            $this->getMock('Illuminate\View\Engines\EngineInterface'),
            'view',
            'path'
        ]);
        $this->viewFactory->expects($this->any())
            ->method("make")
            ->will($this->returnValue($this->view));
    }

    /** @test */
    public function it_is_initializable()
    {
        $breadcrumb = new Breadcrumb( $this->viewFactory );
        $this->assertInstanceOf('Foxted\Breadcrumb\Breadcrumb', $breadcrumb);
    }

    /** @test */
    public function it_can_have_a_node()
    {
        $breadcrumb = new Breadcrumb( $this->viewFactory );
        $this->assertAttributeCount(0, 'links', $breadcrumb);
        $this->assertAttributeInternalType('array', 'links', $breadcrumb);

        $breadcrumb->add('Home');
        $this->assertAttributeCount(1, 'links', $breadcrumb);
        $this->assertAttributeInternalType('array', 'links', $breadcrumb);

        $links = $breadcrumb->getLinks();
        $this->assertInstanceOf('Foxted\Breadcrumb\BreadcrumbNode', $links[0]);
    }

    /** @test */
    public function it_can_have_multiple_nodes()
    {
        $breadcrumb = new Breadcrumb( $this->viewFactory );
        $this->assertAttributeCount(0, 'links', $breadcrumb);

        $breadcrumb->add('Home');
        $breadcrumb->add('Second link');
        $breadcrumb->add('Third link');
        $this->assertAttributeCount(3, 'links', $breadcrumb);
    }

    /** @test */
    public function it_can_render_the_view()
    {
        $breadcrumb = new Breadcrumb( $this->viewFactory );
        $breadcrumb->add('Home');
        $view = $breadcrumb->render();
        $this->assertInstanceOf('Illuminate\View\View', $view);
    }

}