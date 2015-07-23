<?php
namespace Foxted\Breadcrumb;

/**
 * Class BreadcrumbNodeTest
 *
 * @package Foxted\Breadcrumb
 * @author  Valentin PRUGNAUD <valentin@whatdafox.com>
 * @url http://www.foxted.com
 */
class BreadcrumbNodeTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;

    /** @test */
    public function it_is_initializable()
    {
        $node = new BreadcrumbNode('Home');
        $this->assertInstanceOf('Foxted\Breadcrumb\BreadcrumbNode', $node);
        $this->assertAttributeEquals('Home', 'title', $node);
    }

    /** @test */
    public function it_accepts_a_url()
    {
        $node = new BreadcrumbNode('Home', 'http://www.google.com');
        $this->assertAttributeEquals('http://www.google.com', 'url', $node);
    }

    /** @test */
    public function it_accepts_an_active_flag()
    {
        $node = new BreadcrumbNode( 'Home', 'http://www.google.com', TRUE);
        $this->assertAttributeEquals(TRUE, 'active', $node);
        $this->assertAttributeInternalType('boolean', 'active', $node);
    }

    /** @test */
    public function it_accepts_an_active_node_without_link()
    {
        $node = new BreadcrumbNode( 'Home', NULL, TRUE );
        $this->assertAttributeEquals(TRUE, 'active', $node);
        $this->assertAttributeEquals(NULL, 'url', $node);
        $this->assertAttributeInternalType('boolean', 'active', $node);
    }

}